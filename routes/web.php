<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UMKMController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminDashboardController;

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Dashboard & Profile
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [PageController::class, 'profile'])->name('profile');
});

// UMKM
Route::get('/umkm', [UMKMController::class, 'index'])->name('umkm.index');
Route::get('/umkm/create', [UMKMController::class, 'create'])->name('umkm.create');
Route::post('/umkm', [UMKMController::class, 'store'])->name('umkm.store');
Route::get('/umkm/{umkm:slug}', [UMKMController::class, 'show'])->name('umkm.show');

// Artikel
Route::get('/artikel/{article:slug}', [App\Http\Controllers\ArticleController::class, 'show'])->name('artikel.show');

// Admin Routes
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // UMKM Management
    Route::get('/umkm', [App\Http\Controllers\Admin\AdminUMKMController::class, 'index'])->name('umkm.index');
    Route::get('/umkm/{umkm}', [App\Http\Controllers\Admin\AdminUMKMController::class, 'show'])->name('umkm.show');

    // Article Management
    Route::get('/articles', [App\Http\Controllers\Admin\AdminArticleController::class, 'index'])->name('articles.index');
    Route::get('/articles/{article}/edit', [App\Http\Controllers\Admin\AdminArticleController::class, 'edit'])->name('articles.edit');

    // Population Statistics
    Route::get('/population', [App\Http\Controllers\Admin\AdminPopulationController::class, 'index'])->name('population.index');

    // Organization Management
    Route::get('/organization', [App\Http\Controllers\Admin\AdminOrganizationController::class, 'index'])->name('organization.index');
});
