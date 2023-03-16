<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\IdTutor;
use App\Models\Tutor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TutorController
 */
class TutorControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $tutors = Tutor::factory()->count(3)->create();

        $response = $this->get(route('tutor.index'));

        $response->assertOk();
        $response->assertViewIs('tutor.index');
        $response->assertViewHas('tutors');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('tutor.create'));

        $response->assertOk();
        $response->assertViewIs('tutor.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TutorController::class,
            'store',
            \App\Http\Requests\TutorStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $id_tutor = IdTutor::factory()->create();
        $tutor_name = $this->faker->word;
        $paternal_surname = $this->faker->word;
        $maternal_surname = $this->faker->word;
        $gender = $this->faker->word;
        $email = $this->faker->safeEmail;
        $phone = $this->faker->phoneNumber;
        $id_address = $this->faker->word;

        $response = $this->post(route('tutor.store'), [
            'id_tutor' => $id_tutor->id,
            'tutor_name' => $tutor_name,
            'paternal_surname' => $paternal_surname,
            'maternal_surname' => $maternal_surname,
            'gender' => $gender,
            'email' => $email,
            'phone' => $phone,
            'id_address' => $id_address,
        ]);

        $tutors = Tutor::query()
            ->where('id_tutor', $id_tutor->id)
            ->where('tutor_name', $tutor_name)
            ->where('paternal_surname', $paternal_surname)
            ->where('maternal_surname', $maternal_surname)
            ->where('gender', $gender)
            ->where('email', $email)
            ->where('phone', $phone)
            ->where('id_address', $id_address)
            ->get();
        $this->assertCount(1, $tutors);
        $tutor = $tutors->first();

        $response->assertRedirect(route('tutor.index'));
        $response->assertSessionHas('tutor.id', $tutor->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $tutor = Tutor::factory()->create();

        $response = $this->get(route('tutor.show', $tutor));

        $response->assertOk();
        $response->assertViewIs('tutor.show');
        $response->assertViewHas('tutor');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $tutor = Tutor::factory()->create();

        $response = $this->get(route('tutor.edit', $tutor));

        $response->assertOk();
        $response->assertViewIs('tutor.edit');
        $response->assertViewHas('tutor');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TutorController::class,
            'update',
            \App\Http\Requests\TutorUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $tutor = Tutor::factory()->create();
        $id_tutor = IdTutor::factory()->create();
        $tutor_name = $this->faker->word;
        $paternal_surname = $this->faker->word;
        $maternal_surname = $this->faker->word;
        $gender = $this->faker->word;
        $email = $this->faker->safeEmail;
        $phone = $this->faker->phoneNumber;
        $id_address = $this->faker->word;

        $response = $this->put(route('tutor.update', $tutor), [
            'id_tutor' => $id_tutor->id,
            'tutor_name' => $tutor_name,
            'paternal_surname' => $paternal_surname,
            'maternal_surname' => $maternal_surname,
            'gender' => $gender,
            'email' => $email,
            'phone' => $phone,
            'id_address' => $id_address,
        ]);

        $tutor->refresh();

        $response->assertRedirect(route('tutor.index'));
        $response->assertSessionHas('tutor.id', $tutor->id);

        $this->assertEquals($id_tutor->id, $tutor->id_tutor);
        $this->assertEquals($tutor_name, $tutor->tutor_name);
        $this->assertEquals($paternal_surname, $tutor->paternal_surname);
        $this->assertEquals($maternal_surname, $tutor->maternal_surname);
        $this->assertEquals($gender, $tutor->gender);
        $this->assertEquals($email, $tutor->email);
        $this->assertEquals($phone, $tutor->phone);
        $this->assertEquals($id_address, $tutor->id_address);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $tutor = Tutor::factory()->create();

        $response = $this->delete(route('tutor.destroy', $tutor));

        $response->assertRedirect(route('tutor.index'));

        $this->assertModelMissing($tutor);
    }
}
