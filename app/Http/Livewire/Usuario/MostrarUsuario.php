<?php

namespace App\Http\Livewire\Usuario;

use Livewire\Component;
use App\Models\User;

class MostrarUsuario extends Component
{
    public $user_id;
    public $nombre;
    public $email;
    public $searchTerm;

    protected $listeners = [
        'setData',
        'searchUser' => 'setSearch'
    ];

    public function setData($idUser)
    {
        $this->user_id = $idUser;
        $user = User::find($this->user_id);
        $this->nombre = $user->name;
        $this->email = $user->email;
    }
    

    public function setSearch($searchUser)
    {
        $this->searchTerm = $searchUser;
    }

    public function render()
    {
        $searchTerm = $this->searchTerm;
        $data = User::all();
        $users = User::when($this->searchTerm,function($query){
            $query->where('name','LIKE',"%" .$this->searchTerm ."%");
        })->paginate(8);
        return view('livewire.usuario.mostrar-usuario',[
            'users' => $users,
            'data' => $data,
            'searchTerm' => $searchTerm,
        ]);
    }
}
