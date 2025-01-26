<?php

namespace App\Http\Controllers;

use App\Models\SiteLog;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LogController extends Controller
{
    /**
     * Get logs as JSON for DataTables.
     */
    public function getLogs()
    {
        $logs = SiteLog::with('siteMonitoring')->get();
        return DataTables::of($logs)->make(true);
    }
   
}
