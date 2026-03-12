<?php

use App\Http\Controllers\LoadingController;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;

// Loading screen
Route::get('/', [LoadingController::class, 'index']);

// Portfolio
Route::get('/about', [AboutController::class, 'index'])->name('about');