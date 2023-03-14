<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MuestraProfesor extends Component
{
    public $teacher;

    public function render()
    {
        return view('livewire.muestra-profesor');
    }
}
