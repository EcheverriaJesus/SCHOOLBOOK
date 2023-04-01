<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Document;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DocumentController
 */
class DocumentControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $documents = Document::factory()->count(3)->create();

        $response = $this->get(route('document.index'));

        $response->assertOk();
        $response->assertViewIs('document.index');
        $response->assertViewHas('documents');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('document.create'));

        $response->assertOk();
        $response->assertViewIs('document.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DocumentController::class,
            'store',
            \App\Http\Requests\DocumentStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $document_name = $this->faker->word;
        $status = $this->faker->boolean;
        $file = $this->faker->word;
        $student_id = $this->faker->word;

        $response = $this->post(route('document.store'), [
            'document_name' => $document_name,
            'status' => $status,
            'file' => $file,
            'student_id' => $student_id,
        ]);

        $documents = Document::query()
            ->where('document_name', $document_name)
            ->where('status', $status)
            ->where('file', $file)
            ->where('student_id', $student_id)
            ->get();
        $this->assertCount(1, $documents);
        $document = $documents->first();

        $response->assertRedirect(route('document.index'));
        $response->assertSessionHas('document.id', $document->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $document = Document::factory()->create();

        $response = $this->get(route('document.show', $document));

        $response->assertOk();
        $response->assertViewIs('document.show');
        $response->assertViewHas('document');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $document = Document::factory()->create();

        $response = $this->get(route('document.edit', $document));

        $response->assertOk();
        $response->assertViewIs('document.edit');
        $response->assertViewHas('document');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DocumentController::class,
            'update',
            \App\Http\Requests\DocumentUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $document = Document::factory()->create();
        $document_name = $this->faker->word;
        $status = $this->faker->boolean;
        $file = $this->faker->word;
        $student_id = $this->faker->word;

        $response = $this->put(route('document.update', $document), [
            'document_name' => $document_name,
            'status' => $status,
            'file' => $file,
            'student_id' => $student_id,
        ]);

        $document->refresh();

        $response->assertRedirect(route('document.index'));
        $response->assertSessionHas('document.id', $document->id);

        $this->assertEquals($document_name, $document->document_name);
        $this->assertEquals($status, $document->status);
        $this->assertEquals($file, $document->file);
        $this->assertEquals($student_id, $document->student_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $document = Document::factory()->create();

        $response = $this->delete(route('document.destroy', $document));

        $response->assertRedirect(route('document.index'));

        $this->assertModelMissing($document);
    }
}
