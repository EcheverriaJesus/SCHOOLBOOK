<?php

namespace App\Http\Livewire\CiclosEscolares;

use App\Models\School_cycle;
use Livewire\Component;

class CrearCiclo extends Component
{
    public $nombre;
    public $fecha_inicio;
    public $fecha_fin;
    public $estatus;

    protected $rules = [
        'nombre' => 'required|string|max:100',
        'fecha_inicio' => 'required|date',
        'fecha_fin' => 'required|date',
        'estatus' => 'nullable|in:1,0'
    ];


    public function crearCiclo()
    {
        $datos = $this->validate();
        if($datos['estatus'] != 1){
            $datos['estatus'] = 0;
        }
        School_cycle::create([
            'cycle_name' => $datos['nombre'],
            'start_date' => $datos['fecha_inicio'],
            'end_date' => $datos['fecha_fin'],
            'status' => $datos['estatus']
        ]);

        session()->flash('mensaje', 'Se registro el ciclo escolar correctamente');
        return redirect()->route('schoolCycles.index');
    }

    public function render()
    {
        return view('livewire.ciclos-escolares.crear-ciclo');
    }
}
