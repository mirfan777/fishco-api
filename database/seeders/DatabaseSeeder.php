<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Number of records to seed for each table
        $recordCount = 10;

        // Seed users table
        $users = [];
        for ($i = 1; $i <= $recordCount; $i++) {
            $users[] = [
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@example.com',
                'password' => bcrypt('password'),
                'role' => rand(1, 3),
                'address' => 'Address ' . $i,
                'phone_number' => '123456789' . $i,
                'email_verified_at' => Carbon::now(),
                'remember_token' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        DB::table('users')->insert($users);

        // Seed password_reset_tokens table
        $resetTokens = [];
        for ($i = 1; $i <= $recordCount; $i++) {
            $resetTokens[] = [
                'email' => 'user' . $i . '@example.com',
                'token' => Str::random(60),
                'created_at' => Carbon::now(),
            ];
        }
        DB::table('password_reset_tokens')->insert($resetTokens);

        // Seed sessions table
        $sessions = [];
        for ($i = 1; $i <= $recordCount; $i++) {
            $sessions[] = [
                'id' => Str::random(32),
                'user_id' => rand(1, $recordCount),
                'ip_address' => '192.168.1.' . $i,
                'user_agent' => 'Mozilla/5.0',
                'payload' => json_encode(['session' => 'data' . $i]),
                'last_activity' => time(),
            ];
        }
        DB::table('sessions')->insert($sessions);

       // Seed articles table first with placeholder data
       $articles = [];
       for ($i = 1; $i <= $recordCount; $i++) {
           $articles[] = [
               'title' => 'Article ' . $i,
               'slug' => 'article-' . $i,
               'body' => 'This is the body of article ' . $i,
               'user_id' => rand(1, $recordCount),
               'comment_id' => null, // Placeholder for now
               'thumbnail' => 'article' . $i . '.jpg',
               'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
           ];
       }
       DB::table('articles')->insert($articles);

       // Seed comments table with references to articles
       $comments = [];
       for ($i = 1; $i <= $recordCount; $i++) {
           $comments[] = [
               'body' => 'Comment ' . $i,
               'user_id' => rand(1, $recordCount),
               'article_id' => rand(1, $recordCount), // Reference to articles
               'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
           ];
       }
       DB::table('comments')->insert($comments);

       // Update articles table with correct comment_id references
       $comments = DB::table('comments')->get();
       foreach ($comments as $comment) {
           DB::table('articles')
               ->where('id', $comment->article_id)
               ->update(['comment_id' => $comment->id]);
       }

       // Seed replies table
       $replies = [];
       for ($i = 1; $i <= $recordCount; $i++) {
           $replies[] = [
               'body' => 'Reply ' . $i,
               'user_id' => rand(1, $recordCount),
               'comment_id' => rand(1, $recordCount), // Reference to comments
               'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
           ];
       }
       DB::table('replies')->insert($replies);

        // Seed products table
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

        // Seed Fish table
        $fish = [];
        for ($i = 1; $i <= $recordCount; $i++) {
            $fish[] = [
                'name' => 'Fish ' . $i,
                'kingdom' => 'Kingdom ' . $i,
                'phylum' => 'Phyllum ' . $i,
                'class' => 'Class ' . $i,
                'order' => 'Order ' . $i,
                'family' => 'Family ' . $i,
                'genus' => 'Genus ' . $i,
                'species' => 'Species ' . $i,
                'colour' => 'Colour ' . $i,
                'food_type' => 'Food Type ' . $i,
                'food' => 'Food ' . $i,
                'min_temperature' => rand(1, 10),
                'max_temperature' => rand(11, 20),
                'min_ph' => rand(1, 5),
                'max_ph' => rand(6, 10),
                'habitat' => 'Habitat ' . $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'thumbnail' => 'fish' . $i . '.jpg',
                'overview' => 'Overview ' . $i,
                'average_size' => rand(1, 10)
            ];
        }
        DB::table('fishes')->insert($fish);



        // Seed Disease table
        $disease = [];
        for ($i = 1; $i <= $recordCount; $i++) {
            $disease[] = [
                'name' => 'Disease ' . $i,
                'description' => 'Description ' . $i,
                'symptoms' => 'Symptoms ' . $i,
                'cause_agent' => 'Cause Agent ' . $i,
                'affected_part' => 'Affected Part ' . $i,
                'prevention' => 'Prevention ' . $i,
                'note' => 'Note ' . $i,
                'disease_type' => rand(1, 5),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }
        DB::table('diseases')->insert($disease);


        // Seed Medicine table
        $medicine = [];
        for ($i = 1; $i <= $recordCount; $i++) {
            $medicine[] = [
                'name' => 'Medicine ' . $i,
                'description' => 'Description ' . $i,
                'disease_id' => rand(1, $recordCount),
                'fish_id' => rand(1, $recordCount),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }
        DB::table('medicines')->insert($medicine);

        // Seed fish_images table

        $fishImages = [];
        for ($i = 1; $i <= $recordCount; $i++) {
            $fishImages[] = [
                'fish_id' => rand(1, $recordCount),
                'status' => rand(0, 1),  // Randomly set status to 0 or 1
                'disease_id' => rand(1, $recordCount),
                'image' => 'fish_image_' . $i . '.jpg',  // Placeholder image name
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        DB::table('fish_images')->insert($fishImages);


        // Seed reports table
        $reports = [];
        for ($i = 1; $i <= $recordCount; $i++) {
            $reports[] = [
                'user_id' => rand(1, $recordCount),
                'title' => 'Report ' . $i,
                'report' => 'This is the report for user ' . $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        DB::table('reports')->insert($reports);

        // affected_disease_fish table
        $affectedDiseaseFish = [];
        for ($i = 1; $i <= $recordCount; $i++) {
            $affectedDiseaseFish[] = [
                'disease_id' => rand(1, $recordCount),
                'fish_id' => rand(1, $recordCount),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('affected_disease_fish')->insert($affectedDiseaseFish);

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
