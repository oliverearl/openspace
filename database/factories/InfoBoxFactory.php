<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InfoBox>
 */
class InfoBoxFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, string>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->word(),
            'description' => fake()->text(),
            'link' => fake()->text(),
            'destination' => fake()->url(),
            'active_from' => Carbon::now(),
            'active_to' => Carbon::now()->addYear(),
        ];
    }

    /**
     * Define that the info box shouldn't expire.
     */
    public function nonperishable(): Factory
    {
        return $this->state(fn(): array => [
           'active_to' => null,
        ]);
    }
}
