<?php

namespace App\Http\Livewire\Aportaciones;

use Livewire\Component;

class BuscarAporte extends Component
{
    public $searchAporte;

    protected $queryString = [ 'searchAporte'];

    public function render()
    {
        $this->emit('searchAporte',$this->searchAporte);
        return view('livewire.aportaciones.buscar-aporte');
    }
}
