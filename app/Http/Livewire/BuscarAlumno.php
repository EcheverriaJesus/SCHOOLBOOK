<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BuscarAlumno extends Component
{
    public $searchTerm;

    protected $queryString = [ 'searchTerm'];

    public function render()
    {
        $this->emit('search',$this->searchTerm);
        return view('livewire.buscar-alumno');
    }
}
