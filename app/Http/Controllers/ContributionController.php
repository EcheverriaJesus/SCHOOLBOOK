<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContributionStoreRequest;
use App\Http\Requests\ContributionUpdateRequest;
use App\Models\Contribution;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContributionController extends Controller
{
    public function index(Request $request): View
    {
        $contributions = Contribution::all();

        return view('contribution.index', compact('contributions'));
    }

    public function create(Request $request): View
    {
        return view('contribution.create');
    }

    public function store(ContributionStoreRequest $request): Response
    {
        $contribution = Contribution::create($request->validated());

        $request->session()->flash('contribution.id', $contribution->id);

        return redirect()->route('contribution.index');
    }

    public function show(Request $request, Contribution $contribution): Response
    {
        return view('contribution.show', compact('contribution'));
    }

    public function edit(Request $request, Contribution $contribution): View
    {
        return view('contribution.edit', compact('contribution'));
    }

    public function update(ContributionUpdateRequest $request, Contribution $contribution): Response
    {
        $contribution->update($request->validated());

        $request->session()->flash('contribution.id', $contribution->id);

        return redirect()->route('contribution.index');
    }

    public function destroy(Request $request, Contribution $contribution): Response
    {
        $contribution->delete();

        return redirect()->route('contribution.index');
    }
}
