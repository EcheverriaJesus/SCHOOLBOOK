<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupStoreRequest;
use App\Http\Requests\GroupUpdateRequest;
use App\Models\Group;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GroupController extends Controller
{
    public function index(Request $request): View
    {
        $groups = Group::all();

        return view('group.index', compact('groups'));
    }

    public function create(Request $request): View
    {
        return view('group.create');
    }

    public function store(GroupStoreRequest $request): Response
    {
        $group = Group::create($request->validated());

        $request->session()->flash('group.id', $group->id);

        return redirect()->route('group.index');
    }

    public function show(Request $request, Group $group): View
    {
        return view('group.show', compact('group'));
    }

    public function edit(Request $request, Group $group): View
    {
        return view('group.edit', compact('group'));
    }

    public function update(GroupUpdateRequest $request, Group $group): Response
    {
        $group->update($request->validated());

        $request->session()->flash('group.id', $group->id);

        return redirect()->route('group.index');
    }

    public function destroy(Request $request, Group $group): Response
    {
        $group->delete();

        return redirect()->route('group.index');
    }
}
