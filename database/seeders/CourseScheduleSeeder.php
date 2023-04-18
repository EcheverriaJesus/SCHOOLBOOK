<?php

namespace Database\Seeders;

use App\Models\CourseSchedule;
use Illuminate\Database\Seeder;

class CourseScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CourseSchedule::factory()->count(5)->create();
    }
}
