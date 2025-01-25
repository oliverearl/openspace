<?php

declare(strict_types=1);

namespace App\Services;

use App\Interfaces\Users\GeneratesProfilePictures;

class RobohashService implements GeneratesProfilePictures
{
    /**
     * The base URL for the Robohash service.
     */
    final public const string ROBOHASH_URL = 'https://robohash.org';

    /** @inheritDoc */
    public function generateImageUrl(string $seed): string
    {
        return sprintf("%s/%s?set=set5", self::ROBOHASH_URL, $seed);
    }
}
