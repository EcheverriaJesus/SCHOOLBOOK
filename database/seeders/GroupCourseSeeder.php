<?php

namespace Database\Seeders;

use App\Models\GroupCourse;
use Illuminate\Database\Seeder;

class GroupCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GroupCourse::factory()->count(5)->create();
    }
}
