<?php

declare(strict_types=1);

namespace App\Providers;

use App\Interfaces\Users\GeneratesProfilePictures;
use App\Services\RobohashService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Interface bindings:
        $this->app->bind(GeneratesProfilePictures::class, RobohashService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
