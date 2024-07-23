<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('event_categories')->insert([
            [
                'name' => 'Donor Darah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Webinar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vaksinasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
