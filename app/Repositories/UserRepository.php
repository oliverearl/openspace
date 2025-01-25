<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Collection;

class UserRepository
{
    /**
     * Return a collection of the latest, verified users that have display pictures.
     *
     * @return \Illuminate\Support\Collection<int, \App\Models\User>
     */
    public function getLatestUsers(int $limit = 6): Collection
    {
        return User::query()
            ->withWhereHas('media')
            ->whereNotNull('email_verified_at')
            ->whereNotNull('last_logged_in_at')
            ->limit($limit)
            ->latest()
            ->get();
    }
}
