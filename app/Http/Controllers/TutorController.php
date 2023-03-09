<?php

namespace App\Http\Controllers;

use App\Http\Requests\TutorStoreRequest;
use App\Http\Requests\TutorUpdateRequest;
use App\Models\Tutor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TutorController extends Controller
{
    public function index(Request $request): Response
    {
        $tutors = Tutor::all();

        return view('tutor.index', compact('tutors'));
    }

    public function create(Request $request): Response
    {
        return view('tutor.create');
    }

    public function store(TutorStoreRequest $request): Response
    {
        $tutor = Tutor::create($request->validated());

        $request->session()->flash('tutor.id', $tutor->id);

        return redirect()->route('tutor.index');
    }

    public function show(Request $request, Tutor $tutor): Response
    {
        return view('tutor.show', compact('tutor'));
    }

    public function edit(Request $request, Tutor $tutor): Response
    {
        return view('tutor.edit', compact('tutor'));
    }

    public function update(TutorUpdateRequest $request, Tutor $tutor): Response
    {
        $tutor->update($request->validated());

        $request->session()->flash('tutor.id', $tutor->id);

        return redirect()->route('tutor.index');
    }

    public function destroy(Request $request, Tutor $tutor): Response
    {
        $tutor->delete();

        return redirect()->route('tutor.index');
    }
}
