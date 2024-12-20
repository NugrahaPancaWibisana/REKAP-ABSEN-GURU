<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get('/search', [Controllers\GuruController::class, 'search'])->name('search');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/guru', [Controllers\GuruController::class, 'index'])->name('guru');
    Route::get('/guru/{name}/rekap', [Controllers\GuruController::class, 'create'])->name('guru.create');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [Controllers\HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/export', [Controllers\HomeController::class, 'export'])->name('admin.export');
    Route::get('admin/perbarui/rekap', [Controllers\HomeController::class, 'index'])->name('admin.perbarui.rekap');
    Route::get('admin/tambah/user', [Controllers\HomeController::class, 'index'])->name('admin.tambah.user');
    // Route::get('/profile', [Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [Controllers\ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
