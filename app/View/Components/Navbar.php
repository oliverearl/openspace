<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\View\Component;

class Navbar extends Component
{
    public const string NAVBAR_KEY = 'navbar_key';

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.navbar', [
            'links' => $this->constructNavbar(),
        ]);
    }

    /**
     * Builds a renderable navigation bar based on active feature flags.
     *
     * @return array<string, string>
     */
    private function constructNavbar(): array
    {
        // TODO: Apply feature flags and other controls that determine rendering of links.
        return Cache::rememberForever(self::NAVBAR_KEY, fn(): array => [
            'Home' => homepage_route(),
            'Browse' => '',
            'Search' => '',
            'Mail' => '',
            'Blog' => '',
            'Bulletins' => '',
            'Forum' => '',
            'Groups' => '',
            'Layouts' => '',
            'Favs' => '',
            'Source' => Config::string('openspace.social.github'),
            'Help' => '',
            'About' => '',
        ]);
    }
}
