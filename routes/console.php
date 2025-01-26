<?php

use App\Jobs\MonitorSiteJob;
use App\Jobs\MonitorSiteJobNew;
use App\Models\SiteLog;
use App\Models\SiteMonitoring;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


Schedule::command('monitor:site')->everyMinute();
// Schedule::call(fn () => MonitorSiteJob)->everyFiveSeconds();
// Schedule::job(new MonitorSiteJob)->everyFiveSeconds();
// Schedule::job(new MonitorSiteJobNew)->everyFiveSeconds();


// Schedule::call(function () {
//         $site = SiteMonitoring::latest()->first();

//         if ($site && now()->minute % $site->task_frequency === 0) {
//             // Dispatch the MonitorSiteJob for the latest site
//             MonitorSiteJobNew::dispatch($site);
//         }
//     })->everyFiveSeconds(); // Schedule the task to run every minute

// Schedule::call(
//     function () {
//         // $sites = SiteMonitoring::all();
//         $site = SiteMonitoring::latest()->first();

//         if ($site && now()->minute % $site->task_frequency === 0) {
//             // Perform monitoring logic
//             try {
//                 $response = Http::get($site->site_url);
//                 $status = $response->successful() ? 'up' : 'down';
//                 logger($status);
//             } catch (\Exception $e) {
//                 $status = 'down';
//             }

//             // Log the result
//             SiteLog::create([
//                 'site_monitoring_id' => $site->id,
//                 'status' => $status,
//                 'checked_at' => now(),
//             ]);
//         }
//     }


// )->everyFiveSeconds();
// Artisan::command('web-status', function () {
//     dispatch(new MonitorSiteJob);
// })->purpose('Run the web-status job');

// Artisan::command('web-status', function () {
//     // Your job logic here
// })->purpose('Run the web-status job');
