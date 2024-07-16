<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menyisipkan role super_admin menggunakan array
        $roles = [
            [
                'name' => 'super_admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Anda bisa menambahkan role lainnya di sini
        ];

        DB::table('roles')->insert($roles);
    }
}
