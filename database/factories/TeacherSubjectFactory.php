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
            'id_subject' => $this->faker->word,
            'id_teacher' => $this->faker->word,
        ];
    }
}
