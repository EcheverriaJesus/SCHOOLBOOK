<?php

namespace App\Http\Livewire\Materias;

use App\Models\Subject;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

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

    public function crearMateria()
    {
        $datos = $this->validate();

        $temario = $this->temario->store('public/temarios');
        $datos['temario'] = str_replace('public/temarios/', '', $temario);

        $clave = $this->crearClaveMateria($datos['nombre'], $datos['grado']);

        Subject::create([
            'subjectID' => $clave,
            'subject_name' => $datos['nombre'],
            'description' => $datos['descripción'],
            'grade' => $datos['grado'],
            'syllabus' => $datos['temario']
        ]);

        session()->flash('mensaje', 'Se registro la materia correctamente');
        return redirect()->route('subjects.index');
    }

    public function crearClaveMateria($nombreMateria, $grado)
    {
        // Convertir el nombre de la materia a mayúsculas y eliminar espacios en blanco al principio y al final
        $nombreMateria = trim(strtoupper($nombreMateria));

        // Obtener las iniciales del nombre de la materia
        $inicialesMateria = substr($nombreMateria, 0, 2);

        // Agregar el grado a la clave
        $claveMateria = $inicialesMateria . $grado;

        // Obtener el último número de la clave de la materia de la base de datos
        $ultimoNumero = DB::table('subjects')
            ->where('subjectID', 'like', $claveMateria . '%')
            ->orderBy('subjectID', 'desc')
            ->value(DB::raw('SUBSTRING(subjectID, 5)'));

        // Si no hay materia previa con la misma clave, establecer el siguiente número como 001, de lo contrario, sumar 1 al último número
        $siguienteNumero = ($ultimoNumero) ? str_pad($ultimoNumero + 1, 3, '0', STR_PAD_LEFT) : '001';

        // Unir el siguiente número a la clave de la materia y devolver la clave completa
        return $claveMateria . $siguienteNumero;
    }

    public function render()
    {
        return view('livewire.materias.crear-materia');
    }
}
