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

// Route::get('/transaksi', function () {
//     return view('transaksi.transaksi');
// });

// Route::get('/tambah-transaksi', function () {
//     return view('transaksi.tambah');
// });

// Route::get('/edit-transaksi', function () {
//     return view('transaksi.edit');
// });

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
Route::get('/pegawai/create', [UserController::class, 'create'])->name('pegawai.create');
Route::post('/pegawai', [UserController::class, 'store'])->name('pegawai.store');
Route::delete('/pegawai/{user_id}', [UserController::class, 'destroy'])->name('pegawai.destroy');
Route::get('/pegawai/edit/{user_id}', [UserController::class, 'edit'])->name('pegawai.edit');
Route::post('/pegawai/update/{user_id}', [UserController::class, 'update'])->name('pegawai.update');
Route::get('/pegawai/search', [UserController::class, 'search'])->name('pegawai.search');

Route::get('/barang', [ExpenseController::class, 'index']);
Route::get('/barang/create', [ExpenseController::class, 'create'])->name('barang.create');
Route::post('/barang', [ExpenseController::class, 'store'])->name('barang.store');
Route::delete('/barang/{expense_id}', [ExpenseController::class, 'destroy'])->name('barang.destroy');
Route::get('/barang/edit/{expense_id}', [ExpenseController::class, 'edit'])->name('barang.edit');
Route::post('/barang/update/{expense_id}', [ExpenseController::class, 'update'])->name('barang.update');

Route::get('/transaksi', [ConsignmentController::class, 'laporanIndex'])->name('laporan.index');
Route::get('/transaksi/tambah', [ConsignmentController::class, 'laporanCreate'])->name('laporan.create');
Route::post('/transaksi', [ConsignmentController::class, 'laporanStore'])->name('laporan.store');
Route::post('/transaksi/update/{consignment_id}', [ConsignmentController::class, 'laporanUpdate'])->name('laporan.update');
Route::get('/transaksi/edit/{consignment_id}', [ConsignmentController::class, 'laporanEdit'])->name('laporan.edit');
Route::delete('/transaksi/{consignment_id}', [ConsignmentController::class, 'laporanDestroy'])->name('laporan.destroy');

Route::get('/dashboard', [ConsignmentController::class, 'mainpageIndex'])->name('mainpage.index');
Route::get('/dashboard/search', [ConsignmentController::class, 'mainpageSearch'])->name('mainpage.search');


// Route::get('/email', function () {
//     return view('auth.email');
// });

// Route::get('/reset-password', function () {
//     return view('auth.reset');
// });
require __DIR__.'/auth.php';

