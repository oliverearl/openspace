<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class InfoBox extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'link',
        'destination',
        'active_from',
        'active_to',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'active_from' => 'datetime',
            'active_to' => 'datetime',
        ];
    }

    /**
     * Return only info boxes that are currently designated to be active.
     * This includes boxes without expiry dates.
     */
    public function scopeIsActive(Builder $query): Builder
    {
        $now = Carbon::now();

        return $query
            ->whereDate('active_from', '<=', $now)
            ->where(function (Builder $query) use ($now): void {
                $query
                    ->whereNull('active_to')
                    ->orWhereDate('active_to', '>=', $now);
            });
    }
}
