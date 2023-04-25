<?php

namespace Database\Factories;

use App\Models\Subject;
use App\Models\Course;
use App\Models\School_cycle;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'subject_id' => Subject::all()->random()->id,
            'cycle_id' => School_cycle::all()->random()->id,
            'status' => $this->faker->boolean
        ];
    }
}
