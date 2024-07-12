<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Render the homepage.
     */
    public function __invoke(): View
    {
        return view('homepage', [
            'title' => 'Homepage',
        ]);
    }
}
