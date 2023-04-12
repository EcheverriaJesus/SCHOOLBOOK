<?php

namespace App\Http\Livewire\Aulas;

use App\Models\Classroom;
use Livewire\Component;

class MostrarAulas extends Component
{
    public $classroom_id;
    public $nombre;
    public $edificio;
    public $capacidad;
    public $searchTerm;

    protected $listeners = [
        'setData',
        'editarAula',
        'deleteClassroom',
        'searchClassroom' => 'setSearch'
    ];

    protected $rules = [
        'nombre' => 'required|string|max:100',
        'edificio' => 'required|string|max:100',
        'capacidad' => 'required|integer|min:1',
    ];

    public function setData($idClassroom)
    {
        $this->classroom_id = $idClassroom;
        $classroom = Classroom::find($this->classroom_id);
        $this->nombre = $classroom->classroom_name;
        $this->edificio = $classroom->building;
        $this->capacidad = $classroom->capacity;
    }

    public function editarAula()
    {
        $datos = $this->validate();
        $classroom = Classroom::find($this->classroom_id);
        $classroom->classroom_name = $datos['nombre'];
        $classroom->building = $datos['edificio'];
        $classroom->capacity = $datos['capacidad'];
        $classroom->save();
        //redireccionar with message
        session()->flash('mensaje', 'Los datos del aula se actualizarón correctamente');
        return redirect()->route('classroom.index');
    }

    public function deleteClassroom(Classroom $classroom)
    {   
        $classroom->delete();
    }

    public function setSearch($searchClassroom)
    {
        $this->searchTerm = $searchClassroom;
    }

    public function render()
    {
        $searchTerm = $this->searchTerm;
        $data = Classroom::all();
        $classrooms = Classroom::when($this->searchTerm,function($query){
            $query->where('classroom_name','LIKE',"%" .$this->searchTerm ."%");
        })->paginate(8);
        return view('livewire.aulas.mostrar-aulas',[
            'classrooms' => $classrooms,
            'data' => $data,
            'searchTerm' => $searchTerm,
        ]);
    }
}
