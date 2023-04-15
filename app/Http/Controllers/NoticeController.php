<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoticeStoreRequest;
use App\Http\Requests\NoticeUpdateRequest;
use App\Models\Notice;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NoticeController extends Controller
{
    public function index(Request $request): Response
    {
        $notices = Notice::all();

        return view('notice.index', compact('notices'));
    }

    public function create(Request $request): View
    {
        return view('notice.create');
    }

    public function store(NoticeStoreRequest $request): Response
    {
        $notice = Notice::create($request->validated());

        $request->session()->flash('notice.id', $notice->id);

        return redirect()->route('notice.index');
    }

    public function show(Request $request, Notice $notice): View
    {
        return view('notice.show', compact('notice'));
    }

    public function edit(Request $request, Notice $notice): View
    {
        return view('notice.edit', compact('notice'));
    }

    public function update(NoticeUpdateRequest $request, Notice $notice): Response
    {
        $notice->update($request->validated());

        $request->session()->flash('notice.id', $notice->id);

        return redirect()->route('notice.index');
    }

    public function destroy(Request $request, Notice $notice): Response
    {
        $notice->delete();

        return redirect()->route('notice.index');
    }
}
