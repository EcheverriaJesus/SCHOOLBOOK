<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Notice;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\NoticeController
 */
class NoticeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $notices = Notice::factory()->count(3)->create();

        $response = $this->get(route('notice.index'));

        $response->assertOk();
        $response->assertViewIs('notice.index');
        $response->assertViewHas('notices');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('notice.create'));

        $response->assertOk();
        $response->assertViewIs('notice.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\NoticeController::class,
            'store',
            \App\Http\Requests\NoticeStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $title = $this->faker->sentence(4);
        $description = $this->faker->text;
        $start_date = $this->faker->date();
        $end_date = $this->faker->date();
        $status = $this->faker->boolean;
        $recipient = $this->faker->word;
        $image = $this->faker->word;

        $response = $this->post(route('notice.store'), [
            'title' => $title,
            'description' => $description,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'status' => $status,
            'recipient' => $recipient,
            'image' => $image,
        ]);

        $notices = Notice::query()
            ->where('title', $title)
            ->where('description', $description)
            ->where('start_date', $start_date)
            ->where('end_date', $end_date)
            ->where('status', $status)
            ->where('recipient', $recipient)
            ->where('image', $image)
            ->get();
        $this->assertCount(1, $notices);
        $notice = $notices->first();

        $response->assertRedirect(route('notice.index'));
        $response->assertSessionHas('notice.id', $notice->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $notice = Notice::factory()->create();

        $response = $this->get(route('notice.show', $notice));

        $response->assertOk();
        $response->assertViewIs('notice.show');
        $response->assertViewHas('notice');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $notice = Notice::factory()->create();

        $response = $this->get(route('notice.edit', $notice));

        $response->assertOk();
        $response->assertViewIs('notice.edit');
        $response->assertViewHas('notice');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\NoticeController::class,
            'update',
            \App\Http\Requests\NoticeUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $notice = Notice::factory()->create();
        $title = $this->faker->sentence(4);
        $description = $this->faker->text;
        $start_date = $this->faker->date();
        $end_date = $this->faker->date();
        $status = $this->faker->boolean;
        $recipient = $this->faker->word;
        $image = $this->faker->word;

        $response = $this->put(route('notice.update', $notice), [
            'title' => $title,
            'description' => $description,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'status' => $status,
            'recipient' => $recipient,
            'image' => $image,
        ]);

        $notice->refresh();

        $response->assertRedirect(route('notice.index'));
        $response->assertSessionHas('notice.id', $notice->id);

        $this->assertEquals($title, $notice->title);
        $this->assertEquals($description, $notice->description);
        $this->assertEquals(Carbon::parse($start_date), $notice->start_date);
        $this->assertEquals(Carbon::parse($end_date), $notice->end_date);
        $this->assertEquals($status, $notice->status);
        $this->assertEquals($recipient, $notice->recipient);
        $this->assertEquals($image, $notice->image);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $notice = Notice::factory()->create();

        $response = $this->delete(route('notice.destroy', $notice));

        $response->assertRedirect(route('notice.index'));

        $this->assertModelMissing($notice);
    }
}
