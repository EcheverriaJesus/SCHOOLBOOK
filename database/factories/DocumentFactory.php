<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Document;

class DocumentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Document::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'document_name' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'status' => $this->faker->boolean,
            'file' => $this->faker->regexify('[A-Za-z0-9]{255}'),
        ];
    }
}
