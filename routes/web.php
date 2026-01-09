<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route untuk ADMIN
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Route untuk fitur kelola pengguna
    Route::resource('users', UserController::class);

    // Route untuk fitur lainnya (akan dibuat nanti)
    Route::get('/locations', function () {
        return 'Lokasi Alat';
    })->name('locations.index');
    
    // Route::get('/users', function () {
    //     return 'Kelola Pengguna';
    // })->name('users.index');
    
    Route::get('/qrcode', function () {
        return 'QR Code';
    })->name('qrcode.index');
    
    Route::get('/reports', function () {
        return 'Laporan';
    })->name('reports.index');
});

// Route untuk STAFF
Route::middleware(['auth', 'role:staff'])->prefix('staff')->name('staff.')->group(function () {
    Route::get('/dashboard', function () {
        return 'Dashboard Staff Lab';
    })->name('dashboard');
});

// Route untuk DOSEN
Route::middleware(['auth', 'role:dosen'])->prefix('dosen')->name('dosen.')->group(function () {
    Route::get('/dashboard', function () {
        return 'Dashboard Dosen';
    })->name('dashboard');
});

// Route untuk MAHASISWA
Route::middleware(['auth', 'role:mahasiswa'])->prefix('mahasiswa')->name('mahasiswa.')->group(function () {
    Route::get('/dashboard', function () {
        return 'Dashboard Mahasiswa';
    })->name('dashboard');
});