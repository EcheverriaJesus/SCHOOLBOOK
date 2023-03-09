<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Class;
use App\Models\IdClass;

class ClassFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Class::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id_class' => IdClass::factory(),
            'id_subject' => $this->faker->word,
            'id_classroom' => $this->faker->word,
            'id_history' => $this->faker->word,
            'id_cycle' => $this->faker->word,
        ];
    }
}
