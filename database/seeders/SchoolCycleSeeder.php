<?php

namespace Database\Seeders;

use App\Models\SchoolCycle;
use Illuminate\Database\Seeder;

class SchoolCycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SchoolCycle::factory()->count(5)->create();
    }
}
