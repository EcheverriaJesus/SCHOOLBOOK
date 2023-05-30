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
    public function index(Request $request): View
    {
        $schedules = Schedule::all();
        return view('schedule.index', compact('schedules'));
    }

    public function teacherSchedule(Request $request): View
    {
        $schedules = Schedule::all();
        return view('schedule.schedule', compact('schedules'));
    }

    public function studentSchedule(Request $request): View
    {
        $schedules = Schedule::all();
        return view('schedule.schedule', compact('schedules'));
    }

    public function create(Request $request): View
    {
        return view('schedule.create');
    }

    public function show(Request $request, Schedule $schedule): View
    {
        return view('schedule.show', compact('schedule'));
    }

    public function edit(Request $request, Schedule $schedule): View
    {
        return view('schedule.edit', compact('schedule'));
    }

}
