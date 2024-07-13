<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class HomepageController extends Controller
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
