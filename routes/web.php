<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/email', function () {
    return view('auth.email');
});

Route::get('/reset-password', function () {
    return view('auth.reset');
});

// Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');

Route::controller(LoginController::class)->group(function() {
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');

});

