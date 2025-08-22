<?php

namespace Database\Seeders;

use App\Models\Trip;
use App\Models\TripCity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Trip::factory(10)->create()->each(function (Trip $trip) {
            TripCity::factory()->create([
                'trip_id' => $trip->id,
                'handler_id' => rand(1,5)
            ]);
        });
    }
}
