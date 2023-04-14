<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Subject;

class SubjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subject::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'subject_name' => $this->faker->name(),
            'description' => $this->faker->text,
            'grade' => $this->faker->numberBetween(1, 3),
            'syllabus' => $this->faker->uuid(),
        ];
    }
}
