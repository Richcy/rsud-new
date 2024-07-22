<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\CimanewsSeeder;
use Database\Seeders\StructureSeeder;
use Database\Seeders\RunningTextSeeder;
use Database\Seeders\AboutCompanySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
          RoleSeeder::class,
          AdminSeeder::class,
          RunningTextSeeder::class,
          AboutCompanySeeder::class,
          CimanewsSeeder::class,
          ServiceSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
