<?php

declare(strict_types=1);

use App\Services\RobohashService;

it('can generate a Robohash image URL', function (): void {
    $service = new RobohashService();
    $url = $service->generateImageUrl('test');

    expect($url)->toEqual(RobohashService::ROBOHASH_URL . '/test?set=set5');
});
