<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ConsignmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('home.home');
// });

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
Route::get('/pegawai/search', [UserController::class, 'search'])->name('search');

Route::get('/barang', [ExpenseController::class, 'index']);
Route::get('/barang/create', [ExpenseController::class, 'create'])->name('create');
Route::post('/barang', [ExpenseController::class, 'store'])->name('store');
Route::delete('/barang/{expense_id}', [ExpenseController::class, 'destroy'])->name('destroy');
Route::get('/barang/edit/{expense_id}', [ExpenseController::class, 'edit'])->name('edit');
Route::post('/barang/update/{expense_id}', [ExpenseController::class, 'update'])->name('update');

Route::get('/laporan', [ConsignmentController::class, 'laporanIndex'])->name('laporan.index');
Route::post('/laporan', [ConsignmentController::class, 'laporanStore'])->name('laporan.store');
Route::put('/laporan/{consignment}', [ConsignmentController::class, 'laporanUpdate'])->name('laporan.update');
Route::delete('/laporan/{consignment}', [ConsignmentController::class, 'laporanDestroy'])->name('laporan.destroy');

Route::get('/dashboard', [ConsignmentController::class, 'mainpageIndex'])->name('mainpage.index');
Route::post('/dashboard', [ConsignmentController::class, 'mainpageStore'])->name('mainpage.store');
Route::put('/mainpage/{consignment}', [ConsignmentController::class, 'mainpageUpdate'])->name('mainpage.update');
Route::delete('/mainpage/{consignment}', [ConsignmentController::class, 'mainpageDestroy'])->name('mainpage.destroy');

// Route::get('/email', function () {
//     return view('auth.email');
// });

// Route::get('/reset-password', function () {
//     return view('auth.reset');
// });
require __DIR__.'/auth.php';

