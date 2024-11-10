<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardContoller;
use App\Http\Controllers\DashboardController;


Route::get('', [DashboardController::class, 'home']);
// ->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/data-pasien', [PasienController::class, 'index']);
// ->middleware(['auth', 'verified'])->name('pasien.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
