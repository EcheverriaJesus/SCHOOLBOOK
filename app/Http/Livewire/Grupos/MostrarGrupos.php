<?php

namespace App\Http\Livewire\Grupos;

use App\Models\Group;
use Livewire\Component;

class MostrarGrupos extends Component
{
    public function render()
    {
        $groups = Group::all();
        return view('livewire.grupos.mostrar-grupos',[
            'groups' => $groups
        ]);
    }
}
