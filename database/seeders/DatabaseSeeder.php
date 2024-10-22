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
                'role_id' => rand(1, 5),
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

        // Seed articles table
        $articles = [];
        for ($i = 1; $i <= $recordCount; $i++) {
            $articles[] = [
                'title' => 'Article ' . $i,
                'slug' => 'article-' . $i,
                'body' => 'This is the body of article ' . $i,
                'user_id' => rand(1, $recordCount),
                'comment_id' => rand(1, $recordCount),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        DB::table('articles')->insert($articles);

        // Seed comments table
        $comments = [];
        for ($i = 1; $i <= $recordCount; $i++) {
            $comments[] = [
                'user_id' => rand(1, $recordCount),
                'body' => 'This is a comment ' . $i,
                'article_id' => rand(1, $recordCount),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        DB::table('comments')->insert($comments);

        // Seed replies table
        $replies = [];
        for ($i = 1; $i <= $recordCount; $i++) {
            $replies[] = [
                'comment_id' => rand(1, $recordCount),
                'user_id' => rand(1, $recordCount),
                'body' => 'This is a reply ' . $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        DB::table('replies')->insert($replies);

        // Seed affiliates table
        $affiliates = [];
        for ($i = 1; $i <= $recordCount; $i++) {
            $affiliates[] = [
                'name' => 'Affiliate ' . $i,
                'address' => 'Affiliate Address ' . $i,
                'phone_number' => '0987654321' . $i,
                'link' => 'https://affiliate' . $i . '.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        DB::table('affiliates')->insert($affiliates);

        // Seed products table
        $products = [];
        for ($i = 1; $i <= $recordCount; $i++) {
            $products[] = [
                'affiliate_id' => rand(1, $recordCount),
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

        // Seed the rest of the tables similarly...
    }
}
