<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Redirect root ke login
Route::get('/', fn () => redirect('/login'));

// Autentikasi
Route::get('/login', [PageController::class, 'login'])->name('login');
Route::post('/login', [PageController::class, 'authenticate']);
Route::get('/register', [PageController::class, 'register'])->name('register');
Route::post('/register', [PageController::class, 'storeRegister']);
Route::post('/logout', [PageController::class, 'logout'])->name('logout');

// Dashboard & Profile
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
// Route::get('/pengelolaan', [PageController::class, 'pengelolaan'])->name('pengelolaan');
Route::get('/profile', [PageController::class, 'profile'])->name('profile');

Route::middleware(['check.auth'])->group(function () {
    Route::get('/pengelolaan', [PageController::class, 'pengelolaan'])->name('pengelolaan');
    
    Route::prefix('umkm')->group(function () {
        Route::get('/', [PageController::class, 'pengelolaan'])->name('pengelolaan');
        Route::get('/tambah', [PageController::class, 'create'])->name('tambah');
        Route::post('/tambah', [PageController::class, 'store'])->name('store');
        Route::get('/ubah/{id}', [PageController::class, 'edit'])->name('edit');
        Route::put('/ubah/{id}', [PageController::class, 'update'])->name('update');
        Route::delete('/hapus/{id}', [PageController::class, 'destroy'])->name('destroy');
    });
});