<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
 * Guest routes
 */
Route::middleware(['guest'])->group(function (): void {
    Route::get('/', HomeController::class)->name('homepage');
});
