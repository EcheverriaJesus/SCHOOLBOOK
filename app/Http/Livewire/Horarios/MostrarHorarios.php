<?php

namespace App\Http\Livewire\Horarios;

use App\Models\Schedule;
use Livewire\Component;

class MostrarHorarios extends Component
{
    protected $listeners = [
        'deleteSchedule',
    ];

    public function deleteSchedule(Schedule $schedule)
    {   
        $schedule->delete();
    }

    public function render()
    {
        $schedules = Schedule::paginate(8);
        $data = Schedule::all();
        return view('livewire.horarios.mostrar-horarios',[
            'schedules' => $schedules,
            'data' => $data
        ]);
    }
}
