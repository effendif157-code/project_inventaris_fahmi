<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PeminjamanController;



Route::get('/', function () {
    return view('welcome');
});

// Auth routes (Register dimatikan sesuai kodingan Anda)
Auth::routes(['register' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Bungkus semua yang butuh login di sini
Route::middleware('auth')->group(function () {

    // Dashboard routes
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::resource('users', UserController::class);
    });

    // Pindahkan ke sini agar Auth::user() selalu ada (tidak null)
    Route::resource('kategori', KategoriController::class);
    Route::resource('barang', BarangController::class);
    Route::resource('lokasi', LokasiController::class);
    Route::resource('peminjaman', PeminjamanController::class);

    // Option A: Manual naming
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');

  
});

