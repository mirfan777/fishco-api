<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Number of records to seed for each table
        $recordCount = 5;
        $reports = [];
        for ($i = 1; $i <= $recordCount; $i++) {
            $reports[] = [
                'user_id' => rand(1, 3),
                'title' => 'Report ' . $i,
                'report' => 'This is the report for user ' . $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        DB::table('reports')->insert($reports);
    }
}
