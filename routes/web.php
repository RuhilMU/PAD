<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('home.home');
});

Route::get('/transaksi', function () {
    return view('laporan.transaksi');
});

Route::get('/mingguan', function () {
    return view('laporan.mingguan');
});

Route::get('/bulanan', function () {
    return view('laporan.bulanan');
});

Route::get('/riwayat', function () {
    return view('laporan.riwayat');
});

Route::get('/barang', function () {
    return view('barang.barang');
});

// Route::get('/login', function () {
//     return view('auth.login');
// });

Route::get('/pegawai', [UserController::class, 'index']);
Route::get('/pegawai/create', [UserController::class, 'create'])->name('create');
Route::post('/pegawai', [UserController::class, 'store'])->name('store');
Route::delete('/pegawai/{user_id}', [UserController::class, 'destroy'])->name('destroy');
Route::get('/pegawai/edit/{user_id}', [UserController::class, 'edit'])->name('edit');
Route::post('/pegawai/update/{user_id}', [UserController::class, 'update'])->name('update');



// Route::get('/email', function () {
//     return view('auth.email');
// });

// Route::get('/reset-password', function () {
//     return view('auth.reset');
// });
require __DIR__.'/auth.php';

