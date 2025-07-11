<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UMKMController;

// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Autentikasi
Route::get('/login', [PageController::class, 'login'])->name('login');
Route::post('/login', [PageController::class, 'authenticate']);
Route::post('/logout', [PageController::class, 'logout'])->name('logout');

// Dashboard & Profile
Route::get('/profile', [PageController::class, 'profile'])->name('profile');

// UMKM
Route::get('/umkm', [UMKMController::class, 'index'])->name('umkm.index');
Route::get('/umkm/{id}', [UMKMController::class, 'show'])->name('umkm.show');


Route::middleware(['check.auth'])->group(function () {
    Route::get('/pengelolaan', [PageController::class, 'pengelolaan'])->name('pengelolaan');

    // UMKM Routes
    // Route::prefix('umkm')->group(function () {
    //     Route::get('/create', [PageController::class, 'create'])->name('umkm.create');
    //     Route::post('/store', [PageController::class, 'store'])->name('umkm.store');
    //     Route::get('/{id}', [PageController::class, 'show'])->name('umkm.show');
    //     Route::get('/{id}/edit', [PageController::class, 'edit'])->name('umkm.edit');
    //     Route::put('/{id}', [PageController::class, 'update'])->name('umkm.update');
    //     Route::delete('/{id}', [PageController::class, 'destroy'])->name('umkm.destroy');
    // });
});
