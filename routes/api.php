<?php

use App\Http\Controllers\Api\V1\InfoBoxController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->name('api.v1.')->group(function (): void {
    Route::apiResource('info-boxes', InfoBoxController::class)->names('info-boxes');
});
