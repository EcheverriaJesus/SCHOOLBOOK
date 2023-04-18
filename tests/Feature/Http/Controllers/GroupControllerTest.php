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
        $name = $this->faker->name;
        $shift = $this->faker->word;
        $grade = $this->faker->numberBetween(-1000, 1000);
        $status = $this->faker->boolean;
        $classroom_id = $this->faker->word;

        $response = $this->post(route('group.store'), [
            'name' => $name,
            'shift' => $shift,
            'grade' => $grade,
            'status' => $status,
            'classroom_id' => $classroom_id,
        ]);

        $groups = Group::query()
            ->where('name', $name)
            ->where('shift', $shift)
            ->where('grade', $grade)
            ->where('status', $status)
            ->where('classroom_id', $classroom_id)
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
        $name = $this->faker->name;
        $shift = $this->faker->word;
        $grade = $this->faker->numberBetween(-1000, 1000);
        $status = $this->faker->boolean;
        $classroom_id = $this->faker->word;

        $response = $this->put(route('group.update', $group), [
            'name' => $name,
            'shift' => $shift,
            'grade' => $grade,
            'status' => $status,
            'classroom_id' => $classroom_id,
        ]);

        $group->refresh();

        $response->assertRedirect(route('group.index'));
        $response->assertSessionHas('group.id', $group->id);

        $this->assertEquals($name, $group->name);
        $this->assertEquals($shift, $group->shift);
        $this->assertEquals($grade, $group->grade);
        $this->assertEquals($status, $group->status);
        $this->assertEquals($classroom_id, $group->classroom_id);
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
