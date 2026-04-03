<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::resource('user', UserController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('lokasi', LokasiController::class);

    Route::get('/barang/laporan', [BarangController::class, 'cetakLaporan'])->name('barang.laporan');
    Route::resource('barang', BarangController::class);

    Route::get('/peminjaman/laporan', [PeminjamanController::class, 'cetakLaporan'])->name('peminjaman.laporan');
    Route::get('/peminjaman/{id}/kembali', [PeminjamanController::class, 'kembali'])->name('peminjaman.kembali');
    Route::put('/peminjaman/{id}/proses-kembali', [PeminjamanController::class, 'prosesKembali'])->name('peminjaman.prosesKembali');
    Route::resource('peminjaman', PeminjamanController::class);

    // 🔥 Route AJAX yang benar
    Route::get('/get-barang-detail/{id}', [PeminjamanController::class, 'getBarang']);

});

require __DIR__.'/auth.php';
