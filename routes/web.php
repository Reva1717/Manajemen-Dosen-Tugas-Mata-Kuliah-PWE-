<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\ProdiController;

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('dosen', DosenController::class);
    Route::get('/dosen-json', [DosenController::class, 'json'])->middleware('auth');
    Route::resource('prodi', ProdiController::class);
});
