<?php

namespace App\Http\Livewire\Historial;

use Livewire\Component;
use App\Models\Subject;

class MostrarHistorial extends Component
{
    public $subjects;

    public function mount()
    {
        $this->subjects = Subject::all();
    }

    public function render()
    {
        return view('livewire.historial.mostrar-historial');
    }
}