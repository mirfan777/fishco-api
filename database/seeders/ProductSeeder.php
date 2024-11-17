<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
        $products = [];
        for ($i = 1; $i <= $recordCount; $i++) {
            $products[] = [
                'name' => 'Product ' . $i,
                'category' => 'Category ' . rand(1, 5),
                'description' => 'Description for product ' . $i,
                'price' => rand(100, 1000),
                'link' => 'https://product' . $i . '.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        DB::table('products')->insert($products);

         // product treatments recommendation table
         $productTreatments = [];
         for ($i = 1; $i <= $recordCount; $i++) {
             $productTreatments[] = [
                 'product_id' => rand(1, $recordCount),
                 'disease_id' => rand(1, $recordCount),
                 'created_at' => Carbon::now(),
                 'updated_at' => Carbon::now(),
             ];
         }
 
         DB::table('product_treatment_recommendations')->insert($productTreatments);
    }
}
