<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\InfoBox;
use Illuminate\Support\Collection;

class InfoBoxRepository
{
    /**
     * Retrieve a set of info boxes for display.
     *
     * @return \Illuminate\Support\Collection<int, \App\Models\InfoBox>
     */
    public function getFrontpageBoxes(int $limit = 4): Collection
    {
        return InfoBox::query()
            ->isActive()
            ->inRandomOrder()
            ->limit($limit)
            ->get();
    }
}
