<?php

use App\View\Components\Navbar;
use Illuminate\Support\Facades\Cache;

it('can build a navbar based on feature flags')->todo();

it('can have its cached navbar reset', function (): void {
   Cache::spy()->expects('forget')->once();
   Navbar::reset();
});
