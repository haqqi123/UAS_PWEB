<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [PageController::class, 'login'])->name('login');
Route::post('/login', [PageController::class, 'authenticate']);
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/pengelolaan', [PageController::class, 'pengelolaan'])->name('pengelolaan');
Route::get('/profile', [PageController::class, 'profile'])->name('profile');

Route::prefix('umkm')->group(function () {
    Route::get('/', function () {
        $umkms = App\Models\UMKM::all();
        return view('umkm', compact('umkms'));
    })->name('umkm.index');
    
    Route::get('/tambah', function () {
        return view('tambah-umkm');
    })->name('umkm.create');
    
    Route::post('/tambah', [PageController::class, 'store'])->name('umkm.store');
    
    Route::get('/ubah/{id}', function ($id) {
        $umkm = App\Models\UMKM::findOrFail($id);
        return view('ubah-umkm', compact('umkm'));
    })->name('umkm.edit');
    
    Route::put('/ubah/{id}', [PageController::class, 'update'])->name('umkm.update');
    
    Route::delete('/hapus/{id}', [PageController::class, 'destroy'])->name('umkm.destroy');
});