<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\IdCycle;
use App\Models\School_cycle;

class SchoolCycleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SchoolCycle::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id_cycle' => IdCycle::factory(),
            'cycle_name' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'status' => $this->faker->boolean,
        ];
    }
}
