<?php

namespace App\Http\Livewire\CiclosEscolares;

use Livewire\Component;
use App\Models\School_cycle;
use Carbon\Carbon;

class MostrarCiclos extends Component
{

    public $ciclo_id;
    public $nombre;
    public $fecha_inicio;
    public $fecha_fin;
    public $estatus;
    public $fecha_inicio_nueva;
    public $fecha_fin_nueva;
    public $searchTerm;
    
    protected $listeners = [
        'setData',
        'editarCiclo',
        'deleteCycle',
        'searchCycle' => 'setSearch'
    ];

    protected $rules = [
        'nombre' => 'required|string|max:100',
        'fecha_inicio_nueva' => 'nullable|date',
        'fecha_fin_nueva' => 'nullable|date',
        'estatus' => 'nullable|in:1,0'
    ];

    public function setData($idCycle)
    {
        $this->ciclo_id = $idCycle;
        $cycle = School_cycle::find($this->ciclo_id);
        $this->nombre = $cycle->cycle_name;
        $this->fecha_inicio = $cycle->start_date->formatLocalized('%A %d %B %Y');
        $this->fecha_fin = $cycle->end_date->formatLocalized('%A %d %B %Y');
        $this->estatus = $cycle->status; 
    }

    public function setSearch($searchCycle)
    {
        $this->searchTerm = $searchCycle;
    }

    public function editarCiclo()
    {
        if($this->estatus != 1){
            $this->estatus = 0;
        }
        //Validar campos
        $datos = $this->validate();
        $cycle = School_cycle::find($this->ciclo_id);
        //Asignar y guardar los valores Cycle
        $cycle->cycle_name = $datos['nombre'];
        $cycle->start_date = $datos['fecha_inicio_nueva'] ?? $cycle->start_date;
        $cycle->end_date = $datos['fecha_fin_nueva'] ?? $cycle->end_date;
        $cycle->status = $datos['estatus'];
        $cycle->save();
        //redireccionar with message
        session()->flash('mensaje', 'Los datos del ciclo escolar se actualizarón correctamente');
        return redirect()->route('schoolCycles.index');
    }

    public function deleteCycle(School_cycle $cycle)
    {   
        //se elimina teacher
        $cycle->delete();
    }

    public function render()
    {
        $searchTerm = $this->searchTerm;
        $data = School_cycle::all();
        $schoolCycles = School_cycle::when($this->searchTerm,function($query){
            $query->where('cycle_name','LIKE',"%" .$this->searchTerm ."%");
        })->paginate(8);
        return view('livewire.ciclos-escolares.mostrar-ciclos',[
            'schoolCycles' => $schoolCycles,
            'data' => $data,
            'searchTerm' => $searchTerm,
        ]);
    }
}
