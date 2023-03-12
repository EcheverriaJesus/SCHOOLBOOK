<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\group_class;

class GroupClassFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GroupClass::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id_class' => $this->faker->word,
            'id_group' => $this->faker->word,
        ];
    }
}
