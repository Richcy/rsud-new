<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OldDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            ArticleCategorySeeder::class,
            FieldDoctorSeeder::class,
            ArticleSeeder::class,
            DoctorSeeder::class,
            DoctorScheduleSeeder::class,
            EventCategorySeeder::class,
            EventSeeder::class,
            CareerSeeder::class
        ]);
    }
}
