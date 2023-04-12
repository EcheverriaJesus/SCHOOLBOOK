<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClaseStoreRequest;
use App\Http\Requests\ClaseUpdateRequest;
use App\Models\Clase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClaseController extends Controller
{
    public function index(Request $request): Response
    {
        $clases = Clase::all();

        return view('clase.index', compact('clases'));
    }

    public function create(Request $request): Response
    {
        return view('clase.create');
    }

    public function store(ClaseStoreRequest $request): Response
    {
        $clase = Clase::create($request->validated());

        $request->session()->flash('clase.id', $clase->id);

        return redirect()->route('clase.index');
    }

    public function show(Request $request, Clase $clase): Response
    {
        return view('clase.show', compact('clase'));
    }

    public function edit(Request $request, Clase $clase): Response
    {
        return view('clase.edit', compact('clase'));
    }

    public function update(ClaseUpdateRequest $request, Clase $clase): Response
    {
        $clase->update($request->validated());

        $request->session()->flash('clase.id', $clase->id);

        return redirect()->route('clase.index');
    }

    public function destroy(Request $request, Clase $clase): Response
    {
        $clase->delete();

        return redirect()->route('clase.index');
    }
}
