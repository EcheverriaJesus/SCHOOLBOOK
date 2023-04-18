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
            'subject_name' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'description' => $this->faker->text,
            'grade' => $this->faker->numberBetween(-10000, 10000),
            'syllabus' => $this->faker->regexify('[A-Za-z0-9]{255}'),
        ];
    }
}
