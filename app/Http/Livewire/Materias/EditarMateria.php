<?php

namespace App\Http\Livewire\Materias;

use App\Models\Subject;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditarMateria extends Component
{
    public $subject_id;
    public $nombre;
    public $descripción;
    public $grado;
    public $temario;
    public $temario_nuevo;

    //importar clase de subida de archivos
    use WithFileUploads;

    protected $rules = [
        'nombre' => 'required|string|max:100',
        'descripción' => 'required',
        'grado' => 'required|in:1,2,3',
        'temario_nuevo' => 'nullable|mimes:pdf'
    ];

    public function mount(Subject $subject){
        $this->subject_id = $subject->id;
        $this->nombre = $subject->subject_name;
        $this->descripción = $subject->description; 
        $this->grado = $subject->grade;
        $this->temario = $subject->syllabus;
    }

    public function editarMateria(){
         //Validar campos
         $datos = $this->validate();
         $subject = Subject::find($this->subject_id);
         //Hay un nuevo temario ??
        if($this->temario_nuevo){
            //Se guarda el pdf y se obtiene la ruta
            $pdf = $this->temario_nuevo->store('public/temarios');
            //Cortamos la ruta del pdf para almacenar unicamente el nombre del pdf
            $datos['temario'] = str_replace('public/temarios/','',$pdf);
            //Eliminamos la ced. profesional vieja
            Storage::delete('public/temarios/'.$subject->syllabus);
        }

        //Asignar y guardar los valores Subject
        $subject->subject_name = $datos['nombre'];
        $subject->description = $datos['descripción'];
        $subject->grade = $datos['grado'];
        // temario
        $subject->syllabus = $datos['temario'] ?? $subject->syllabus;
        //saved Teacher
        $subject->save();
         //redireccionar with message
         session()->flash('mensaje','Los datos de la materia se actualizarón correctamente');
         return redirect()->route('subjects.index');
    }
    
    public function render()
    {
        return view('livewire.materias.editar-materia');
    }
}
