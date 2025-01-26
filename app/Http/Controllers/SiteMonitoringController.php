<?php

namespace App\Http\Controllers;

use App\Models\SiteMonitoring;
use App\Models\SiteLog;
use Illuminate\Http\Request;

class SiteMonitoringController extends Controller
{
    public function index()
    {
        $sites = SiteMonitoring::with('logs')->get();
        // dd($sites);
        return view('site_monitoring.index', compact('sites'));
    }

    public function create()
    {
        return view('site_monitoring.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'site_url' => 'required|url',
            'task_frequency' => 'required|integer|min:1',
        ]);

        SiteMonitoring::create($request->all());

        return redirect()->route('site_monitoring.index')->with('success', 'Site added successfully.');
    }
}
