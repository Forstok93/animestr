<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;

Route::get('/', [AnimeController::class, 'index'])->name('home');
Route::get('/anime/{id}', [AnimeController::class, 'show'])->name('anime.show');
Route::get('/catalog', [AnimeController::class, 'catalog'])->name('anime.catalog');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/favorite/{anime}', [ProfileController::class, 'favorite'])->name('profile.favorite');
    Route::post('/profile/history/{anime}', [ProfileController::class, 'history'])->name('profile.history');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
});

require __DIR__.'/auth.php';
