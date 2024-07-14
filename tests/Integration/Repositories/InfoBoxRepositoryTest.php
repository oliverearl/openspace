<?php

use App\Models\InfoBox;
use App\Repositories\InfoBoxRepository;

beforeEach(function (): void {
    $this->repository = new InfoBoxRepository();
});

it('can retrieve info boxes for the frontpage', function (): void {
    $randomNumberOfBoxes = fake()->randomDigitNotZero();

    InfoBox::factory()->count($randomNumberOfBoxes)->create();

    expect($this->repository->getFrontpageBoxes())
        ->toContainOnlyInstancesOf(InfoBox::class)
        ->toHaveCountLessThanOrEqualTo($randomNumberOfBoxes);
});
