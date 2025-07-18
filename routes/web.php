<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UMKMController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUMKMController;
use App\Http\Controllers\Admin\AdminArticleController;

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

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
    Route::get('/umkm', [AdminUMKMController::class, 'index'])->name('umkm.index');
    Route::get('/umkm/{umkm}', [AdminUMKMController::class, 'show'])->name('umkm.show');
    Route::put('/umkm/{umkm}/approve', [AdminUMKMController::class, 'approve'])->name('umkm.approve');
    Route::put('/umkm/{umkm}/reject', [AdminUMKMController::class, 'reject'])->name('umkm.reject');
    Route::put('/umkm/{umkm}/update-status', [AdminUMKMController::class, 'updateStatus'])->name('umkm.update-status');
    Route::delete('/umkm/{id}', [AdminUMKMController::class, 'destroy'])->name('umkm.destroy');

    // Article Management
    Route::resource('article', AdminArticleController::class);


    // Population Statistics
    Route::get('/population', [App\Http\Controllers\Admin\AdminPopulationController::class, 'index'])->name('population.index');

    // Organization Management
    Route::get('/organization', [App\Http\Controllers\Admin\AdminOrganizationController::class, 'index'])->name('organization.index');
});
