<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Class;
use App\Models\IdClass;
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
        $id_class = IdClass::factory()->create();
        $id_subject = $this->faker->word;
        $id_classroom = $this->faker->word;
        $id_history = $this->faker->word;
        $id_cycle = $this->faker->word;

        $response = $this->post(route('class.store'), [
            'id_class' => $id_class->id,
            'id_subject' => $id_subject,
            'id_classroom' => $id_classroom,
            'id_history' => $id_history,
            'id_cycle' => $id_cycle,
        ]);

        $classes = Class::query()
            ->where('id_class', $id_class->id)
            ->where('id_subject', $id_subject)
            ->where('id_classroom', $id_classroom)
            ->where('id_history', $id_history)
            ->where('id_cycle', $id_cycle)
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
        $id_class = IdClass::factory()->create();
        $id_subject = $this->faker->word;
        $id_classroom = $this->faker->word;
        $id_history = $this->faker->word;
        $id_cycle = $this->faker->word;

        $response = $this->put(route('class.update', $class), [
            'id_class' => $id_class->id,
            'id_subject' => $id_subject,
            'id_classroom' => $id_classroom,
            'id_history' => $id_history,
            'id_cycle' => $id_cycle,
        ]);

        $class->refresh();

        $response->assertRedirect(route('class.index'));
        $response->assertSessionHas('class.id', $class->id);

        $this->assertEquals($id_class->id, $class->id_class);
        $this->assertEquals($id_subject, $class->id_subject);
        $this->assertEquals($id_classroom, $class->id_classroom);
        $this->assertEquals($id_history, $class->id_history);
        $this->assertEquals($id_cycle, $class->id_cycle);
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
