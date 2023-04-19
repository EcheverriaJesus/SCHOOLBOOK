<?php

namespace Database\Seeders;

use App\Models\StudentGroup;
use Illuminate\Database\Seeder;

class StudentGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentGroup::factory()->count(5)->create();
    }
}
