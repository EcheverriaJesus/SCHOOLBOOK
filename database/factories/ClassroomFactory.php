<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Classroom;

class ClassroomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Classroom::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'classroom_name' => $this->faker->regexify('[A-Za-z0-9]{5}'),
            'building' => $this->faker->regexify('[A-Za-z0-9]{5}'),
        ];
    }
}
