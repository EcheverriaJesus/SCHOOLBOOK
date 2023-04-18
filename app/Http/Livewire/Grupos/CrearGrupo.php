<?php

namespace App\Http\Livewire\Grupos;

use App\Models\Classroom;
use App\Models\Group;
use Livewire\Component;

class CrearGrupo extends Component
{
    public $nombre;
    public $turno;
    public $grado;
    public $estatus;
    public $aula;

    protected $rules = [
        'nombre' => 'required|string|max:1',
        'turno' => 'required|in:matutino,vespertino',
        'grado' => 'required|in:1,2,3',
        'estatus' => 'nullable|in:1,0',
        'aula' => 'required|numeric',
    ];

    public function crearGrupo(){
        //Validar
        $datos = $this->validate();
        //Se gurda registro de docente
        Group::create([
            'name' => $datos['nombre'],
            'shift' => $datos['turno'],
            'grade' => $datos['grado'],
            'status' => $datos['estatus'],
            'classroom_id' => $datos['aula'],
        ]);
        // Crear mensaje
        session()->flash('mensaje','Se registro al grupo correctamente');
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

        //dd($aulas);
    
        return view('livewire.grupos.crear-grupo',[
            'groups' => $groups,
            'classrooms' => $classrooms,
            'aulasSinGrupo' => $aulasSinGrupo,
        ]);
    }
}
