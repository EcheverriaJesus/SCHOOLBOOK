<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Teacher;

class TeacherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Teacher::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'father_surname' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'fathers_last_name' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->safeEmail,
            'curp' => $this->faker->word,
            'rfc' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'education_level' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'major' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'photo' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'professional_license' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'address_id' => $this->faker->word,
        ];
    }
}
