<?php

namespace Database\Seeders;

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
            'email' => 'test@example.com',
        ]);

        $users = User::factory()->count(9)->withProfilePicture()->create();
    }
}
