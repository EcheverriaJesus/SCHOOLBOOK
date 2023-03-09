<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\IdTutor;
use App\Models\Tutor;

class TutorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tutor::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id_tutor' => IdTutor::factory(),
            'tutor_name' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'paternal_surname' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'maternal_surname' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'gender' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'email' => $this->faker->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'id_address' => $this->faker->word,
        ];
    }
}
