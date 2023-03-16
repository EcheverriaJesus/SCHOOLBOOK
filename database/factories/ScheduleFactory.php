<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\IdSchedule;
use App\Models\Schedule;

class ScheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Schedule::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id_schedule' => IdSchedule::factory(),
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->time(),
            'day' => $this->faker->date(),
            'id_class' => $this->faker->word,
        ];
    }
}
