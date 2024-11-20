<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Betta fish images array
        $bettaImage = [
            "1_jpg.rf.b6e96ef057de954887c1c5143b544207.jpg",
            "5_jpg.rf.eb8f34f0afc7de93594983b74d2abb6e.jpg",
            "2-3_jpg.rf.c64ce77fc85b03108002fab619e7191b.jpg",
            "3_jpg.rf.40712280c39445f3895f23afc832d2cf.jpg",
            "ch4_jpg.rf.0c5d852347615ecd5e49dbd1ef3a6b8a.jpg"
        ];

        // Goldfish images array
        $carissusImage = [
            'goldfish4_jpeg.rf.08a5eb4b1cb202ebe3c7097073dae361.jpg',
            'goldfish8_jpeg.rf.fd9207b15ceed7168833704f135f17ec.jpg',
            'goldfish9_jpeg.rf.cacfddad60aefd8e57160d326d310d38.jpg',
            'goldfish1_jpeg.rf.8d8429d1bce81f7123a273bda15d5f77.jpg',
            'goldfish12_jpeg.rf.2369eebcbcb647fec30409351109bc96.jpg',
            'goldfishe6_jpeg.rf.9fe2f8efbe80365d87998be27084830e.jpg',
            'goldfish7_jpeg.rf.bbf70523e1f2cedd15e1cd4fc272474c.jpg'
        ];

        // Fish data array
        $fishes = [
            [
                'name' => 'Cupang',
                'kingdom' => 'Animalia',
                'phylum' => 'Chordata',
                'class' => 'Actinopterygii',
                'order' => 'Anabantiformes',
                'family' => 'Osphronemidae',
                'genus' => 'Betta',
                'species' => 'Betta sp',
                'colour' => 'Various (Blue, Red, Green, Multi-colored)',
                'food_type' => 'carnivore',
                'food' => 'Bloodworms, Brine Shrimp, Daphnia, Fish Pellets',
                'venomous' => 0 ,
                'poisonous' => 0 ,
                'min_temperature' => 24,
                'max_temperature' => 30,
                'min_ph' => 6.0,
                'max_ph' => 8.0,
                'min_salinity' => 0.0,
                'max_salinity' => 0.0,
                'min_water_volume' => 20,
                'habitat' => 'freshwater',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'thumbnail' => $bettaImage[0],
                'overview' => 'Betta fish, also known as "Siamese fighting fish," are popular aquarium fish known for their vibrant colors and flowing fins. Males are territorial and should be kept separately.',
                'average_size' => 7 // cm
            ],
            [
                'name' => 'Ikan Mas',
                'kingdom' => 'Animalia',
                'phylum' => 'Chordata',
                'class' => 'Actinopterygii',
                'order' => 'Cypriniformes',
                'family' => 'Cyprinidae',
                'genus' => 'Carassius',
                'species' => 'Carassius auratus',
                'colour' => 'Gold, Orange, Red, White, Black, Mixed',
                'food_type' => 'omnivore', //omnivore
                'food' => 'Fish flakes, pellets, plants, small crustaceans, insects',
                'venomous' => 0 ,
                'poisonous' => 0 ,
                'min_temperature' => 20,
                'max_temperature' => 28,
                'min_ph' => 6.0,
                'max_ph' => 8.0,
                'min_water_volume' => 40,
                'min_salinity' => 0.0,
                'max_salinity' => 0.0,
                'habitat' => 'freshwater', //freshwater
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'thumbnail' => $carissusImage[0],
                'overview' => 'Goldfish are one of the most popular ornamental fish species worldwide. They were first domesticated in China over a thousand years ago and are known for their hardy nature and various fancy varieties.',
                'average_size' => 20 // cm
            ]
        ];

        // Insert fish data
        DB::table('fishes')->insert($fishes);

        // Insert fish images for Betta
        $fishImages = [];
        foreach ($bettaImage as $image) {
            $fishImages[] = [
                'fish_id' => 1, // ID for Betta
                'status' => 0,
                'disease_id' => null,
                'image' => $image,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        // Insert fish images for Carassius
        foreach ($carissusImage as $image) {
            $fishImages[] = [
                'fish_id' => 2, // ID for Carassius
                'status' => 0,
                'disease_id' => null,
                'image' => $image,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        // Insert all fish images
        DB::table('fish_images')->insert($fishImages);
    }
}