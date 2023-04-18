<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Qualification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\QualificationController
 */
class QualificationControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $qualifications = Qualification::factory()->count(3)->create();

        $response = $this->get(route('qualification.index'));

        $response->assertOk();
        $response->assertViewIs('qualification.index');
        $response->assertViewHas('qualifications');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('qualification.create'));

        $response->assertOk();
        $response->assertViewIs('qualification.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\QualificationController::class,
            'store',
            \App\Http\Requests\QualificationStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $bim1 = $this->faker->randomFloat(/** float_attributes **/);
        $bim2 = $this->faker->randomFloat(/** float_attributes **/);
        $bim3 = $this->faker->randomFloat(/** float_attributes **/);
        $bim4 = $this->faker->randomFloat(/** float_attributes **/);
        $bim5 = $this->faker->randomFloat(/** float_attributes **/);
        $promedio_final = $this->faker->randomFloat(/** float_attributes **/);
        $course_id = $this->faker->word;
        $student_id = $this->faker->word;

        $response = $this->post(route('qualification.store'), [
            'bim1' => $bim1,
            'bim2' => $bim2,
            'bim3' => $bim3,
            'bim4' => $bim4,
            'bim5' => $bim5,
            'promedio_final' => $promedio_final,
            'course_id' => $course_id,
            'student_id' => $student_id,
        ]);

        $qualifications = Qualification::query()
            ->where('bim1', $bim1)
            ->where('bim2', $bim2)
            ->where('bim3', $bim3)
            ->where('bim4', $bim4)
            ->where('bim5', $bim5)
            ->where('promedio_final', $promedio_final)
            ->where('course_id', $course_id)
            ->where('student_id', $student_id)
            ->get();
        $this->assertCount(1, $qualifications);
        $qualification = $qualifications->first();

        $response->assertRedirect(route('qualification.index'));
        $response->assertSessionHas('qualification.id', $qualification->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $qualification = Qualification::factory()->create();

        $response = $this->get(route('qualification.show', $qualification));

        $response->assertOk();
        $response->assertViewIs('qualification.show');
        $response->assertViewHas('qualification');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $qualification = Qualification::factory()->create();

        $response = $this->get(route('qualification.edit', $qualification));

        $response->assertOk();
        $response->assertViewIs('qualification.edit');
        $response->assertViewHas('qualification');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\QualificationController::class,
            'update',
            \App\Http\Requests\QualificationUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $qualification = Qualification::factory()->create();
        $bim1 = $this->faker->randomFloat(/** float_attributes **/);
        $bim2 = $this->faker->randomFloat(/** float_attributes **/);
        $bim3 = $this->faker->randomFloat(/** float_attributes **/);
        $bim4 = $this->faker->randomFloat(/** float_attributes **/);
        $bim5 = $this->faker->randomFloat(/** float_attributes **/);
        $promedio_final = $this->faker->randomFloat(/** float_attributes **/);
        $course_id = $this->faker->word;
        $student_id = $this->faker->word;

        $response = $this->put(route('qualification.update', $qualification), [
            'bim1' => $bim1,
            'bim2' => $bim2,
            'bim3' => $bim3,
            'bim4' => $bim4,
            'bim5' => $bim5,
            'promedio_final' => $promedio_final,
            'course_id' => $course_id,
            'student_id' => $student_id,
        ]);

        $qualification->refresh();

        $response->assertRedirect(route('qualification.index'));
        $response->assertSessionHas('qualification.id', $qualification->id);

        $this->assertEquals($bim1, $qualification->bim1);
        $this->assertEquals($bim2, $qualification->bim2);
        $this->assertEquals($bim3, $qualification->bim3);
        $this->assertEquals($bim4, $qualification->bim4);
        $this->assertEquals($bim5, $qualification->bim5);
        $this->assertEquals($promedio_final, $qualification->promedio_final);
        $this->assertEquals($course_id, $qualification->course_id);
        $this->assertEquals($student_id, $qualification->student_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $qualification = Qualification::factory()->create();

        $response = $this->delete(route('qualification.destroy', $qualification));

        $response->assertRedirect(route('qualification.index'));

        $this->assertModelMissing($qualification);
    }
}
