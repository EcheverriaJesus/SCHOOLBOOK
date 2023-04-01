<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Class_schedule;

class ClassScheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ClassSchedule::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'class_id' => $this->faker->word,
            'schedule_id' => $this->faker->word,
        ];
    }
}
