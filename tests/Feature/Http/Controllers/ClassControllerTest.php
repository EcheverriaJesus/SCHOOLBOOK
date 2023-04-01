<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Class;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ClassController
 */
class ClassControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $classes = Class::factory()->count(3)->create();

        $response = $this->get(route('class.index'));

        $response->assertOk();
        $response->assertViewIs('class.index');
        $response->assertViewHas('classes');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('class.create'));

        $response->assertOk();
        $response->assertViewIs('class.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ClassController::class,
            'store',
            \App\Http\Requests\ClassStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $subject_id = $this->faker->word;
        $classroom_id = $this->faker->word;
        $history_id = $this->faker->word;
        $cycle_id = $this->faker->word;

        $response = $this->post(route('class.store'), [
            'subject_id' => $subject_id,
            'classroom_id' => $classroom_id,
            'history_id' => $history_id,
            'cycle_id' => $cycle_id,
        ]);

        $classes = Class::query()
            ->where('subject_id', $subject_id)
            ->where('classroom_id', $classroom_id)
            ->where('history_id', $history_id)
            ->where('cycle_id', $cycle_id)
            ->get();
        $this->assertCount(1, $classes);
        $class = $classes->first();

        $response->assertRedirect(route('class.index'));
        $response->assertSessionHas('class.id', $class->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $class = Class::factory()->create();

        $response = $this->get(route('class.show', $class));

        $response->assertOk();
        $response->assertViewIs('class.show');
        $response->assertViewHas('class');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $class = Class::factory()->create();

        $response = $this->get(route('class.edit', $class));

        $response->assertOk();
        $response->assertViewIs('class.edit');
        $response->assertViewHas('class');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ClassController::class,
            'update',
            \App\Http\Requests\ClassUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $class = Class::factory()->create();
        $subject_id = $this->faker->word;
        $classroom_id = $this->faker->word;
        $history_id = $this->faker->word;
        $cycle_id = $this->faker->word;

        $response = $this->put(route('class.update', $class), [
            'subject_id' => $subject_id,
            'classroom_id' => $classroom_id,
            'history_id' => $history_id,
            'cycle_id' => $cycle_id,
        ]);

        $class->refresh();

        $response->assertRedirect(route('class.index'));
        $response->assertSessionHas('class.id', $class->id);

        $this->assertEquals($subject_id, $class->subject_id);
        $this->assertEquals($classroom_id, $class->classroom_id);
        $this->assertEquals($history_id, $class->history_id);
        $this->assertEquals($cycle_id, $class->cycle_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $class = Class::factory()->create();

        $response = $this->delete(route('class.destroy', $class));

        $response->assertRedirect(route('class.index'));

        $this->assertModelMissing($class);
    }
}
