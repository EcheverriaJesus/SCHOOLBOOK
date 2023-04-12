<?php

namespace App\Http\Livewire\Aulas;

use App\Models\Classroom;
use Livewire\Component;

class CrearAula extends Component
{
    public $nombre;
    public $edificio;
    public $capacidad;

    protected $listeners = ['resetForm'];

    protected $rules = [
        'nombre' => 'required|string|max:100',
        'edificio' => 'required|string|max:100',
        'capacidad' => 'required|integer|min:1',
    ];

    public function mount()
    {
        $this->resetValidation();
        $this->reset();
    }

    public function resetForm()
    {
        $this->reset();
        $this->resetValidation();
    }


    public function crearAula()
    {
        $datos = $this->validate();
        Classroom::create([
            'classroom_name' => $datos['nombre'],
            'building' => $datos['edificio'],
            'capacity' => $datos['capacidad']
        ]);

        session()->flash('mensaje', 'Se registro el aula correctamente');
        return redirect()->route('classroom.index');
    }

    public function render()
    {
        return view('livewire.aulas.crear-aula');
    }
}
