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
        $latestSiteMonitoring = SiteMonitoring::latest()->first();
        $logs = SiteLog::where('site_monitoring_id', $latestSiteMonitoring->id)
        ->with('siteMonitoring')
        ->get();

        // $logs = SiteLog::with('siteMonitoring')->get();
        // dd($logs);
        return DataTables::of($logs)->make(true);
    }
   
}
