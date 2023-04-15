<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Clase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ClaseController
 */
class ClaseControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $clases = Clase::factory()->count(3)->create();

        $response = $this->get(route('clase.index'));

        $response->assertOk();
        $response->assertViewIs('clase.index');
        $response->assertViewHas('clases');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('clase.create'));

        $response->assertOk();
        $response->assertViewIs('clase.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ClaseController::class,
            'store',
            \App\Http\Requests\ClaseStoreRequest::class
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

        $response = $this->post(route('clase.store'), [
            'subject_id' => $subject_id,
            'classroom_id' => $classroom_id,
            'history_id' => $history_id,
            'cycle_id' => $cycle_id,
        ]);

        $clases = Clase::query()
            ->where('subject_id', $subject_id)
            ->where('classroom_id', $classroom_id)
            ->where('history_id', $history_id)
            ->where('cycle_id', $cycle_id)
            ->get();
        $this->assertCount(1, $clases);
        $clase = $clases->first();

        $response->assertRedirect(route('clase.index'));
        $response->assertSessionHas('clase.id', $clase->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $clase = Clase::factory()->create();

        $response = $this->get(route('clase.show', $clase));

        $response->assertOk();
        $response->assertViewIs('clase.show');
        $response->assertViewHas('clase');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $clase = Clase::factory()->create();

        $response = $this->get(route('clase.edit', $clase));

        $response->assertOk();
        $response->assertViewIs('clase.edit');
        $response->assertViewHas('clase');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ClaseController::class,
            'update',
            \App\Http\Requests\ClaseUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $clase = Clase::factory()->create();
        $subject_id = $this->faker->word;
        $classroom_id = $this->faker->word;
        $history_id = $this->faker->word;
        $cycle_id = $this->faker->word;

        $response = $this->put(route('clase.update', $clase), [
            'subject_id' => $subject_id,
            'classroom_id' => $classroom_id,
            'history_id' => $history_id,
            'cycle_id' => $cycle_id,
        ]);

        $clase->refresh();

        $response->assertRedirect(route('clase.index'));
        $response->assertSessionHas('clase.id', $clase->id);

        $this->assertEquals($subject_id, $clase->subject_id);
        $this->assertEquals($classroom_id, $clase->classroom_id);
        $this->assertEquals($history_id, $clase->history_id);
        $this->assertEquals($cycle_id, $clase->cycle_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $clase = Clase::factory()->create();

        $response = $this->delete(route('clase.destroy', $clase));

        $response->assertRedirect(route('clase.index'));

        $this->assertModelMissing($clase);
    }
}
