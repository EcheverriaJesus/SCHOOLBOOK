<?php

namespace App\Http\Livewire\Aulas;

use Livewire\Component;

class BuscarAula extends Component
{
    public $searchClassroom;

    protected $queryString = [ 'searchClassroom'];

    public function render()
    {
        $this->emit('searchClassroom',$this->searchClassroom);
        return view('livewire.aulas.buscar-aula');
    }
}
