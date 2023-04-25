<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseStoreRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function index(Request $request): View
    {
        $courses = Course::all();

        return view('course.index', compact('courses'));
    }

    public function create(Request $request): View
    {
        return view('course.create');
    }

    public function store(CourseStoreRequest $request): Response
    {
        $course = Course::create($request->validated());

        $request->session()->flash('course.id', $course->id);

        return redirect()->route('course.index');
    }

    public function show(Request $request, Course $course): View
    {
        return view('course.show', compact('course'));
    }

    public function edit(Request $request, Course $course): view
    {
        return view('course.edit', compact('course'));
    }

    public function update(CourseUpdateRequest $request, Course $course): Response
    {
        $course->update($request->validated());

        $request->session()->flash('course.id', $course->id);

        return redirect()->route('course.index');
    }

    public function destroy(Request $request, Course $course): Response
    {
        $course->delete();

        return redirect()->route('course.index');
    }
}
