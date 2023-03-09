<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherStoreRequest;
use App\Http\Requests\TeacherUpdateRequest;
use App\Models\Teacher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TeacherController extends Controller
{
    public function index(Request $request): Response
    {
        $teachers = Teacher::all();

        return view('teacher.index', compact('teachers'));
    }

    public function create(Request $request): Response
    {
        return view('teacher.create');
    }

    public function store(TeacherStoreRequest $request): Response
    {
        $teacher = Teacher::create($request->validated());

        $request->session()->flash('teacher.id', $teacher->id);

        return redirect()->route('teacher.index');
    }

    public function show(Request $request, Teacher $teacher): Response
    {
        return view('teacher.show', compact('teacher'));
    }

    public function edit(Request $request, Teacher $teacher): Response
    {
        return view('teacher.edit', compact('teacher'));
    }

    public function update(TeacherUpdateRequest $request, Teacher $teacher): Response
    {
        $teacher->update($request->validated());

        $request->session()->flash('teacher.id', $teacher->id);

        return redirect()->route('teacher.index');
    }

    public function destroy(Request $request, Teacher $teacher): Response
    {
        $teacher->delete();

        return redirect()->route('teacher.index');
    }
}
