<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // [
            //     'banner' => 'test.png',
            //     'description' => 'test',
            //     'type' => 'about_home',
            //     'lang' => 'id',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'banner' => 'test.png',
            //     'description' => 'test',
            //     'type' => 'about_company',
            //     'lang' => 'id',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'banner' => 'test.png',
            //     'description' => 'test',
            //     'type' => 'unggulan',
            //     'lang' => 'id',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'banner' => 'test.png',
            //     'description' => 'test',
            //     'type' => 'irj',
            //     'lang' => 'id',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'banner' => 'test.png',
            //     'description' => 'test',
            //     'type' => 'iri',
            //     'lang' => 'id',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            [
                'banner' => 'test.png',
                'description' => 'test',
                'type' => 'igd',
                'lang' => 'id',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'banner' => 'test.png',
                'description' => 'test',
                'type' => 'lab',
                'lang' => 'id',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'banner' => 'test.png',
                'description' => 'test',
                'type' => 'radiology',
                'lang' => 'id',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'banner' => 'test.png',
                'description' => 'test',
                'type' => 'hemodialis',
                'lang' => 'id',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'banner' => 'test.png',
                'description' => 'test',
                'type' => 'farmasi',
                'lang' => 'id',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'banner' => 'test.png',
                'description' => 'test',
                'type' => 'rehab_medik',
                'lang' => 'id',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'banner' => 'test.png',
                'description' => 'test',
                'type' => 'ambulance',
                'lang' => 'id',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'banner' => 'test.png',
                'description' => 'medical_support',
                'type' => 'medical_support',
                'lang' => 'id',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'banner' => 'test.png',
                'description' => 'mcu',
                'type' => 'mcu',
                'lang' => 'id',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('services')->insert($data);
    }
}
