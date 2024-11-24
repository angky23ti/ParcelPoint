<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Middleware\Authenticate;

Route::get('/', function () {
    return view('SideBar/navbar');
});

Route::middleware([Authenticate::class])->group(function () {
    Route::resource('siswa', SiswaController::class);
    // Route::resource('daftar', DaftarController::class);
});
