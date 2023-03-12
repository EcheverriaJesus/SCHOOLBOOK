<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\IdTeacher;
use App\Models\Teacher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TeacherController
 */
class TeacherControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $teachers = Teacher::factory()->count(3)->create();

        $response = $this->get(route('teacher.index'));

        $response->assertOk();
        $response->assertViewIs('teacher.index');
        $response->assertViewHas('teachers');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('teacher.create'));

        $response->assertOk();
        $response->assertViewIs('teacher.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TeacherController::class,
            'store',
            \App\Http\Requests\TeacherStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $id_teacher = IdTeacher::factory()->create();
        $first_name = $this->faker->firstName;
        $father_surname = $this->faker->word;
        $father's_last_name = $this->faker->word;
        $phone = $this->faker->phoneNumber;
        $email = $this->faker->safeEmail;
        $curp = $this->faker->word;
        $rfc = $this->faker->word;
        $education_level = $this->faker->word;
        $major = $this->faker->word;
        $photo = $this->faker->word;
        $professional_license = $this->faker->word;
        $id_address = $this->faker->word;

        $response = $this->post(route('teacher.store'), [
            'id_teacher' => $id_teacher->id,
            'first_name' => $first_name,
            'father_surname' => $father_surname,
            'father's_last_name' => $father's_last_name,
            'phone' => $phone,
            'email' => $email,
            'curp' => $curp,
            'rfc' => $rfc,
            'education_level' => $education_level,
            'major' => $major,
            'photo' => $photo,
            'professional_license' => $professional_license,
            'id_address' => $id_address,
        ]);

        $teachers = Teacher::query()
            ->where('id_teacher', $id_teacher->id)
            ->where('first_name', $first_name)
            ->where('father_surname', $father_surname)
            ->where('father's_last_name', $father's_last_name)
            ->where('phone', $phone)
            ->where('email', $email)
            ->where('curp', $curp)
            ->where('rfc', $rfc)
            ->where('education_level', $education_level)
            ->where('major', $major)
            ->where('photo', $photo)
            ->where('professional_license', $professional_license)
            ->where('id_address', $id_address)
            ->get();
        $this->assertCount(1, $teachers);
        $teacher = $teachers->first();

        $response->assertRedirect(route('teacher.index'));
        $response->assertSessionHas('teacher.id', $teacher->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $teacher = Teacher::factory()->create();

        $response = $this->get(route('teacher.show', $teacher));

        $response->assertOk();
        $response->assertViewIs('teacher.show');
        $response->assertViewHas('teacher');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $teacher = Teacher::factory()->create();

        $response = $this->get(route('teacher.edit', $teacher));

        $response->assertOk();
        $response->assertViewIs('teacher.edit');
        $response->assertViewHas('teacher');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TeacherController::class,
            'update',
            \App\Http\Requests\TeacherUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $teacher = Teacher::factory()->create();
        $id_teacher = IdTeacher::factory()->create();
        $first_name = $this->faker->firstName;
        $father_surname = $this->faker->word;
        $father's_last_name = $this->faker->word;
        $phone = $this->faker->phoneNumber;
        $email = $this->faker->safeEmail;
        $curp = $this->faker->word;
        $rfc = $this->faker->word;
        $education_level = $this->faker->word;
        $major = $this->faker->word;
        $photo = $this->faker->word;
        $professional_license = $this->faker->word;
        $id_address = $this->faker->word;

        $response = $this->put(route('teacher.update', $teacher), [
            'id_teacher' => $id_teacher->id,
            'first_name' => $first_name,
            'father_surname' => $father_surname,
            'father's_last_name' => $father's_last_name,
            'phone' => $phone,
            'email' => $email,
            'curp' => $curp,
            'rfc' => $rfc,
            'education_level' => $education_level,
            'major' => $major,
            'photo' => $photo,
            'professional_license' => $professional_license,
            'id_address' => $id_address,
        ]);

        $teacher->refresh();

        $response->assertRedirect(route('teacher.index'));
        $response->assertSessionHas('teacher.id', $teacher->id);

        $this->assertEquals($id_teacher->id, $teacher->id_teacher);
        $this->assertEquals($first_name, $teacher->first_name);
        $this->assertEquals($father_surname, $teacher->father_surname);
        $this->assertEquals($father's_last_name, $teacher->father's_last_name);
        $this->assertEquals($phone, $teacher->phone);
        $this->assertEquals($email, $teacher->email);
        $this->assertEquals($curp, $teacher->curp);
        $this->assertEquals($rfc, $teacher->rfc);
        $this->assertEquals($education_level, $teacher->education_level);
        $this->assertEquals($major, $teacher->major);
        $this->assertEquals($photo, $teacher->photo);
        $this->assertEquals($professional_license, $teacher->professional_license);
        $this->assertEquals($id_address, $teacher->id_address);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $teacher = Teacher::factory()->create();

        $response = $this->delete(route('teacher.destroy', $teacher));

        $response->assertRedirect(route('teacher.index'));

        $this->assertModelMissing($teacher);
    }
}
