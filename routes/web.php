<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardContoller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataPelatihanController;

Route::get('', [DashboardController::class, 'home'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/data-pasien', [PasienController::class, 'index'])->middleware(['auth', 'verified']);

Route::get('/data-pelatihan', [DataPelatihanController::class, 'index'])->middleware(['auth', 'verified'])->name('data-pelatihan.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::put('/data-pelatihan/{id}', [DataPelatihanController::class, 'update'])->name('trainings.update');


Route::post('/simpan-data-pasien', [PasienController::class, 'store']);


Route::delete('/delete-data-pasien/{id}', [PasienController::class, 'destroy'])->name('pasiens.destroy');

Route::delete('/delete-data-pelatihan/{id}', [DataPelatihanController::class, 'destroy'])->name('trainings.destroy');


Route::post('/simpan-data-pelatihan', [DataPelatihanController::class, 'store']);
require __DIR__ . '/auth.php';
