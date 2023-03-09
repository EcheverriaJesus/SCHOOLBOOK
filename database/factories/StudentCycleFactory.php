<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Student_cycle;

class StudentCycleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StudentCycle::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id_student' => $this->faker->word,
            'id_cycle' => $this->faker->word,
        ];
    }
}
