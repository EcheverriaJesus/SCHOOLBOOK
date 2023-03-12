<?php

namespace Database\Seeders;

use App\Models\Class;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Class::factory()->count(5)->create();
    }
}
