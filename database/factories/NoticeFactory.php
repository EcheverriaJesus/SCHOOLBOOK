<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\IdNotice;
use App\Models\Notice;

class NoticeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Notice::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id_notice' => IdNotice::factory(),
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->text,
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'status' => $this->faker->boolean,
            'recipient' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'image' => $this->faker->regexify('[A-Za-z0-9]{255}'),
        ];
    }
}
