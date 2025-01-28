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
        $sites = SiteMonitoring::all();

        if ($sites->isEmpty()) {
            $this->warn("No sites found for monitoring.");
            return;
        }

        foreach ($sites as $site) {
            if (now()->minute % $site->task_frequency === 0) {
                $this->info("Monitoring site: {$site->site_url}");

                try {
                    $response = Http::get($site->site_url);
                    $status = $response->successful() ? 'up' : 'down';
                } catch (\Exception $e) {
                    $status = 'down';
                }

                SiteLog::create([
                    'site_monitoring_id' => $site->id,
                    'status' => $status,
                    'checked_at' => now(),
                ]);

                $this->info("Site status for {$site->site_url} logged as: {$status}");
            } else {
                $this->info("Skipping site: {$site->site_url} (Frequency mismatch)");
            }
        }
    }
}
