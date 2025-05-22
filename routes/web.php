<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



use App\Models\DataProdi;

Route::get('/dashboard', function () {
    $dataProdi = DataProdi::all();  // Ambil semua data prodi
    return view('dashboard', compact('dataProdi'));
})->name('dashboard');

// Letakkan redirect setelah route 'dashboard' didefinisikan
Route::get('/', function () {
    return redirect()->route('dashboard');
});

use App\Http\Controllers\DataProdiController;

Route::resource('prodi', DataProdiController::class);



