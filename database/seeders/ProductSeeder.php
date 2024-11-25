<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Number of records to seed for each table
        $recordCount = 5;
        $products = [
            [
                'name' => 'BLITZ ICHT 30 ML',
                'category' => 'Obat',
                'description' => "BLITZ ICHT METHYLENE BLUE 30ML\r\n\r\nUntuk perawatan ikan hias aquarium air tawar\r\n\r\nFungsi:\r\n1. Mencegah jamur tumbuh pada telur ikan\r\n2. Menurunkan kandungan nitrite yang berbahaya bagi ikan di dalam air akuarium\r\n3. Sebagai penyembuh untuk parasit protozoa dan jamur pada ikan\r\n\r\nDosis:\r\n- 1 tetes / 2 liter air untuk pengobatan\r\n- Setengah dosis untuk pencegahan\r\n\r\nBahan aktif:\r\nMethylene blue",
                'price' => 2250,
                'thumbnail' => '1732520726_obat_whitespot.jpg',
                'link' => 'https://s.shopee.co.id/6KnVIqv5lM',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'BAC STOP 100ml',
                'category' => 'Obat',
                'description' => "CZ Aqua BAC-STOP 100ml\r\n\r\nFormulasi khusus untuk menyembuhkan infeksi bakteri pada ikan, seperti aeromonas, bercak merah (red patches), pembusukan ekor dan sirip, luka, bisul dan abscess, serta bercak merah pada sirip.\r\n\r\nPetunjuk Penggunaan : \r\nUntuk Karantina ikan: 30 ml untuk 1000 liter air, water change 30% selama 7 hari\r\nUntuk pengobatan ikan: asingkan ikan ke kolam kecil, 40 ml untuk 1000 liter air, water change 30% setiap hari sampai ikan sembuh.\r\n\r\nMatikan lampu UV, selama proses pengobatan\r\n\r\nNote :\r\n- Harga tertera untuk 1 item produk CZ Aqua BAC-STOP 100ml",
                'price' => 150000,
                'thumbnail' => '1732521113_bac_stop.jpg',
                'link' => 'https://s.shopee.co.id/7Kg2V6tV5N',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Glucosalt 500 gram',
                'category' => 'Obat',
                'description' => "GLUCOSALT 500Gr\r\nSpecial Salt For Aquarium & Pond \r\n✔️Immune Booster \r\n✔️Anti Stress \r\n✔️Menstabilkan ikan yang lemas, mabuk, dan tiduran\r\n\r\nUntuk ikan:\r\n•Goldfish \r\n•Arwana \r\n•Koki\r\n•Koi\r\n•Predator \r\n•Dan Ikan Hias Lainnya..\r\n\r\nCatatan :\r\nBerhubung kemasan dari pabrik memakai bahan plastik yang rigid gampang pecah, maka kami dobel dengan plastik supaya kalau pecah saat pengiriman tidak berceceran\r\n\r\nPetunjuk pemakaian:\r\n50-100 gram untuk 100 liter air \r\n\r\nUntuk Pengobatan:\r\n200-300 gram untuk 100 liter air \r\n\r\n*Tidak untuk dikonsumsi oleh manusia.",
                'price' => 11150,
                'thumbnail' => '1732521303_glucosalt.jpg',
                'link' => 'https://s.shopee.co.id/tRlqOxwf',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        DB::table('products')->insert($products);

        // Retrieve the actual product IDs
        $productIds = DB::table('products')->pluck('id')->toArray();

        // Product treatments recommendation table
        $productTreatments = [];
        for ($i = 1; $i <= $recordCount; $i++) {
            $productTreatments[] = [
                'product_id' => $productIds[array_rand($productIds)],
                'disease_id' => rand(1, $recordCount), // Assuming you have at least $recordCount diseases
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('product_treatment_recommendations')->insert($productTreatments);
    }
}