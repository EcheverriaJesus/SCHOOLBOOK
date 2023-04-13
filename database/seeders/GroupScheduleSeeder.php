<?php

namespace Database\Seeders;

use App\Models\GroupSchedule;
use Illuminate\Database\Seeder;

class GroupScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GroupSchedule::factory()->count(5)->create();
    }
}
