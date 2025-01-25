<?php

declare(strict_types=1);

use App\Actions\Users\AddPlaceholderProfilePicture;
use App\Interfaces\Users\GeneratesProfilePictures;
use App\Models\User;
use Mockery\MockInterface;

it('can save an image from the generator to a user', function (): void {
    $user = User::factory()->create();
    expect($user->media()->count())->toEqual(0);

    $this->mock(GeneratesProfilePictures::class, function (MockInterface $mock) use ($user): void {
        $mock
           ->expects('generateImageUrl')
           ->once()
           ->withArgs([$user->uuid])
           ->andReturn('https://fakeimg.pl/300'); // TODO: Can we find a better way of doing this?
    });

    AddPlaceholderProfilePicture::run($user);
    expect($user->media()->count())->toBeGreaterThan(0);
});

it('will close and continue without saving if the service encounters a problem', function (): void {
    $user = User::factory()->create();
    expect($user->media()->count())->toEqual(0);

    $this->mock(GeneratesProfilePictures::class, function (MockInterface $mock) use ($user): void {
        $mock
            ->expects('generateImageUrl')
            ->once()
            ->withArgs([$user->uuid])
            ->andThrow(new RuntimeException('The site is down'));
    });

    AddPlaceholderProfilePicture::run($user);
    expect($user->media()->count())->toEqual(0);
});
