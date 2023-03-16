<?php

namespace Database\Seeders;

use App\Models\SubjectTeacher;
use Illuminate\Database\Seeder;

class SubjectTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubjectTeacher::factory()->count(5)->create();
    }
}
