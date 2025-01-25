<?php

declare(strict_types=1);

namespace App\Interfaces\Users;

interface GeneratesProfilePictures
{
    /**
     * Returns the URL of a generated image.
     */
    public function generateImageUrl(string $seed): string;
}
