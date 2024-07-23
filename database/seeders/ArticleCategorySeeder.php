<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('article_categories')->insert([
            [
                'name' => 'Kesehatan Anak',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kesehatan Dewasa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kesehatan Umum',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
