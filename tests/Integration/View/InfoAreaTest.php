<?php

declare(strict_types=1);

use App\Models\InfoBox;
use App\Repositories\InfoBoxRepository;
use App\View\Components\InfoArea;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

it('can render an info area with retrieved info boxes', function (): void {
    $this->mock(InfoBoxRepository::class)
        ->expects('getFrontpageBoxes')
        ->once()
        ->andReturn(collect([
            InfoBox::factory()->make(),
        ]));

    $infoArea = resolve(InfoArea::class);

    expect($infoArea->render())->toBeInstanceOf(View::class);
});

it('can have its cached info area reset', function (): void {
    Cache::spy()->expects('forget')->once();
    InfoArea::reset();
});
