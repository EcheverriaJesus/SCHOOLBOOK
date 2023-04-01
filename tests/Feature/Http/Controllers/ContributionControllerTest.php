<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Contribution;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ContributionController
 */
class ContributionControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $contributions = Contribution::factory()->count(3)->create();

        $response = $this->get(route('contribution.index'));

        $response->assertOk();
        $response->assertViewIs('contribution.index');
        $response->assertViewHas('contributions');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('contribution.create'));

        $response->assertOk();
        $response->assertViewIs('contribution.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ContributionController::class,
            'store',
            \App\Http\Requests\ContributionStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $amount = $this->faker->numberBetween(-10000, 10000);
        $status = $this->faker->boolean;
        $description = $this->faker->text;
        $contribution_date = $this->faker->date();
        $deadline_date = $this->faker->date();
        $student_id = $this->faker->word;

        $response = $this->post(route('contribution.store'), [
            'amount' => $amount,
            'status' => $status,
            'description' => $description,
            'contribution_date' => $contribution_date,
            'deadline_date' => $deadline_date,
            'student_id' => $student_id,
        ]);

        $contributions = Contribution::query()
            ->where('amount', $amount)
            ->where('status', $status)
            ->where('description', $description)
            ->where('contribution_date', $contribution_date)
            ->where('deadline_date', $deadline_date)
            ->where('student_id', $student_id)
            ->get();
        $this->assertCount(1, $contributions);
        $contribution = $contributions->first();

        $response->assertRedirect(route('contribution.index'));
        $response->assertSessionHas('contribution.id', $contribution->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $contribution = Contribution::factory()->create();

        $response = $this->get(route('contribution.show', $contribution));

        $response->assertOk();
        $response->assertViewIs('contribution.show');
        $response->assertViewHas('contribution');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $contribution = Contribution::factory()->create();

        $response = $this->get(route('contribution.edit', $contribution));

        $response->assertOk();
        $response->assertViewIs('contribution.edit');
        $response->assertViewHas('contribution');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ContributionController::class,
            'update',
            \App\Http\Requests\ContributionUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $contribution = Contribution::factory()->create();
        $amount = $this->faker->numberBetween(-10000, 10000);
        $status = $this->faker->boolean;
        $description = $this->faker->text;
        $contribution_date = $this->faker->date();
        $deadline_date = $this->faker->date();
        $student_id = $this->faker->word;

        $response = $this->put(route('contribution.update', $contribution), [
            'amount' => $amount,
            'status' => $status,
            'description' => $description,
            'contribution_date' => $contribution_date,
            'deadline_date' => $deadline_date,
            'student_id' => $student_id,
        ]);

        $contribution->refresh();

        $response->assertRedirect(route('contribution.index'));
        $response->assertSessionHas('contribution.id', $contribution->id);

        $this->assertEquals($amount, $contribution->amount);
        $this->assertEquals($status, $contribution->status);
        $this->assertEquals($description, $contribution->description);
        $this->assertEquals(Carbon::parse($contribution_date), $contribution->contribution_date);
        $this->assertEquals(Carbon::parse($deadline_date), $contribution->deadline_date);
        $this->assertEquals($student_id, $contribution->student_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $contribution = Contribution::factory()->create();

        $response = $this->delete(route('contribution.destroy', $contribution));

        $response->assertRedirect(route('contribution.index'));

        $this->assertModelMissing($contribution);
    }
}
