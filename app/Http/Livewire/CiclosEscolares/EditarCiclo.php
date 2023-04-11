<?php

namespace App\Http\Livewire\CiclosEscolares;

use App\Models\School_cycle;
use Livewire\Component;

class EditarCiclo extends Component
{

    public function render()
    {
        return view('livewire.ciclos-escolares.editar-ciclo');
    }
}
