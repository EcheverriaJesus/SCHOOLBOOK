<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Group;
use App\Models\IdGroup;

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
            'id_group' => IdGroup::factory(),
            'group_name' => $this->faker->randomLetter,
            'num_max_students' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
