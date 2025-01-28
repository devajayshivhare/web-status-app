<?php

namespace App\Http\Controllers;

use App\Models\SiteLog;
use App\Models\SiteMonitoring;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LogController extends Controller
{
    /**
     * Get logs as JSON for DataTables.
     */
    public function getLogs()
    {
        // $latestSiteMonitoring = SiteMonitoring::latest()->first();
        // $logs = SiteLog::where('site_monitoring_id', $latestSiteMonitoring->id)
        // ->with('siteMonitoring')
        // ->get();

        // $logs = SiteLog::with('siteMonitoring')->get();
        // dd($logs);

        $logs = SiteMonitoring::with(['logs' => function($query) {
            $query->latest()->first(); // Fetch latest log for this site
        }])->get();
        // return DataTables::of($logs)->make(true);
        return DataTables::of($logs)
        ->addColumn('status', function ($site) {
            return $site->logs->count() > 0 ? $site->logs[0]->status : 'NA';
        })
        ->addColumn('checked_at', function ($site) {
            return $site->logs->count() > 0 ? $site->logs[0]->checked_at : 'NA';
        })
        ->make(true);
    }
   
}
