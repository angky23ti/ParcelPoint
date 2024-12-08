<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


Route::get('/', function () {
    // Alihkan pengguna ke halaman login jika belum login
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    // Routes Profile Default
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes Siswa
    // Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    // Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    // Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
    // Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    // Route::patch('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    // Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::resource('profile', ProfileController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('guru', GuruController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('ujian', UjianController::class);
});

require __DIR__.'/auth.php';

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
