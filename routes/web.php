<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Redirect root ke login
Route::get('/', fn () => redirect('/login'));

// Autentikasi
Route::get('/login', [PageController::class, 'login'])->name('login');
Route::post('/login', [PageController::class, 'authenticate']);
Route::post('/logout', [PageController::class, 'logout'])->name('logout');

// Dashboard & Profile
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/profile', [PageController::class, 'profile'])->name('profile');

Route::middleware(['check.auth'])->group(function () {
    // UMKM Routes
    Route::prefix('umkm')->group(function () {
        Route::get('/', [PageController::class, 'pengelolaan'])->name('pengelolaan');
        Route::get('/create', [PageController::class, 'create'])->name('umkm.create');
        Route::post('/store', [PageController::class, 'store'])->name('umkm.store');
        Route::get('/{id}', [PageController::class, 'show'])->name('umkm.show');
        Route::get('/{id}/edit', [PageController::class, 'edit'])->name('umkm.edit');
        Route::put('/{id}', [PageController::class, 'update'])->name('umkm.update');
        Route::delete('/{id}', [PageController::class, 'destroy'])->name('umkm.destroy');
    });
});