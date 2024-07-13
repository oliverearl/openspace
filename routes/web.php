<?php

use App\Http\Controllers\Guest\HomepageController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
 * Guest routes
 */
Route::middleware(['guest'])->group(function (): void {
    Route::get('/', HomepageController::class)->name('homepage');
});

/*
 * Authenticated routes
 */
Route::middleware(['auth'])->group(function (): void {
    Route::get('/home', HomeController::class)->name('home');
});
