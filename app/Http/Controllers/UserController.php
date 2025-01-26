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
        if(!Auth::check())
        {
            abort(403, 'Unauthorized access');
        }

        $users = User::all();
        return view('users.index', compact('users', 'roles'));
    }
}
