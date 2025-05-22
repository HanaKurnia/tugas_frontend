<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataProdiController;
use App\Http\Controllers\KelasController;

Route::resource('prodi', DataProdiController::class);



Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::resource('prodi', DataProdiController::class);
Route::get('/dataProdi/{kode_prodi}', [DataProdiController::class, 'show'])->name('prodi.show');
Route::put('/dataProdi/{kode_prodi}', [DataProdiController::class, 'update'])->name('prodi.update');

Route::resource('kelas', KelasController::class);
