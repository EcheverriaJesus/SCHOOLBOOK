<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Document;
use App\Models\IdDocument;

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
            'id_document' => IdDocument::factory(),
            'document_name' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'status' => $this->faker->boolean,
            'file' => $this->faker->regexify('[A-Za-z0-9]{5}'),
            'id_student' => $this->faker->word,
        ];
    }
}
