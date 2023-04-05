<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Teacher_subject;

class TeacherSubjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TeacherSubject::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'subject_id' => $this->faker->word,
            'teacher_id' => $this->faker->word,
        ];
    }
}
