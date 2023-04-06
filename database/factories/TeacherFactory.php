<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Teacher;

class TeacherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Teacher::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'father_surname' => $this->faker->lastName,
            'fathers_last_name' => $this->faker->lastName,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'curp' => "OEAF771012HMCRGR09",
            'rfc' => "QUMA470929F37",
            'education_level' => "EjemploNivelEstudios",
            'major' => "ejemploEspecialidad",
            'photo' => "9raz59Htm1dd1kAJb563OWNktKBhibbHZ5ltpuSE.jpg",
            'professional_license' => "c6ZuYVbKn2wAHRHDx5F8GBJpy5BJX5UCb7iosphh.pdf",
            'address_id' => Address::all()->random()->id,
        ];
    }
}
