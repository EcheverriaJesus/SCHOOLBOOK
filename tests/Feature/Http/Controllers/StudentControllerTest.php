<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\StudentController
 */
class StudentControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $students = Student::factory()->count(3)->create();

        $response = $this->get(route('student.index'));

        $response->assertOk();
        $response->assertViewIs('student.index');
        $response->assertViewHas('students');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('student.create'));

        $response->assertOk();
        $response->assertViewIs('student.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StudentController::class,
            'store',
            \App\Http\Requests\StudentStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $student_name = $this->faker->word;
        $paternal_surname = $this->faker->word;
        $maternal_surname = $this->faker->word;
        $grade = $this->faker->numberBetween(-10000, 10000);
        $birth_date = $this->faker->date();
        $curp = $this->faker->word;
        $gender = $this->faker->word;
        $email = $this->faker->safeEmail;
        $phone = $this->faker->phoneNumber;
        $status = $this->faker->boolean;
        $study_plan = $this->faker->word;
        $photo = $this->faker->word;
        $address_id = $this->faker->word;
        $tutor_id = $this->faker->word;
        $document_id = $this->faker->word;

        $response = $this->post(route('student.store'), [
            'student_name' => $student_name,
            'paternal_surname' => $paternal_surname,
            'maternal_surname' => $maternal_surname,
            'grade' => $grade,
            'birth_date' => $birth_date,
            'curp' => $curp,
            'gender' => $gender,
            'email' => $email,
            'phone' => $phone,
            'status' => $status,
            'study_plan' => $study_plan,
            'photo' => $photo,
            'address_id' => $address_id,
            'tutor_id' => $tutor_id,
            'document_id' => $document_id,
        ]);

        $students = Student::query()
            ->where('student_name', $student_name)
            ->where('paternal_surname', $paternal_surname)
            ->where('maternal_surname', $maternal_surname)
            ->where('grade', $grade)
            ->where('birth_date', $birth_date)
            ->where('curp', $curp)
            ->where('gender', $gender)
            ->where('email', $email)
            ->where('phone', $phone)
            ->where('status', $status)
            ->where('study_plan', $study_plan)
            ->where('photo', $photo)
            ->where('address_id', $address_id)
            ->where('tutor_id', $tutor_id)
            ->where('document_id', $document_id)
            ->get();
        $this->assertCount(1, $students);
        $student = $students->first();

        $response->assertRedirect(route('student.index'));
        $response->assertSessionHas('student.id', $student->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $student = Student::factory()->create();

        $response = $this->get(route('student.show', $student));

        $response->assertOk();
        $response->assertViewIs('student.show');
        $response->assertViewHas('student');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $student = Student::factory()->create();

        $response = $this->get(route('student.edit', $student));

        $response->assertOk();
        $response->assertViewIs('student.edit');
        $response->assertViewHas('student');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StudentController::class,
            'update',
            \App\Http\Requests\StudentUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $student = Student::factory()->create();
        $student_name = $this->faker->word;
        $paternal_surname = $this->faker->word;
        $maternal_surname = $this->faker->word;
        $grade = $this->faker->numberBetween(-10000, 10000);
        $birth_date = $this->faker->date();
        $curp = $this->faker->word;
        $gender = $this->faker->word;
        $email = $this->faker->safeEmail;
        $phone = $this->faker->phoneNumber;
        $status = $this->faker->boolean;
        $study_plan = $this->faker->word;
        $photo = $this->faker->word;
        $address_id = $this->faker->word;
        $tutor_id = $this->faker->word;
        $document_id = $this->faker->word;

        $response = $this->put(route('student.update', $student), [
            'student_name' => $student_name,
            'paternal_surname' => $paternal_surname,
            'maternal_surname' => $maternal_surname,
            'grade' => $grade,
            'birth_date' => $birth_date,
            'curp' => $curp,
            'gender' => $gender,
            'email' => $email,
            'phone' => $phone,
            'status' => $status,
            'study_plan' => $study_plan,
            'photo' => $photo,
            'address_id' => $address_id,
            'tutor_id' => $tutor_id,
            'document_id' => $document_id,
        ]);

        $student->refresh();

        $response->assertRedirect(route('student.index'));
        $response->assertSessionHas('student.id', $student->id);

        $this->assertEquals($student_name, $student->student_name);
        $this->assertEquals($paternal_surname, $student->paternal_surname);
        $this->assertEquals($maternal_surname, $student->maternal_surname);
        $this->assertEquals($grade, $student->grade);
        $this->assertEquals(Carbon::parse($birth_date), $student->birth_date);
        $this->assertEquals($curp, $student->curp);
        $this->assertEquals($gender, $student->gender);
        $this->assertEquals($email, $student->email);
        $this->assertEquals($phone, $student->phone);
        $this->assertEquals($status, $student->status);
        $this->assertEquals($study_plan, $student->study_plan);
        $this->assertEquals($photo, $student->photo);
        $this->assertEquals($address_id, $student->address_id);
        $this->assertEquals($tutor_id, $student->tutor_id);
        $this->assertEquals($document_id, $student->document_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $student = Student::factory()->create();

        $response = $this->delete(route('student.destroy', $student));

        $response->assertRedirect(route('student.index'));

        $this->assertModelMissing($student);
    }
}
