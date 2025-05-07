<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\CekRole;

// Halaman awal
Route::get('/', function () {
    return view('welcome');
});

// Dashboard default Laravel (opsional)
Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Route login/register dari Breeze
require __DIR__.'/auth.php';

// Middleware auth umum (untuk profile)
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ============ ADMIN ROUTES ============
Route::middleware(['auth', CekRole::class . ':admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/buku', [BookController::class, 'index'])->name('buku.index');
    Route::get('/admin/buku/create', [BookController::class, 'create'])->name('buku.create');
    Route::post('/admin/buku', [BookController::class, 'store'])->name('buku.store');

    Route::get('/admin/peminjaman', [BookController::class, 'peminjaman'])->name('admin.peminjaman');
    Route::get('/admin/peminjaman/kembalikan/{id}', [BookController::class, 'kembalikan'])->name('admin.kembalikan');
    Route::get('/admin/peminjaman/export-pdf', [BookController::class, 'exportPdf'])->name('admin.peminjaman.pdf');

});

// ============ USER ROUTES ============
Route::middleware(['auth', CekRole::class . ':user'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    Route::get('/user/katalog', [BookController::class, 'katalog'])->name('user.katalog');
    Route::get('/user/katalog/pinjam/{id}', [BookController::class, 'pinjam'])->name('user.pinjam');
    
});
