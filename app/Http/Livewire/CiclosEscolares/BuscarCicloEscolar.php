<?php

namespace App\Http\Livewire\CiclosEscolares;

use Livewire\Component;

class BuscarCicloEscolar extends Component
{
    public $searchCycle;

    protected $queryString = [ 'searchCycle'];

    public function render()
    {
        $this->emit('searchCycle',$this->searchCycle);
        return view('livewire.ciclos-escolares.buscar-ciclo-escolar');
    }
}
