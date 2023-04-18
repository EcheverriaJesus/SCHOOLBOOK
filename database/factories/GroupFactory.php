<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Group;

class GroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Group::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'shift' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'grade' => $this->faker->numberBetween(-1000, 1000),
            'status' => $this->faker->boolean,
            'classroom_id' => $this->faker->word,
        ];
    }
}
