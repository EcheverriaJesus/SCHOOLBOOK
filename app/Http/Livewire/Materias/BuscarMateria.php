<?php

namespace App\Http\Livewire\Materias;

use Livewire\Component;

class BuscarMateria extends Component
{
    public $searchSubject;

    protected $queryString = [ 'searchSubject'];

    public function render()
    {
        $this->emit('searchSubject',$this->searchSubject);
        return view('livewire.materias.buscar-materia');
    }
}
