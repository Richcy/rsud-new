<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'username' => 'admin',
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'email_verified_at' => now(),
            'role_id' => 1, // Sesuaikan dengan role ID yang sesuai
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
