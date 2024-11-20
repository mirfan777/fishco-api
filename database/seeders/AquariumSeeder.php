<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Faker\Factory as Faker;

class AquariumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $data = [
            [
                'user_id' => 1, // Replace 1 with the actual user ID
                'name' => $faker->name,
                'volume_size' => $faker->randomFloat(2, 10, 100),
                'material' => $faker->randomElement(['Plastic', 'Ceramic', 'Metal']),
                'type' => $faker->randomElement(['Canister', 'Under-sink', 'Reverse Osmosis']),
                'filter_type' => $faker->randomElement(['Carbon', 'Sediment', 'Activated Carbon']),
                'filter_capacity' => $faker->randomDigit(),
                'filter_media' => $faker->randomElement(['Granular Activated Carbon', 'Carbon Block', 'Sediment Filter']),
                'min_temperature' => $faker->randomFloat(2, 0, 30),
                'max_temperature' => $faker->randomFloat(2, 30, 50),
                'min_ph' => $faker->randomFloat(2, 6, 7),
                'max_ph' => $faker->randomFloat(2, 7, 8),
                'turbidity' => $faker->randomFloat(2, 0, 1),
                'salinity' => $faker->randomFloat(2, 0, 10),
                'disolved_oxygen' => $faker->randomFloat(2, 0, 10),
                'hardness' => $faker->randomFloat(2, 0, 10),
                'amonia' => $faker->randomFloat(2, 0, 1),
                'nitrite' => $faker->randomFloat(2, 0, 1),
                'nitrate' => $faker->randomFloat(2, 0, 10),
            ],
            [
                'user_id' => 1, // Replace 1 with the actual user ID
                'name' => $faker->name,
                'volume_size' => $faker->randomFloat(2, 10, 100),
                'material' => $faker->randomElement(['Plastic', 'Ceramic', 'Metal']),
                'type' => $faker->randomElement(['Canister', 'Under-sink', 'Reverse Osmosis']),
                'filter_type' => $faker->randomElement(['Carbon', 'Sediment', 'Activated Carbon']),
                'filter_capacity' => $faker->randomDigit(),
                'filter_media' => $faker->randomElement(['Granular Activated Carbon', 'Carbon Block', 'Sediment Filter']),
                'min_temperature' => $faker->randomFloat(2, 0, 30),
                'max_temperature' => $faker->randomFloat(2, 30, 50),
                'min_ph' => $faker->randomFloat(2, 6, 7),
                'max_ph' => $faker->randomFloat(2, 7, 8),
                'turbidity' => $faker->randomFloat(2, 0, 1),
                'salinity' => $faker->randomFloat(2, 0, 10),
                'disolved_oxygen' => $faker->randomFloat(2, 0, 10),
                'hardness' => $faker->randomFloat(2, 0, 10),
                'amonia' => $faker->randomFloat(2, 0, 1),
                'nitrite' => $faker->randomFloat(2, 0, 1),
                'nitrate' => $faker->randomFloat(2, 0, 10),
            ],
            [
                'user_id' => 1, // Replace 1 with the actual user ID
                'name' => $faker->name,
                'volume_size' => $faker->randomFloat(2, 10, 100),
                'material' => $faker->randomElement(['Plastic', 'Ceramic', 'Metal']),
                'type' => $faker->randomElement(['Canister', 'Under-sink', 'Reverse Osmosis']),
                'filter_type' => $faker->randomElement(['Carbon', 'Sediment', 'Activated Carbon']),
                'filter_capacity' => $faker->randomDigit(),
                'filter_media' => $faker->randomElement(['Granular Activated Carbon', 'Carbon Block', 'Sediment Filter']),
                'min_temperature' => $faker->randomFloat(2, 0, 30),
                'max_temperature' => $faker->randomFloat(2, 30, 50),
                'min_ph' => $faker->randomFloat(2, 6, 7),
                'max_ph' => $faker->randomFloat(2, 7, 8),
                'turbidity' => $faker->randomFloat(2, 0, 1),
                'salinity' => $faker->randomFloat(2, 0, 10),
                'disolved_oxygen' => $faker->randomFloat(2, 0, 10),
                'hardness' => $faker->randomFloat(2, 0, 10),
                'amonia' => $faker->randomFloat(2, 0, 1),
                'nitrite' => $faker->randomFloat(2, 0, 1),
                'nitrate' => $faker->randomFloat(2, 0, 10),
            ]
        ];
    }
}