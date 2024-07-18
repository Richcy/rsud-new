<?php

namespace Database\Seeders;

use App\Models\ImageProfile;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ImageProfile::create([
            'img' => 'test.png',
            'type' => 'structure',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
