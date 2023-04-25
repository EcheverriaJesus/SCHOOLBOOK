<?php

namespace App\Http\Livewire\Cursos;

use Livewire\Component;

class BuscarCurso extends Component
{
    public $searchCourse;

    protected $queryString = [ 'searchCourse'];

    public function render()
    {
        $this->emit('searchCourse',$this->searchCourse);
        return view('livewire.cursos.buscar-curso');
    }
}
