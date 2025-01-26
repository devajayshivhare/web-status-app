<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Role $roles)
    {
        $users = User::all();
        return view('users.index', compact('users', 'roles'));
    }
}
