<?php

/** @noinspection PhpUnhandledExceptionInspection */

declare(strict_types=1);

use App\Models\User;
use App\Repositories\UserRepository;

beforeEach(function (): void {
    $this->repository = new UserRepository();
});

it('can retrieve the latest verified users with display pictures', function (): void {
    $user = User::factory()->create();
    $userWithoutPicture = User::factory()->create();

    $displayPicture = test_asset_path('profile_picture.jpg');

    expect($user->email_verified_at)
        ->not()->toBeNull()
        ->and($user->last_logged_in_at)->not()->toBeNull()
        ->and($displayPicture)->toBeFile();

    $user->addMedia($displayPicture)
        ->preservingOriginal()
        ->toMediaCollection($user::PROFILE_PICTURE_LIBRARY);

    expect($user->getMedia($user::PROFILE_PICTURE_LIBRARY))
        ->toHaveCount(1)
        ->and($userWithoutPicture->media->all())->toBeEmpty()
        ->and($this->repository->getLatestUsers())
        ->toHaveCount(1)
        ->toContainOnlyInstancesOf(User::class);

    // Clean up
    $user->clearMediaCollection(User::PROFILE_PICTURE_LIBRARY);
});
