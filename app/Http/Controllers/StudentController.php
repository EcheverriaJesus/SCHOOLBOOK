<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function index(Request $request): View
    {
        $students = Student::all();

        return view('student.index', compact('students'));
    }

    public function create(Request $request): View
    {
        return view('student.create');
    }

    public function store(StudentStoreRequest $request): Response
    {
        $student = Student::create($request->validated());

        $request->session()->flash('student.id', $student->id);

        return redirect()->route('student.index');
    }

    public function show(Request $request, Student $student): View
    {
        return view('student.show', compact('student'));
    }

    public function edit(Request $request, Student $student): View
    {
        return view('student.edit', compact('student'));
    }

    public function update(StudentUpdateRequest $request, Student $student): Response
    {
        $student->update($request->validated());

        $request->session()->flash('student.id', $student->id);

        return redirect()->route('student.index');
    }

    public function destroy(Request $request, Student $student): Response
    {
        $student->delete();

        return redirect()->route('student.index');
    }
}
