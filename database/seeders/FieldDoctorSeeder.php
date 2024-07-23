<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FieldDoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('field_doctors')->insert([
            [
                'name' => 'Bedah Umum',
                'lang' => 'Indonesia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gigi dan Mulut',
                'lang' => 'Indonesia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jantung dan Pembuluh Darah',
                'lang' => 'Indonesia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mata',
                'lang' => 'Indonesia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'MCU dan VCT',
                'lang' => 'Indonesia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Obstetrik dan Ginekologi (Kandungan)',
                'lang' => 'Indonesia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pediatrik (Anak)',
                'lang' => 'Indonesia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Penyakit Dalam',
                'lang' => 'Indonesia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Psikiatri (Jiwa)',
                'lang' => 'Indonesia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rehabilitasi Medik',
                'lang' => 'Indonesia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Saraf (Neurologi)',
                'lang' => 'Indonesia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'TB DOTS',
                'lang' => 'Indonesia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Telinga Hidung Tenggorokan-Kepala dan Leher (THT)',
                'lang' => 'Indonesia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
