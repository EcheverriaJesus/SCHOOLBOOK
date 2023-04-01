<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Address;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'street' => $this->faker->streetName,
            'num_ext' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'num_int' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'neighborhood' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'city' => $this->faker->city,
            'state' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'country' => $this->faker->country,
        ];
    }
}
