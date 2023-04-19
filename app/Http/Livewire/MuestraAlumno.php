<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MuestraAlumno extends Component
{
    public $student;

    public function render()
    {
        return view('livewire.muestra-alumno');
    }
}
