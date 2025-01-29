<?php

namespace App\Http\Controllers;

use App\Models\SiteMonitoring;
use App\Models\SiteLog;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class SiteMonitoringController extends Controller
{
    public function index()
    {
        // $sites = SiteMonitoring::with('logs')->latest()->first();
        // $sites = SiteMonitoring::with('logs')->get();

        // $sites = SiteMonitoring::where('user_id', Auth::id())->with(['logs' => function($query) {
        //     $query->latest()->first(); // Fetch latest log for this site
        // }])->get();
// dd(!(Auth::user()->role !== 'admin'));
// dd(Auth::check());
        $sites = SiteMonitoring::when((Auth::user()->role !== 'admin'), function ($query) {
            $query->where('user_id', Auth::id()); // Filter by user_id for non-admin users
        })
        ->with(['logs' => function ($query) {
            $query->latest()->limit(1); // Fetch only the latest log per site
        }])
        ->get();
        // dd($sites);
        // return view('site_monitoring.index', compact('sites'));
        return view('dashboard', compact('sites'));
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

        $userId = Auth::id();
        // dd($request->all());
        // dd(Auth::id());
        // SiteMonitoring::create($request->all());
        SiteMonitoring::create([
            'user_id' => $userId, // Assign current user ID
            'site_url' => $request->site_url,
            'task_frequency' => $request->task_frequency,
        ]);
    

        return redirect()->route('site_monitoring.index')->with('success', 'Site added successfully.');
    }
}
