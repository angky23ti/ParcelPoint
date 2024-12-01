<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UjianController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Routes Profile
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes Siswa
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::patch('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

    // Routes Guru
    Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
    Route::get('/guru/create', [GuruController::class, 'create'])->name('guru.create');
    Route::post('/guru', [GuruController::class, 'store'])->name('guru.store');
    Route::get('/guru/{id}/edit', [GuruController::class, 'edit'])->name('guru.edit');
    Route::patch('/guru/{id}', [GuruController::class, 'update'])->name('guru.update');
    Route::delete('/guru/{id}', [GuruController::class, 'destroy'])->name('guru.destroy');
    // Routes Ujian
    Route::get('/ujian', [UjianController::class, 'index'])->name('ujian.index');
    Route::get('/ujian/create', [UjianController::class, 'create'])->name('ujian.create');
    Route::post('/ujian', [UjianController::class, 'store'])->name('ujian.store');
    Route::get('/ujian/{id}/edit', [UjianController::class, 'edit'])->name('ujian.edit');
    Route::patch('/ujian/{id}', [UjianController::class, 'update'])->name('ujian.update');
    Route::delete('/ujian/{id}', [UjianController::class, 'destroy'])->name('ujian.destroy');

});

require __DIR__.'/auth.php';
