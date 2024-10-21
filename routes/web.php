<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/forgot-password', function () {
    return view('auth.reset');
});

// Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');