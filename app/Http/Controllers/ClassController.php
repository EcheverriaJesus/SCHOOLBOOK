<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassStoreRequest;
use App\Http\Requests\ClassUpdateRequest;
use App\Models\Class;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClassController extends Controller
{
    public function index(Request $request): Response
    {
        $classes = Class::all();

        return view('class.index', compact('classes'));
    }

    public function create(Request $request): Response
    {
        return view('class.create');
    }

    public function store(ClassStoreRequest $request): Response
    {
        $class = Class::create($request->validated());

        $request->session()->flash('class.id', $class->id);

        return redirect()->route('class.index');
    }

    public function show(Request $request, Class $class): Response
    {
        return view('class.show', compact('class'));
    }

    public function edit(Request $request, Class $class): Response
    {
        return view('class.edit', compact('class'));
    }

    public function update(ClassUpdateRequest $request, Class $class): Response
    {
        $class->update($request->validated());

        $request->session()->flash('class.id', $class->id);

        return redirect()->route('class.index');
    }

    public function destroy(Request $request, Class $class): Response
    {
        $class->delete();

        return redirect()->route('class.index');
    }
}
