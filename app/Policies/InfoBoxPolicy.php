<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\InfoBox;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InfoBoxPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any info boxes.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the info box.
     */
    public function view(User $user, InfoBox $infoBox): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create info boxes.
     */
    public function create(User $user): bool
    {
        return false; // TODO: Admin privileges required for this.
    }

    /**
     * Determine whether the user can update the info box.
     */
    public function update(User $user, InfoBox $infoBox): bool
    {
        return false; // As above.
    }

    /**
     * Determine whether the user can delete the info box.
     */
    public function delete(User $user, InfoBox $infoBox): bool
    {
        return false; // As above.
    }
}
