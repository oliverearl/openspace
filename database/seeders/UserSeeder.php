<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Actions\Users\AddPlaceholderProfilePicture;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = collect();

        $users[] = User::factory()->withProfilePicture()->create([
            'name' => 'Administrator',
            'email' => 'test@example.com',
        ]);

        $users->merge(
            User::factory()->count(9)->withProfilePicture()->create(),
        );

        $users->each(function (User $user): void {
            AddPlaceholderProfilePicture::run($user);
        });
    }
}
