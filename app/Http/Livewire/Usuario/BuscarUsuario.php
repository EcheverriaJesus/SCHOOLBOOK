<?php

namespace App\Http\Livewire\Usuario;

use Livewire\Component;

class BuscarUsuario extends Component
{
    public $searchUser;
    protected $queryString = [ 'searchUser'];

    public function render()
    {
        $this->emit('searchUser',$this->searchUser);
        return view('livewire.usuario.buscar-usuario');
    }
}
