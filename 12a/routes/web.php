<?php

use App\Http\Controllers\LoadingController;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;

// Loading screen → halaman utama
Route::get('/', [LoadingController::class, 'index']);

// Portfolio utama
Route::get('/about', [AboutController::class, 'index'])->name('about');