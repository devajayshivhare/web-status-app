<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        if(!Auth::check())
        {
            abort(403, 'Unauthorized access');
        }

        $permissions = Permission::all();
        return view('permissions.index', compact('permissions'));
    }

    public function create()
    {
        if(!Auth::check())
        {
            abort(403, 'Unauthorized access');
        }

        return view('permissions.create');
    }

    public function store(Request $request)
    {
        if(!Auth::check())
        {
            abort(403, 'Unauthorized access');
        }

        $request->validate(['name' => 'required|unique:permissions']);
        Permission::create(['name' => $request->name]);
        return redirect()->route('permissions.index')->with('success', 'Permission created successfully.');
    }

    public function edit(Permission $permission)
    {
        if(!Auth::check())
        {
            abort(403, 'Unauthorized access');
        }

        return view('permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        if(!Auth::check())
        {
            abort(403, 'Unauthorized access');
        }

        $request->validate(['name' => 'required|unique:permissions,name,' . $permission->id]);
        $permission->update(['name' => $request->name]);
        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully.');
    }

    public function destroy(Permission $permission)
    {
        if(!Auth::check())
        {
            abort(403, 'Unauthorized access');
        }

        $permission->delete();
        return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully.');
    }
}
