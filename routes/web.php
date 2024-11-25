<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ExpenseController;
USE App\Http\Controllers\KeuanganController;
use App\Http\Controllers\ConsignmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ConsignmentController::class, 'mainpageIndex'])->name('mainpage.index');
    Route::get('/dashboard/search', [ConsignmentController::class, 'mainpageSearch'])->name('mainpage.search');
    Route::get('/dashboard/daily-report', [KeuanganController::class, 'getDailyReport']);

    Route::get('/transaksi', [ConsignmentController::class, 'laporanIndex'])->name('laporan.index');
    Route::get('/transaksi/tambah', [ConsignmentController::class, 'laporanCreate'])->name('laporan.create');
    Route::post('/transaksi', [ConsignmentController::class, 'laporanStore'])->name('laporan.store');
    Route::post('/transaksi/update/{consignment_id}', [ConsignmentController::class, 'laporanUpdate'])->name('laporan.update');
    Route::get('/transaksi/edit/{consignment_id}', [ConsignmentController::class, 'laporanEdit'])->name('laporan.edit');
    Route::delete('/transaksi/{consignment_id}', [ConsignmentController::class, 'laporanDestroy'])->name('laporan.destroy');

    Route::middleware('owner')->group(function () {
        Route::get('/pegawai', [UserController::class, 'index'])->name('pegawai.index');
        Route::get('/pegawai/create', [UserController::class, 'create'])->name('pegawai.create');
        Route::post('/pegawai', [UserController::class, 'store'])->name('pegawai.store');
        Route::delete('/pegawai/{user_id}', [UserController::class, 'destroy'])->name('pegawai.destroy');
        Route::get('/pegawai/edit/{user_id}', [UserController::class, 'edit'])->name('pegawai.edit');
        Route::post('/pegawai/update/{user_id}', [UserController::class, 'update'])->name('pegawai.update');
        Route::get('/pegawai/search', [UserController::class, 'search'])->name('pegawai.search');

        Route::get('/barang', [ExpenseController::class, 'index'])->name('barang.index');
        Route::get('/barang/create', [ExpenseController::class, 'create'])->name('barang.create');
        Route::post('/barang', [ExpenseController::class, 'store'])->name('barang.store');
        Route::delete('/barang/{expense_id}', [ExpenseController::class, 'destroy'])->name('barang.destroy');
        Route::get('/barang/edit/{expense_id}', [ExpenseController::class, 'edit'])->name('barang.edit');
        Route::post('/barang/update/{expense_id}', [ExpenseController::class, 'update'])->name('barang.update');

        Route::get('/barang/unduh', [ExpenseController::class, 'pageunduh'])->name('barang.unduh');
        Route::post('/barang/pdf', [ExpenseController::class, 'download'])->name('downloadPdf');

        Route::get('/mingguan', [KeuanganController::class, 'mingguanIndex'])->name('mingguan.index');
        Route::get('/mingguan/weekly-report', [KeuanganController::class, 'getWeeklyReport']);

        Route::get('/bulanan', [KeuanganController::class, 'bulananIndex'])->name('bulanan.index');
        Route::get('/bulanan/monthly-report', [KeuanganController::class, 'getMonthlyReport']);

        Route::get('/riwayat/yearly-report', [KeuanganController::class, 'getYearlyReport']);
        Route::get('/riwayat/product-percentage', [KeuanganController::class, 'getProductsPercentage']);
        Route::get('/riwayat', [KeuanganController::class, 'getOmsetAndProfit']);
    });
});
require __DIR__.'/auth.php';

