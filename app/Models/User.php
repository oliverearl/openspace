<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia, MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use InteractsWithMedia;
    use Notifiable;

    /**
     * Spatie key for profile pictures.
     */
    public const string PROFILE_PICTURE_LIBRARY = 'profile_picture';

    /**
     * Spatie key for optimized profile pictures.
     */
    public const string PROFILE_PICTURE_LIBRARY_OPTIMIZED = 'profile_picture_optimized';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'status',
        'mood',
        'views',
        'last_active_at',
        'last_logged_in_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /** @inheritDoc */
    protected static function booted(): void
    {
        static::creating(function (User $user): void {
            $user->uuid ??= Str::uuid()->toString();
        });
    }

    /**
     * Register Spatie Media Library collections.
     */
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection(self::PROFILE_PICTURE_LIBRARY)
            ->singleFile()
            ->acceptsMimeTypes([
                'image/jpeg',
                'image/png',
                'image/gif',
                'image/webp',
            ])
            ->useDisk('media')
            ->useFallbackUrl(asset('images/default.jpg'))
            ->useFallbackUrl(asset('images/default.jpg'), self::PROFILE_PICTURE_LIBRARY_OPTIMIZED)
            ->registerMediaConversions(function (): void {
                $this
                    ->addMediaConversion(self::PROFILE_PICTURE_LIBRARY_OPTIMIZED)
                    ->withResponsiveImages()
                    ->format('webp')
                    ->optimize();
            });
    }

    /**
     * Get the user's profile URL.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute<string, never>
     */
    protected function profileUrl(): Attribute
    {
        // TODO: Return actual profile URL.

        return Attribute::make(
            get: fn(): string => homepage_route(),
        )->shouldCache();
    }

    /**
     * Get the user's profile picture.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute<string, never>
     */
    protected function profilePicture(): Attribute
    {
        return Attribute::make(
            get: fn(): string => $this->getFirstMediaUrl(
                self::PROFILE_PICTURE_LIBRARY,
                self::PROFILE_PICTURE_LIBRARY_OPTIMIZED,
            ),
        )->shouldCache();
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'last_active_at' => 'immutable_datetime',
            'last_logged_in_at' => 'immutable_datetime',
            'created_at' => 'immutable_datetime',
            'updated_at' => 'immutable_datetime',
        ];
    }
}
