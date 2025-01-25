<?php

declare(strict_types=1);

namespace App\View\Components;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BlogPreview extends Component
{
    /**
     * Constructs a new instance of the blog preview component.
     */
    public function __construct(public readonly User $user) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        // TODO: Posts
        return view('components.blog-preview', [
            'posts' => collect(),
        ]);
    }
}
