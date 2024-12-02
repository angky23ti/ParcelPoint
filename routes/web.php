<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
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

   // Routes Kelas
   Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
   Route::get('/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
   Route::post('/kelas', [KelasController::class, 'store'])->name('kelas.store');
   Route::get('/kelas/{id}/edit', [KelasController::class, 'edit'])->name('kelas.edit');
   Route::patch('/kelas/{id}', [KelasController::class, 'update'])->name('kelas.update');
   Route::delete('/kelas/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');
});

require __DIR__.'/auth.php';
