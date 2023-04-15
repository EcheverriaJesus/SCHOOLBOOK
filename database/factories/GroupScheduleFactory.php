<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Group_schedule;

class GroupScheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GroupSchedule::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'group_id' => $this->faker->word,
            'schedule_id' => $this->faker->word,
        ];
    }
}
