<?php

namespace App\Http\Controllers;

use App\Http\Requests\QualificationStoreRequest;
use App\Http\Requests\QualificationUpdateRequest;
use App\Models\Qualification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QualificationController extends Controller
{
    public function index(Request $request): Response
    {
        $qualifications = Qualification::all();

        return view('qualification.index', compact('qualifications'));
    }

    public function create(Request $request): Response
    {
        return view('qualification.create');
    }

    public function store(QualificationStoreRequest $request): Response
    {
        $qualification = Qualification::create($request->validated());

        $request->session()->flash('qualification.id', $qualification->id);

        return redirect()->route('qualification.index');
    }

    public function show(Request $request, Qualification $qualification): Response
    {
        return view('qualification.show', compact('qualification'));
    }

    public function edit(Request $request, Qualification $qualification): Response
    {
        return view('qualification.edit', compact('qualification'));
    }

    public function update(QualificationUpdateRequest $request, Qualification $qualification): Response
    {
        $qualification->update($request->validated());

        $request->session()->flash('qualification.id', $qualification->id);

        return redirect()->route('qualification.index');
    }

    public function destroy(Request $request, Qualification $qualification): Response
    {
        $qualification->delete();

        return redirect()->route('qualification.index');
    }
}
