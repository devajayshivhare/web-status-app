<?php

namespace App\Console\Commands;

use App\Models\SiteLog;
use App\Models\SiteMonitoring;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class MonitorSite extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monitor:site';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Monitor the latest site and log its status';

    /**
     * Execute the console command.
     */
    public function handle()
    {
         // Fetch the latest site
         $site = SiteMonitoring::latest()->first();
        //  logger(now()->minute % $site->task_frequency === 0);
         logger(now()->minute." minutes");
         logger($site->task_frequency." task frequency");
         if ($site && now()->minute % $site->task_frequency === 0) {
             $this->info("Monitoring site: {$site->site_url}");
             
             try {
                 // Send an HTTP request to check the site status
                 $response = Http::get($site->site_url);
                 $status = $response->successful() ? 'up' : 'down';
             } catch (\Exception $e) {
                 $status = 'down';
             }
 
             // Log the result in the database
             SiteLog::create([
                 'site_monitoring_id' => $site->id,
                 'status' => $status,
                 'checked_at' => now(),
             ]);
 
             $this->info("Site status logged as: {$status}");
         } else {
             $this->warn("No sites found for monitoring.");
         }
    }
}
