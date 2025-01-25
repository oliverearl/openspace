<?php

declare(strict_types=1);

namespace App\Actions\Users;

use App\Interfaces\Users\GeneratesProfilePictures;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;
use Exception;

readonly class AddPlaceholderProfilePicture
{
    use AsAction;

    /**
     * Create a new action instance.
     */
    public function __construct(private GeneratesProfilePictures $profilePictureGenerator) {}

    /**
     * Add a placeholder profile picture to the given user.
     */
    public function handle(User $user): void
    {
        try {
            $user
                ->addMediaFromUrl($this->profilePictureGenerator->generateImageUrl($user->uuid))
                ->toMediaCollection(User::PROFILE_PICTURE_LIBRARY);
        } catch (Exception $exception) {
            report($exception);
        }
    }
}
