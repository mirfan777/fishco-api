<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AquariumFishesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'aquarium_id' => rand(1,2),
                'fish_id' => rand(1,7),
                'quantity' => rand(1, 10)
            ],
            [
                'aquarium_id' => rand(1,2),
                'fish_id' => rand(1,7),
                'quantity' => rand(1, 10)
            ],
            [
                'aquarium_id' => rand(1,2),
                'fish_id' => rand(1,7),
                'quantity' => rand(1, 10)
            ],
            [
                'aquarium_id' => rand(1,2),
                'fish_id' => rand(1,7),
                'quantity' => rand(1, 10)
            ],
            [
                'aquarium_id' => rand(1,2),
                'fish_id' => rand(1,7),
                'quantity' => rand(1, 10)
            ],
            [
                'aquarium_id' => rand(1,2),
                'fish_id' => rand(1,7),
                'quantity' => rand(1, 10)
            ],
            [
                'aquarium_id' => rand(1,2),
                'fish_id' => rand(1,7),
                'quantity' => rand(1, 10)
            ],
            [
                'aquarium_id' => rand(1,2),
                'fish_id' => rand(1,7),
                'quantity' => rand(1, 10)
            ],
            [
                'aquarium_id' => rand(1,2),
                'fish_id' => rand(1,7),
                'quantity' => rand(1, 10)
            ]
            
        ];

        DB::table('aquarium_fishes')->insert($data);
    }
}
