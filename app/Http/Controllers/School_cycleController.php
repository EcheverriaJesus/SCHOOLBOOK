<?php

namespace App\Http\Controllers;

use App\Http\Requests\School_cycleStoreRequest;
use App\Http\Requests\School_cycleUpdateRequest;
use App\Models\School_cycle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class School_cycleController extends Controller
{
    public function index(Request $request): View
    {
        $schoolCycles = School_cycle::all();
        return view('schoolCycle.index', compact('schoolCycles'));
    }

    public function create(Request $request): View
    {
        return view('schoolCycle.create');
    }

    public function store(School_cycleStoreRequest $request): Response
    {
        $schoolCycle = School_cycle::create($request->validated());

        $request->session()->flash('schoolCycle.id', $schoolCycle->id);

        return redirect()->route('schoolCycle.index');
    }

    public function show(Request $request, School_cycle $schoolCycle): Response
    {
        return view('schoolCycle.show', compact('schoolCycle'));
    }

    public function edit(Request $request, School_cycle $schoolCycle): View
    {
        return view('schoolCycle.edit', compact('schoolCycle'));
    }

    public function update(School_cycleUpdateRequest $request, School_cycle $schoolCycle): Response
    {
        $schoolCycle->update($request->validated());

        $request->session()->flash('schoolCycle.id', $schoolCycle->id);

        return redirect()->route('schoolCycle.index');
    }

    public function destroy(Request $request, School_cycle $schoolCycle): Response
    {
        $schoolCycle->delete();

        return redirect()->route('schoolCycle.index');
    }
}
