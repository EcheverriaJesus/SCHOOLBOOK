<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressStoreRequest;
use App\Http\Requests\AddressUpdateRequest;
use App\Models\Address;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AddressController extends Controller
{
    public function index(Request $request): Response
    {
        $addresses = Address::all();

        return view('address.index', compact('addresses'));
    }

    public function create(Request $request): Response
    {
        return view('address.create');
    }

    public function store(AddressStoreRequest $request): Response
    {
        $address = Address::create($request->validated());

        $request->session()->flash('address.id', $address->id);

        return redirect()->route('address.index');
    }

    public function show(Request $request, Address $address): Response
    {
        return view('address.show', compact('address'));
    }

    public function edit(Request $request, Address $address): Response
    {
        return view('address.edit', compact('address'));
    }

    public function update(AddressUpdateRequest $request, Address $address): Response
    {
        $address->update($request->validated());

        $request->session()->flash('address.id', $address->id);

        return redirect()->route('address.index');
    }

    public function destroy(Request $request, Address $address): Response
    {
        $address->delete();

        return redirect()->route('address.index');
    }
}
