<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\IdStudent;
use App\Models\Student;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id_student' => IdStudent::factory(),
            'student_name' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'paternal_surname' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'maternal_surname' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'grade' => $this->faker->numberBetween(-10000, 10000),
            'birth_date' => $this->faker->date(),
            'curp' => $this->faker->regexify('[A-Za-z0-9]{18}'),
            'gender' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'email' => $this->faker->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'status' => $this->faker->boolean,
            'study_plan' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'photo' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'id_address' => $this->faker->word,
            'id_tutor' => $this->faker->word,
            'id_document' => $this->faker->word,
            'id_history' => $this->faker->word,
        ];
    }
}
