<?php

namespace Database\Seeders;

use App\Models\StudentClass;
use Illuminate\Database\Seeder;

class StudentClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentClass::factory()->count(5)->create();
    }
}
