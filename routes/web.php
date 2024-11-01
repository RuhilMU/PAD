<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('laporan.riwayat');
});

Route::get('/home', function () {
    return view('home.home');
});

Route::get('/barang', function () {
    return view('barang.barang');
});

Route::get('/pegawai', function () {
    return view('manajemen.pegawai');
});

Route::get('/email', function () {
    return view('auth.email');
});

Route::get('/reset-password', function () {
    return view('auth.reset');
});

// Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');
