<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\bankSoalController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\Auth\LoginController



Route::middleware(['auth'])->group(function () {
    Route::resource('siswa',SiswaController::class);
    Route::resource('guru',GuruController::class);
    Route::resource('dashboard',DashboardController::class);
    Route::resource('ujian',UjianController::class);
    Route::resource('bankSoal',bankSoalController::class);
    Route::get('/', function () {
        return view('SideBar/navbar');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
