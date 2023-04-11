<?php

namespace Database\Seeders;

use App\Models\School_cycle;
use Illuminate\Database\Seeder;

class SchoolCycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        School_cycle::factory()->count(27)->create();
    }
}
