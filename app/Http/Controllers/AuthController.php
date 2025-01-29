<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function regiser_create()
    {
        return view('auth.register');
    }

    public function register_store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed'
        ]);

        $user = User::create($attributes);

        // Auth::login($user);

        return redirect()->route('login')->with('success', 'Your account has been created.');
    }

    public function login_create()
    {
        return view('auth.login');
    }

    public function login_store(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'custom_error' => 'Invalid Credentials'
            ]);
        }

        $request->session()->regenerate();
        return redirect()->route('dashboard');
    }

    public function destroy()
    {
        // dd('logout');
        Auth::logout();
        return redirect()->route('login');
    }
}
