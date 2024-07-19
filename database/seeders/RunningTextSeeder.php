<?php

namespace Database\Seeders;

use App\Models\RunningText;
use Illuminate\Database\Seeder;

class RunningTextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RunningText::create([
            'content' => 'MELAYANI DENGAN HATI DAN CINTA',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
