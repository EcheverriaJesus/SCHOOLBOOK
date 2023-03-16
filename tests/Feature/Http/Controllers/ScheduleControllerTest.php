<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\IdSchedule;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ScheduleController
 */
class ScheduleControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $schedules = Schedule::factory()->count(3)->create();

        $response = $this->get(route('schedule.index'));

        $response->assertOk();
        $response->assertViewIs('schedule.index');
        $response->assertViewHas('schedules');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('schedule.create'));

        $response->assertOk();
        $response->assertViewIs('schedule.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ScheduleController::class,
            'store',
            \App\Http\Requests\ScheduleStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $id_schedule = IdSchedule::factory()->create();
        $start_time = $this->faker->time();
        $end_time = $this->faker->time();
        $day = $this->faker->date();
        $id_class = $this->faker->word;

        $response = $this->post(route('schedule.store'), [
            'id_schedule' => $id_schedule->id,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'day' => $day,
            'id_class' => $id_class,
        ]);

        $schedules = Schedule::query()
            ->where('id_schedule', $id_schedule->id)
            ->where('start_time', $start_time)
            ->where('end_time', $end_time)
            ->where('day', $day)
            ->where('id_class', $id_class)
            ->get();
        $this->assertCount(1, $schedules);
        $schedule = $schedules->first();

        $response->assertRedirect(route('schedule.index'));
        $response->assertSessionHas('schedule.id', $schedule->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $schedule = Schedule::factory()->create();

        $response = $this->get(route('schedule.show', $schedule));

        $response->assertOk();
        $response->assertViewIs('schedule.show');
        $response->assertViewHas('schedule');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $schedule = Schedule::factory()->create();

        $response = $this->get(route('schedule.edit', $schedule));

        $response->assertOk();
        $response->assertViewIs('schedule.edit');
        $response->assertViewHas('schedule');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ScheduleController::class,
            'update',
            \App\Http\Requests\ScheduleUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $schedule = Schedule::factory()->create();
        $id_schedule = IdSchedule::factory()->create();
        $start_time = $this->faker->time();
        $end_time = $this->faker->time();
        $day = $this->faker->date();
        $id_class = $this->faker->word;

        $response = $this->put(route('schedule.update', $schedule), [
            'id_schedule' => $id_schedule->id,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'day' => $day,
            'id_class' => $id_class,
        ]);

        $schedule->refresh();

        $response->assertRedirect(route('schedule.index'));
        $response->assertSessionHas('schedule.id', $schedule->id);

        $this->assertEquals($id_schedule->id, $schedule->id_schedule);
        $this->assertEquals($start_time, $schedule->start_time);
        $this->assertEquals($end_time, $schedule->end_time);
        $this->assertEquals(Carbon::parse($day), $schedule->day);
        $this->assertEquals($id_class, $schedule->id_class);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $schedule = Schedule::factory()->create();

        $response = $this->delete(route('schedule.destroy', $schedule));

        $response->assertRedirect(route('schedule.index'));

        $this->assertModelMissing($schedule);
    }
}
