<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassroomStoreRequest;
use App\Http\Requests\ClassroomUpdateRequest;
use App\Models\Classroom;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClassroomController extends Controller
{
    public function index(Request $request): View
    {
        $classrooms = Classroom::all();

        return view('classroom.index', compact('classrooms'));
    }

    public function create(Request $request): View
    {
        return view('classroom.create');
    }

    public function store(ClassroomStoreRequest $request): Response
    {
        $classroom = Classroom::create($request->validated());

        $request->session()->flash('classroom.id', $classroom->id);

        return redirect()->route('classroom.index');
    }

    public function show(Request $request, Classroom $classroom): View
    {
        return view('classroom.show', compact('classroom'));
    }

    public function edit(Request $request, Classroom $classroom): View
    {
        return view('classroom.edit', compact('classroom'));
    }

    public function update(ClassroomUpdateRequest $request, Classroom $classroom): Response
    {
        $classroom->update($request->validated());

        $request->session()->flash('classroom.id', $classroom->id);

        return redirect()->route('classroom.index');
    }

    public function destroy(Request $request, Classroom $classroom): Response
    {
        $classroom->delete();

        return redirect()->route('classroom.index');
    }
}
