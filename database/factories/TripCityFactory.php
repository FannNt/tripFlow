<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Trip;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TripCity>
 */
class TripCityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'city_id' => rand(1, 10),
            'status' => $this->faker->randomElement(['done', 'in_progress','pending']),
        ];
    }
}
