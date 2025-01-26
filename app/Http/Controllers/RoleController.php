<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{   
    
    public function index()
    {
        if(!Auth::check())
        {
            abort(403, 'Unauthorized access');
        }

        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        if(!Auth::check())
        {
            abort(403, 'Unauthorized access');
        }

        return view('roles.create');
    }

    public function store(Request $request)
    {
        if(!Auth::check())
        {
            abort(403, 'Unauthorized access');
        }

        $request->validate(['name' => 'required|unique:roles']);
        Role::create(['name' => $request->name]);
        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    public function edit(Role $role)
    {
        if(!Auth::check())
        {
            abort(403, 'Unauthorized access');
        }

        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        if(!Auth::check())
        {
            abort(403, 'Unauthorized access');
        }

        $request->validate(['name' => 'required|unique:roles,name,' . $role->id]);
        $role->update(['name' => $request->name]);
        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy(Role $role)
    {
        if(!Auth::check())
        {
            abort(403, 'Unauthorized access');
        }

        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }

    public function assignPermissions(Request $request, Role $role)
    {
        if(!Auth::check())
        {
            abort(403, 'Unauthorized access');
        }

        $role->syncPermissions($request->permissions);
        return redirect()->route('roles.edit', $role)->with('success', 'Permissions assigned successfully.');
    }

    public function assignRolesToUser(Request $request, $userId)
    {
        if(!Auth::check())
        {
            abort(403, 'Unauthorized access');
        }

        $user = \App\Models\User::findOrFail($userId);
        $user->syncRoles($request->roles);
        return redirect()->route('users.index')->with('success', 'Roles assigned successfully.');
    }
}
