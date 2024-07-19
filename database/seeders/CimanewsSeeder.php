<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CimanewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cimanews = [
            [
                'name' => 'cimanews',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Anda bisa menambahkan role lainnya di sini
        ];

        DB::table('article_categories')->insert($cimanews);
    }
}
