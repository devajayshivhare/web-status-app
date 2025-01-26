<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\SiteMonitoringController;
use App\Http\Controllers\ChatbotController;

// Route::get('/h', function () {
//     return view('dashboard');
// });





Route::middleware(['auth'])->group(function () {
    Route::get('/', [SiteMonitoringController::class, 'index'])->name('dashboard');
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


Route::resource('site_monitoring', SiteMonitoringController::class);

Route::get('/users/log', [LogController::class, 'getLogs'])->name('users.log');

Route::post('/chatbot/message', [ChatbotController::class, 'getMessage']);

