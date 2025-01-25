<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Actions\Users\AddPlaceholderProfilePicture;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'uuid' => fake()->uuid(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => Carbon::now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'bio' => fake()->sentence(),
            'status' => fake()->sentence(),
            'mood' => fake()->sentence(),
            'views' => fake()->randomNumber(),
            'last_active_at' => Carbon::now(),
            'last_logged_in_at' => Carbon::now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes): array => [
            'email_verified_at' => null,
            'last_active_at' => null,
            'last_logged_in_at' => null,
        ]);
    }

    /**
     * Produces a user with an associated profile picture.
     */
    public function withProfilePicture(): static
    {
        return $this->afterCreating(function (User $user): void {
            AddPlaceholderProfilePicture::run($user);
        });
    }
}
