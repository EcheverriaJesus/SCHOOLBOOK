<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Address;
use App\Models\IdAddress;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AddressController
 */
class AddressControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $addresses = Address::factory()->count(3)->create();

        $response = $this->get(route('address.index'));

        $response->assertOk();
        $response->assertViewIs('address.index');
        $response->assertViewHas('addresses');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('address.create'));

        $response->assertOk();
        $response->assertViewIs('address.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AddressController::class,
            'store',
            \App\Http\Requests\AddressStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $id_address = IdAddress::factory()->create();
        $street = $this->faker->streetName;
        $num_ext = $this->faker->word;
        $num_int = $this->faker->word;
        $neighborhood = $this->faker->word;
        $city = $this->faker->city;
        $state = $this->faker->word;
        $country = $this->faker->country;

        $response = $this->post(route('address.store'), [
            'id_address' => $id_address->id,
            'street' => $street,
            'num_ext' => $num_ext,
            'num_int' => $num_int,
            'neighborhood' => $neighborhood,
            'city' => $city,
            'state' => $state,
            'country' => $country,
        ]);

        $addresses = Address::query()
            ->where('id_address', $id_address->id)
            ->where('street', $street)
            ->where('num_ext', $num_ext)
            ->where('num_int', $num_int)
            ->where('neighborhood', $neighborhood)
            ->where('city', $city)
            ->where('state', $state)
            ->where('country', $country)
            ->get();
        $this->assertCount(1, $addresses);
        $address = $addresses->first();

        $response->assertRedirect(route('address.index'));
        $response->assertSessionHas('address.id', $address->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $address = Address::factory()->create();

        $response = $this->get(route('address.show', $address));

        $response->assertOk();
        $response->assertViewIs('address.show');
        $response->assertViewHas('address');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $address = Address::factory()->create();

        $response = $this->get(route('address.edit', $address));

        $response->assertOk();
        $response->assertViewIs('address.edit');
        $response->assertViewHas('address');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AddressController::class,
            'update',
            \App\Http\Requests\AddressUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $address = Address::factory()->create();
        $id_address = IdAddress::factory()->create();
        $street = $this->faker->streetName;
        $num_ext = $this->faker->word;
        $num_int = $this->faker->word;
        $neighborhood = $this->faker->word;
        $city = $this->faker->city;
        $state = $this->faker->word;
        $country = $this->faker->country;

        $response = $this->put(route('address.update', $address), [
            'id_address' => $id_address->id,
            'street' => $street,
            'num_ext' => $num_ext,
            'num_int' => $num_int,
            'neighborhood' => $neighborhood,
            'city' => $city,
            'state' => $state,
            'country' => $country,
        ]);

        $address->refresh();

        $response->assertRedirect(route('address.index'));
        $response->assertSessionHas('address.id', $address->id);

        $this->assertEquals($id_address->id, $address->id_address);
        $this->assertEquals($street, $address->street);
        $this->assertEquals($num_ext, $address->num_ext);
        $this->assertEquals($num_int, $address->num_int);
        $this->assertEquals($neighborhood, $address->neighborhood);
        $this->assertEquals($city, $address->city);
        $this->assertEquals($state, $address->state);
        $this->assertEquals($country, $address->country);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $address = Address::factory()->create();

        $response = $this->delete(route('address.destroy', $address));

        $response->assertRedirect(route('address.index'));

        $this->assertModelMissing($address);
    }
}
