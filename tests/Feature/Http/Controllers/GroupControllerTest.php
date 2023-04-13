<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Group;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\GroupController
 */
class GroupControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $groups = Group::factory()->count(3)->create();

        $response = $this->get(route('group.index'));

        $response->assertOk();
        $response->assertViewIs('group.index');
        $response->assertViewHas('groups');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('group.create'));

        $response->assertOk();
        $response->assertViewIs('group.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\GroupController::class,
            'store',
            \App\Http\Requests\GroupStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $subject_id = $this->faker->word;
        $classroom_id = $this->faker->word;
        $cycle_id = $this->faker->word;

        $response = $this->post(route('group.store'), [
            'subject_id' => $subject_id,
            'classroom_id' => $classroom_id,
            'cycle_id' => $cycle_id,
        ]);

        $groups = Group::query()
            ->where('subject_id', $subject_id)
            ->where('classroom_id', $classroom_id)
            ->where('cycle_id', $cycle_id)
            ->get();
        $this->assertCount(1, $groups);
        $group = $groups->first();

        $response->assertRedirect(route('group.index'));
        $response->assertSessionHas('group.id', $group->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $group = Group::factory()->create();

        $response = $this->get(route('group.show', $group));

        $response->assertOk();
        $response->assertViewIs('group.show');
        $response->assertViewHas('group');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $group = Group::factory()->create();

        $response = $this->get(route('group.edit', $group));

        $response->assertOk();
        $response->assertViewIs('group.edit');
        $response->assertViewHas('group');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\GroupController::class,
            'update',
            \App\Http\Requests\GroupUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $group = Group::factory()->create();
        $subject_id = $this->faker->word;
        $classroom_id = $this->faker->word;
        $cycle_id = $this->faker->word;

        $response = $this->put(route('group.update', $group), [
            'subject_id' => $subject_id,
            'classroom_id' => $classroom_id,
            'cycle_id' => $cycle_id,
        ]);

        $group->refresh();

        $response->assertRedirect(route('group.index'));
        $response->assertSessionHas('group.id', $group->id);

        $this->assertEquals($subject_id, $group->subject_id);
        $this->assertEquals($classroom_id, $group->classroom_id);
        $this->assertEquals($cycle_id, $group->cycle_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $group = Group::factory()->create();

        $response = $this->delete(route('group.destroy', $group));

        $response->assertRedirect(route('group.index'));

        $this->assertModelMissing($group);
    }
}
