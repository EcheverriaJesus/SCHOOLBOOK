<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScheduleStoreRequest;
use App\Http\Requests\ScheduleUpdateRequest;
use App\Models\Schedule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ScheduleController extends Controller
{
    public function index(Request $request): Response
    {
        $schedules = Schedule::all();

        return view('schedule.index', compact('schedules'));
    }

    public function create(Request $request): Response
    {
        return view('schedule.create');
    }

    public function store(ScheduleStoreRequest $request): Response
    {
        $schedule = Schedule::create($request->validated());

        $request->session()->flash('schedule.id', $schedule->id);

        return redirect()->route('schedule.index');
    }

    public function show(Request $request, Schedule $schedule): Response
    {
        return view('schedule.show', compact('schedule'));
    }

    public function edit(Request $request, Schedule $schedule): Response
    {
        return view('schedule.edit', compact('schedule'));
    }

    public function update(ScheduleUpdateRequest $request, Schedule $schedule): Response
    {
        $schedule->update($request->validated());

        $request->session()->flash('schedule.id', $schedule->id);

        return redirect()->route('schedule.index');
    }

    public function destroy(Request $request, Schedule $schedule): Response
    {
        $schedule->delete();

        return redirect()->route('schedule.index');
    }
}
