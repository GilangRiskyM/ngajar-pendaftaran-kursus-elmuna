<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/pendaftaran', [SiswaController::class, 'pendaftaran']);
Route::post('/daftar-kursus', [SiswaController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Route Siswa
    Route::get('/siswa', [SiswaController::class, 'index']);
});

require __DIR__ . '/auth.php';
