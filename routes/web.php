<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\UjianController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes Siswa
    // Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    // Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    // Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
    // Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    // Route::patch('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    // Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
    Route::resource('siswa', SiswaController::class);
    Route::resource('guru', GuruController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('ujian', UjianController::class);
});

require __DIR__.'/auth.php';
