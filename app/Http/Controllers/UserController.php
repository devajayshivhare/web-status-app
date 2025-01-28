<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Role $roles)
    {
        // if(!Auth::check())
        // {
        //     abort(403, 'Unauthorized access');
        // }
        $users = User::all();
        // dd($users);
        return view('users.index', compact('users', 'roles'));
    }

    // public function update(Request $request, User $user)
    // {
    //     $request->validate(['role' => 'required']);
    //     $user->syncRoles($request->role);
    //     return redirect()->route('users.index')->with('success', 'User role updated successfully.');
    // }
    // Function to update role when dropdown is changed
    public function update(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:user,admin', // Ensure only valid roles
        ]);

        $user->role = $request->role;
        $user->save();

        return back()->with('success', 'User role updated successfully.');
    }

    // Function to assign a role manually (Optional)
    // public function assignRole(User $user)
    // {
    //     $user->role = 'admin'; // Example: Assign Admin role
    //     $user->save();

    //     return back()->with('success', 'User assigned as Admin.');
    // }


}
