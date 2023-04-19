<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Qualification;

class QualificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Qualification::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'bim1' => $this->faker->randomFloat(0, 0, 9999999999.),
            'bim2' => $this->faker->randomFloat(0, 0, 9999999999.),
            'bim3' => $this->faker->randomFloat(0, 0, 9999999999.),
            'bim4' => $this->faker->randomFloat(0, 0, 9999999999.),
            'bim5' => $this->faker->randomFloat(0, 0, 9999999999.),
            'promedio_final' => $this->faker->randomFloat(0, 0, 9999999999.),
            'course_id' => $this->faker->word,
            'student_id' => $this->faker->word,
        ];
    }
}
