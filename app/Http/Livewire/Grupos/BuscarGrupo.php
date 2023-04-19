<?php

namespace App\Http\Livewire\Grupos;

use Livewire\Component;

class BuscarGrupo extends Component
{
    public $searchGroup;

    protected $queryString = [ 'searchGroup'];

    public function render()
    {
        $this->emit('searchGroup',$this->searchGroup);
        return view('livewire.grupos.buscar-grupo');
    }
}
