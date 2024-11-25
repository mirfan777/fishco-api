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

        // Guppyfish images array
        $recticulataImage = [
            'guppy.jpg',
            'guppy2.jpg',
            'guppy3.jpg',
            'guppy4.jpg',
            'guppy5.jpg'
        ];

        // Mollyfish images array
        $sphenopsImage = [
            'molly.jpg',
            'molly2.jpg',
            'molly3.jpg',
            'molly4.jpg',
            'molly5.jpg'
        ];

        // Plattyfish images array
        $maculatusImage = [
            'platty.jpg',
            'platty2.jpg',
            'platty3.jpg',
            'platty4.jpg',
            'platty5.jpg'
        ];

        // Clownfish images array
        $ocellarisImage = [
            'clown.jpg',
            'clown2.jpg',
            'clown3.jpg',
            'clown4.jpg',
            'clown5.jpg'
        ];

        // BlueTangfish images array
        $hepatusImage = [
            'bluetang.jpg',
            'bluetang2.jpg',
            'bluetang3.jpg',
            'bluetang4.jpg'
        ];

        // Fish data array
        $fishes = [
            [
                'name' => 'Ikan Cupang',
                'kingdom' => 'Animalia',
                'phylum' => 'Chordata',
                'class' => 'Actinopterygii',
                'order' => 'Anabantiformes',
                'family' => 'Osphronemidae',
                'genus' => 'Betta',
                'species' => 'Betta sp',
                'colour' => 'Beragam (Biru, Merah, Hijau, Berwana-warni)',
                'food_type' => 'carnivore',
                'food' => 'Cacing darah, udang air asin, Daphnia, pelet ikan',
                'venomous' => 0 ,
                'poisonous' => 0 ,
                'aggressive' => 1 ,
                'teritorial' => 1 ,
                'min_temperature' => 24,
                'max_temperature' => 30,
                'min_ph' => 6.0,
                'max_ph' => 8.0,
                'min_water_volume' => 40,
                'min_salinity' => 0.0,
                'max_salinity' => 0.0,
                'habitat' => 'freshwater',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'thumbnail' => $bettaImage[0],
                'overview' => 'Ikan cupang, yang juga dikenal sebagai "ikan aduan siam," adalah ikan akuarium populer yang dikenal karena warnanya yang cerah dan siripnya yang berkibar. Ikan jantan bersifat teritorial dan harus dipelihara secara terpisah.',
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
                'colour' => 'Beragam (Emas, Jingga, Merah, Putih, Hitam, Campuran)',
                'food_type' => 'omnivore', //omnivore
                'food' => 'Serpihan ikan, pelet, tanaman, krustasea kecil, serangga',
                'venomous' => 0 ,
                'poisonous' => 0 ,
                'aggressive' => 0 ,
                'teritorial' => 0 ,
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
                'overview' => 'Ikan mas merupakan salah satu spesies ikan hias paling populer di seluruh dunia. Ikan ini pertama kali dijinakkan di Cina lebih dari seribu tahun yang lalu dan dikenal karena sifatnya yang kuat dan beragam varietasnya yang unik.',
                'average_size' => 20 // cm
            ],
            [
                'name' => 'Ikan Guppy',
                'kingdom' => 'Animalia',
                'phylum' => 'Chordata',
                'class' => 'Actinopterygii',
                'order' => 'Cyprinodontiformes',
                'family' => 'Poeciliidae',
                'genus' => 'Poecilia',
                'species' => 'Poecilia reticulata',
                'colour' => 'Beragam (Biru, Hijau, Merah, Oranye, Kuning, Hitam, Campuran)',
                'food_type' => 'omnivore',
                'food' => 'Serpihan ikan, pelet, alga, larva nyamuk, kutu air',
                'venomous' => 0,
                'poisonous' => 0,
                'aggressive' => 0,
                'teritorial' => 0,
                'min_temperature' => 22,
                'max_temperature' => 28,
                'min_ph' => 6.8,
                'max_ph' => 8.0,
                'min_water_volume' => 10,
                'min_salinity' => 0.0,
                'max_salinity' => 0.0,
                'habitat' => 'freshwater',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'thumbnail' => $recticulataImage[0],
                'overview' => 'Ikan guppy adalah salah satu ikan hias air tawar yang paling populer di dunia. Ikan ini dikenal karena keindahan warna-warni siripnya yang mencolok serta kemudahan perawatannya, sehingga cocok untuk pemula.',
                'average_size' => 4 // cm
            ],
            [
                'name' => 'Ikan Molly',
                'kingdom' => 'Animalia',
                'phylum' => 'Chordata',
                'class' => 'Actinopterygii',
                'order' => 'Cyprinodontiformes',
                'family' => 'Poeciliidae',
                'genus' => 'Poecilia',
                'species' => 'Poecilia sphenops',
                'colour' => 'Beragam (Hitam, Putih, Oranye, Emas, Campuran)',
                'food_type' => 'omnivore',
                'food' => 'Pelet, alga, serpihan ikan, kutu air, tanaman air',
                'venomous' => 0,
                'poisonous' => 0,
                'aggressive' => 0,
                'teritorial' => 0,
                'min_temperature' => 24,
                'max_temperature' => 28,
                'min_ph' => 7.0,
                'max_ph' => 8.5,
                'min_water_volume' => 20,
                'min_salinity' => 0.0,
                'max_salinity' => 0.05,
                'habitat' => 'freshwater',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'thumbnail' => $sphenopsImage[0],
                'overview' => 'Ikan Molly adalah ikan hias air tawar yang dikenal karena daya tahan tubuhnya yang tinggi dan mudah beradaptasi dengan berbagai kondisi air. Mereka memiliki beragam warna dan mudah dirawat.',
                'average_size' => 7 // cm
            ],
            [
                'name' => 'Ikan Platy',
                'kingdom' => 'Animalia',
                'phylum' => 'Chordata',
                'class' => 'Actinopterygii',
                'order' => 'Cyprinodontiformes',
                'family' => 'Poeciliidae',
                'genus' => 'Xiphophorus',
                'species' => 'Xiphophorus maculatus',
                'colour' => 'Beragam (Merah, Oranye, Kuning, Biru, Albino, Campuran)',
                'food_type' => 'omnivore',
                'food' => 'Serpihan ikan, pelet, alga, kutu air, tanaman air kecil',
                'venomous' => 0,
                'poisonous' => 0,
                'aggressive' => 0,
                'teritorial' => 0,
                'min_temperature' => 22,
                'max_temperature' => 28,
                'min_ph' => 7.0,
                'max_ph' => 8.5,
                'min_water_volume' => 15,
                'min_salinity' => 0.0,
                'max_salinity' => 0.05,
                'habitat' => 'freshwater',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'thumbnail' => $maculatusImage[0],
                'overview' => 'Ikan Platy adalah ikan hias kecil yang dikenal karena warnanya yang cerah dan sifatnya yang damai. Mereka mudah dipelihara dan sering menjadi pilihan pemula.',
                'average_size' => 6 // cm
            ],
            [
                'name' => 'Ikan Badut',
                'kingdom' => 'Animalia',
                'phylum' => 'Chordata',
                'class' => 'Actinopterygii',
                'order' => 'Perciformes',
                'family' => 'Pomacentridae',
                'genus' => 'Amphiprion',
                'species' => 'Amphiprion ocellaris',
                'colour' => 'Oranye dengan garis putih di tubuh, disertai garis hitam',
                'food_type' => 'omnivore',
                'food' => 'Plankton, alga, artemia, serpihan makanan laut',
                'venomous' => 0,
                'poisonous' => 0,
                'aggressive' => 0,
                'teritorial' => 1,
                'min_temperature' => 24,
                'max_temperature' => 28,
                'min_ph' => 8.1,
                'max_ph' => 8.4,
                'min_water_volume' => 75,
                'min_salinity' => 1.020,
                'max_salinity' => 1.025,
                'habitat' => 'saltwater',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'thumbnail' => $ocellarisImage[0],
                'overview' => 'Ikan Badut terkenal karena hubungan simbiosisnya dengan anemon laut. Warnanya yang mencolok membuatnya menjadi salah satu ikan hias laut paling populer di akuarium.',
                'average_size' => 10 // cm
            ],
            [
                'name' => 'Ikan Botana Biru',
                'kingdom' => 'Animalia',
                'phylum' => 'Chordata',
                'class' => 'Actinopterygii',
                'order' => 'Perciformes',
                'family' => 'Acanthuridae',
                'genus' => 'Paracanthurus',
                'species' => 'Paracanthurus hepatus',
                'colour' => 'Biru cerah dengan garis hitam dan sirip ekor kuning',
                'food_type' => 'herbivore',
                'food' => 'Alga, rumput laut, serpihan makanan berbasis tumbuhan',
                'venomous' => 0,
                'poisonous' => 0,
                'aggressive' => 0,
                'teritorial' => 0,
                'min_temperature' => 25,
                'max_temperature' => 28,
                'min_ph' => 8.0,
                'max_ph' => 8.4,
                'min_water_volume' => 200,
                'min_salinity' => 1.020,
                'max_salinity' => 1.025,
                'habitat' => 'saltwater',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'thumbnail' => $hepatusImage[0],
                'overview' => 'Ikan Botana Biru terkenal karena warna biru cerahnya dan sering diasosiasikan dengan film animasi. Mereka membutuhkan akuarium besar dengan aliran air yang baik.',
                'average_size' => 25 // cm
            ]                                   
        ];

        // Insert fish data
        DB::table('fishes')->insert($fishes);

        // Insert fish images for all fish
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

        foreach ($recticulataImage as $image) {
            $fishImages[] = [
                'fish_id' => 3, 
                'status' => 0,
                'disease_id' => null,
                'image' => $image,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        foreach ($sphenopsImage as $image) {
            $fishImages[] = [
                'fish_id' => 4,
                'status' => 0,
                'disease_id' => null,
                'image' => $image,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        foreach ($maculatusImage as $image) {
            $fishImages[] = [
                'fish_id' => 5,
                'status' => 0,
                'disease_id' => null,
                'image' => $image,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        foreach ($ocellarisImage as $image) {
            $fishImages[] = [
                'fish_id' => 6, // ID for Ocellaris
                'status' => 0,
                'disease_id' => null,
                'image' => $image,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        foreach ($hepatusImage as $image) {
            $fishImages[] = [
                'fish_id' => 7, 
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