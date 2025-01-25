<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


// Route::get('/h', function () {
//     return view('dashboard');
// });





Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
});

Route::middleware(['guest'])->group(function () {
    //register
    Route::get('/register', [AuthController::class, 'regiser_create'])->name('register');
    Route::post('/register', [AuthController::class, 'register_store']);
    //Login
    Route::get('/login', [AuthController::class, 'login_create'])->name('login');
    Route::post('/login', [AuthController::class, 'login_store']);
    //Logout
});
