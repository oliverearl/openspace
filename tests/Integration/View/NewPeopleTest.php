<?php

use App\Models\User;
use App\Repositories\UserRepository;
use App\View\Components\NewPeople;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

it('can render a new people box with the latest users', function (): void {
    $this->mock(UserRepository::class)
        ->expects('getLatestUsers')
        ->withAnyArgs()
        ->once()
        ->andReturn(collect([
            User::factory()->make(),
        ]));

    $component = resolve(NewPeople::class);

    expect($component->render())->toBeInstanceOf(View::class);
});

it('can have its cache reset', function (): void {
    Cache::spy()->expects('forget')->once();
    NewPeople::reset();
});
