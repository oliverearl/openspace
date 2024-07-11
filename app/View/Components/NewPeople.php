<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class NewPeople extends Component
{
    public readonly Collection $people;

    public function __construct()
    {
        $this->people = collect(); // TODO: Populate with a database query.
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.new-people', [
            'people' => $this->people,
        ]);
    }
}
