<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\bankSoalController;
use App\Http\Middleware\Authenticate;
// use App\Http\Controllers\Auth\LoginController

Route::get('/', function () {
    return view('SideBar/navbar');
});

Route::middleware([Authenticate::class])->group(function () {
    Route::resource('/siswa', SiswaController::class);
    Route::resource('/guru', GuruController::class);
    Route::resource('/dashboard', DashboardController::class);
    Route::resource('/ujian', UjianController::class);
    Route::resource('/bankSoal', bankSoalController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
