<?php

use Illuminate\Support\Facades\Auth;

if (! function_exists('homepage_route')) {
    /**
     * Renders the correct route to the homepage depending on the currently authenticated user.
     */
    function homepage_route(): string
    {
        return Auth::guest()
            ? route('homepage')
            : route('home');
    }
}
