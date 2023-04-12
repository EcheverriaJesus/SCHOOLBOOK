<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Subject;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SubjectController
 */
class SubjectControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $subjects = Subject::factory()->count(3)->create();

        $response = $this->get(route('subject.index'));

        $response->assertOk();
        $response->assertViewIs('subject.index');
        $response->assertViewHas('subjects');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('subject.create'));

        $response->assertOk();
        $response->assertViewIs('subject.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SubjectController::class,
            'store',
            \App\Http\Requests\SubjectStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $subject_name = $this->faker->word;
        $description = $this->faker->text;
        $grade = $this->faker->numberBetween(-10000, 10000);
        $syllabus = $this->faker->word;

        $response = $this->post(route('subject.store'), [
            'subject_name' => $subject_name,
            'description' => $description,
            'grade' => $grade,
            'syllabus' => $syllabus,
        ]);

        $subjects = Subject::query()
            ->where('subject_name', $subject_name)
            ->where('description', $description)
            ->where('grade', $grade)
            ->where('syllabus', $syllabus)
            ->get();
        $this->assertCount(1, $subjects);
        $subject = $subjects->first();

        $response->assertRedirect(route('subject.index'));
        $response->assertSessionHas('subject.id', $subject->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $subject = Subject::factory()->create();

        $response = $this->get(route('subject.show', $subject));

        $response->assertOk();
        $response->assertViewIs('subject.show');
        $response->assertViewHas('subject');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $subject = Subject::factory()->create();

        $response = $this->get(route('subject.edit', $subject));

        $response->assertOk();
        $response->assertViewIs('subject.edit');
        $response->assertViewHas('subject');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SubjectController::class,
            'update',
            \App\Http\Requests\SubjectUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $subject = Subject::factory()->create();
        $subject_name = $this->faker->word;
        $description = $this->faker->text;
        $grade = $this->faker->numberBetween(-10000, 10000);
        $syllabus = $this->faker->word;

        $response = $this->put(route('subject.update', $subject), [
            'subject_name' => $subject_name,
            'description' => $description,
            'grade' => $grade,
            'syllabus' => $syllabus,
        ]);

        $subject->refresh();

        $response->assertRedirect(route('subject.index'));
        $response->assertSessionHas('subject.id', $subject->id);

        $this->assertEquals($subject_name, $subject->subject_name);
        $this->assertEquals($description, $subject->description);
        $this->assertEquals($grade, $subject->grade);
        $this->assertEquals($syllabus, $subject->syllabus);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $subject = Subject::factory()->create();

        $response = $this->delete(route('subject.destroy', $subject));

        $response->assertRedirect(route('subject.index'));

        $this->assertModelMissing($subject);
    }
}
