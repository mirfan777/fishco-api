<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recordCount = 5;

        // Seed articles table first with placeholder data
       $articles = [];
       for ($i = 1; $i <= $recordCount; $i++) {
           $articles[] = [
               'title' => 'Article ' . $i,
               'slug' => 'article-' . $i,
               'body' => 'This is the body of article ' . $i,
               'user_id' => rand(1, 2),
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
               'user_id' => rand(1, 3),
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
               'user_id' => rand(1, 3),
               'comment_id' => rand(1, $recordCount), // Reference to comments
               'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
           ];
       }
       DB::table('replies')->insert($replies);
    }
}
