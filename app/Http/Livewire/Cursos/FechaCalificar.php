<?php

namespace App\Http\Livewire\Cursos;

use Carbon\Carbon;
use App\Models\Course;
use Livewire\Component;

class FechaCalificar extends Component
{
    public $fecha_limite;

    protected $listeners = ['resetForm'];

    protected $rules = [
        'fecha_limite' => 'required|date',
    ];

    public function mount()
    {
        $this->resetValidation();
        $this->reset();
    }

    public function resetForm()
    {
        $this->reset();
        $this->resetValidation();
    }

    public function establecerFecha()
    {
        $datos = $this->validate();
        $cursosActivos = Course::where('status', true)->get();
        foreach ($cursosActivos as $curso) {
            $curso->deadline_date = $this->fecha_limite;
            $curso->save();
        }
    }

    public function render()
    {
        $primerCurso = Course::where('status', true)->first();
        $fechaLimite = null;
        if ($primerCurso) {
            $fechaLimite = Carbon::parse($primerCurso->deadline_date)->locale('es')->isoFormat('LL [a las] h:mm A');
        }
        return view(
            'livewire.cursos.fecha-calificar',
            [
                'fechaLimite' => $fechaLimite
            ]
        );
    }
}
