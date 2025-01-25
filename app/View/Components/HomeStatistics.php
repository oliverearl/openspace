<?php

declare(strict_types=1);

namespace App\View\Components;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HomeStatistics extends Component
{
    /**
     * Constructs a new instance of the home actions component.
     */
    public function __construct(public readonly User $user) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.home-statistics');
    }
}
