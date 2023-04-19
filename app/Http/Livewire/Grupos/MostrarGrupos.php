<?php

namespace App\Http\Livewire\Grupos;

use App\Models\Group;
use Livewire\Component;

class MostrarGrupos extends Component
{
    public $searchTerm;

    protected $listeners = [
        'deleteGroup',
        'searchGroup' => 'setData'
    ];

    public function setData($searchGroup)
    {
        $this->searchTerm = $searchGroup;
    }

    public function deleteGroup(Group $group)
    {   
        $group->delete();
    }

    public function render()
    {
        $searchTerm = $this->searchTerm;
        $data = Group::all();
        $groups = Group::when($this->searchTerm,function($query){
            $query->where('name','LIKE',"%" .$this->searchTerm ."%");
        })->paginate(8);
        return view('livewire.grupos.mostrar-grupos',[
            'groups' => $groups,
            'searchTerm' => $searchTerm,
            'data' => $data,
        ]);
    }
}
