<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\SchoolCycle;
use App\Models\School_cycle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\School_cycleController
 */
class School_cycleControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $schoolCycles = School_cycle::factory()->count(3)->create();

        $response = $this->get(route('school_cycle.index'));

        $response->assertOk();
        $response->assertViewIs('schoolCycle.index');
        $response->assertViewHas('schoolCycles');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('school_cycle.create'));

        $response->assertOk();
        $response->assertViewIs('schoolCycle.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\School_cycleController::class,
            'store',
            \App\Http\Requests\School_cycleStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('school_cycle.store'));

        $response->assertRedirect(route('schoolCycle.index'));
        $response->assertSessionHas('schoolCycle.id', $schoolCycle->id);

        $this->assertDatabaseHas(schoolCycles, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $schoolCycle = School_cycle::factory()->create();

        $response = $this->get(route('school_cycle.show', $schoolCycle));

        $response->assertOk();
        $response->assertViewIs('schoolCycle.show');
        $response->assertViewHas('schoolCycle');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $schoolCycle = School_cycle::factory()->create();

        $response = $this->get(route('school_cycle.edit', $schoolCycle));

        $response->assertOk();
        $response->assertViewIs('schoolCycle.edit');
        $response->assertViewHas('schoolCycle');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\School_cycleController::class,
            'update',
            \App\Http\Requests\School_cycleUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $schoolCycle = School_cycle::factory()->create();

        $response = $this->put(route('school_cycle.update', $schoolCycle));

        $schoolCycle->refresh();

        $response->assertRedirect(route('schoolCycle.index'));
        $response->assertSessionHas('schoolCycle.id', $schoolCycle->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $schoolCycle = School_cycle::factory()->create();
        $schoolCycle = SchoolCycle::factory()->create();

        $response = $this->delete(route('school_cycle.destroy', $schoolCycle));

        $response->assertRedirect(route('schoolCycle.index'));

        $this->assertModelMissing($schoolCycle);
    }
}
