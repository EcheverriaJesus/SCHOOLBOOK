<?php

namespace App\Http\Livewire\Materias;

use App\Models\Subject;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearMateria extends Component
{

    public $nombre;
    public $descripción;
    public $grado;
    public $temario;

    use WithFileUploads;

    protected $rules = [
        'nombre' => 'required|string|max:100',
        'descripción' => 'required',
        'grado' => 'required|in:1,2,3',
        'temario' => 'required|mimes:pdf'
    ];

    public function crearMateria(){
        $datos = $this->validate();
        
        $temario = $this->temario->store('public/temarios');
        $datos['temario'] = str_replace('public/temarios/','',$temario);

        Subject::create([
            'subject_name' => $datos['nombre'],
            'description' => $datos['descripción'],
            'grade' => $datos['grado'],
            'syllabus' => $datos['temario']
        ]);

        
        session()->flash('mensaje','Se registro la materia correctamente');
        return redirect()->route('subjects.index');
    }

    public function render()
    {
        return view('livewire.materias.crear-materia');
    }
}
