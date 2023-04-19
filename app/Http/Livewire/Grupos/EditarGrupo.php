<?php

namespace App\Http\Livewire\Grupos;

use App\Models\Group;
use Livewire\Component;
use App\Models\Classroom;

class EditarGrupo extends Component
{
    public $nombre;
    public $turno;
    public $grado;
    public $estatus;
    public $aula;
    public $group_id;

    protected $rules = [
        'nombre' => 'required|string|max:1',
        'turno' => 'required|in:matutino,vespertino',
        'grado' => 'required|in:1,2,3',
        'estatus' => 'nullable|boolean',
        'aula' => 'nullable|numeric',
    ];

    public function mount(Group $group){
        $this->group_id = $group->id;
        $this->nombre = $group->name; 
        $this->turno = $group->shift; 
        $this->grado = $group->grade; 
        $this->estatus = $group->status; 
        $this->aula = $group->classroom_id; 
    }

    public function editarGrupo()
    {
        //Validar campos
        $datos = $this->validate();

        $group = Group::find($this->group_id);

        //Asignar los valores group
        $group->name = $datos['nombre'];
        $group->shift = $datos['turno'];
        $group->grade = $datos['grado'];
        $group->status = $datos['estatus'];
        $group->classroom_id = $datos['aula'] ?? $this->aula;
        $group->save();
        //redireccionar with message
        session()->flash('mensaje','Los datos del aula se actualizarón correctamente');
        return redirect()->route('groups.index');

    }

    public function render()
    {
        $classrooms = Classroom::all();
        $groups = Group::with('classroom')->get();
        $aulasSinGrupo = Classroom::where(function ($query) {
            $query->whereDoesntHave('group', function ($query) {
                $query->where('shift', '=', 'matutino');
            })->orWhereDoesntHave('group', function ($query) {
                $query->where('shift', '=', 'vespertino');
            });
        })->get();
        
        return view('livewire.grupos.editar-grupo',[
            'groups' => $groups,
            'classrooms' => $classrooms,
            'aulasSinGrupo' => $aulasSinGrupo,
        ]);
    }
}
