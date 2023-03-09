<?php

namespace Database\Seeders;

use App\Models\StudentCycle;
use Illuminate\Database\Seeder;

class StudentCycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentCycle::factory()->count(5)->create();
    }
}
