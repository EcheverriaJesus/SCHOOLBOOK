<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CourseController
 */
class CourseControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $courses = Course::factory()->count(3)->create();

        $response = $this->get(route('course.index'));

        $response->assertOk();
        $response->assertViewIs('course.index');
        $response->assertViewHas('courses');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('course.create'));

        $response->assertOk();
        $response->assertViewIs('course.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CourseController::class,
            'store',
            \App\Http\Requests\CourseStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $subject_id = $this->faker->word;
        $cycle_id = $this->faker->word;

        $response = $this->post(route('course.store'), [
            'subject_id' => $subject_id,
            'cycle_id' => $cycle_id,
        ]);

        $courses = Course::query()
            ->where('subject_id', $subject_id)
            ->where('cycle_id', $cycle_id)
            ->get();
        $this->assertCount(1, $courses);
        $course = $courses->first();

        $response->assertRedirect(route('course.index'));
        $response->assertSessionHas('course.id', $course->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $course = Course::factory()->create();

        $response = $this->get(route('course.show', $course));

        $response->assertOk();
        $response->assertViewIs('course.show');
        $response->assertViewHas('course');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $course = Course::factory()->create();

        $response = $this->get(route('course.edit', $course));

        $response->assertOk();
        $response->assertViewIs('course.edit');
        $response->assertViewHas('course');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CourseController::class,
            'update',
            \App\Http\Requests\CourseUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $course = Course::factory()->create();
        $subject_id = $this->faker->word;
        $cycle_id = $this->faker->word;

        $response = $this->put(route('course.update', $course), [
            'subject_id' => $subject_id,
            'cycle_id' => $cycle_id,
        ]);

        $course->refresh();

        $response->assertRedirect(route('course.index'));
        $response->assertSessionHas('course.id', $course->id);

        $this->assertEquals($subject_id, $course->subject_id);
        $this->assertEquals($cycle_id, $course->cycle_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $course = Course::factory()->create();

        $response = $this->delete(route('course.destroy', $course));

        $response->assertRedirect(route('course.index'));

        $this->assertModelMissing($course);
    }
}
