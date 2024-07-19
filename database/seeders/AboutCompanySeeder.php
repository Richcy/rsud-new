<?php

namespace Database\Seeders;

use App\Models\ImageProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AboutCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'img' => 'test.png',
                'type' => 'structure',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'img' => 'test.png',
                'type' => 'sketch',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'img' => 'test.png',
                'type' => 'hak_kewajiban',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'img' => 'test.png',
                'type' => 'standard_pelayanan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'img' => 'test.png',
                'type' => 'quality',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'img' => 'test.png',
                'type' => 'maklumat_pelayanan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('image_profiles')->insert($data);
    }
}
