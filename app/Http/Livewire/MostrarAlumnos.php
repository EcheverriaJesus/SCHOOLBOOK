<?php

namespace App\Http\Livewire;

use App\Models\Address;
use App\Models\Document;
use App\Models\Student;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;


class MostrarAlumnos extends Component
{
    protected $listeners = [
        'deleteStudent'
    ];

    public function deleteStudent(Student $student)
    {   
        //Obtenemos la direccion del alumno
        $address = Address::find($student->address_id);
        $document = Document::find($student->document_id);
        //Eliminamos photo Alumno
        if( $student->photo) {
            Storage::delete('public/imageStudents/' . $student->photo);
        }
        //se elimina Alumno
        $student->delete();
        //se elimina direccion del Alumno
        $address->delete();
        $document->delete();
    }

    public function render()
    {
        $students = Student::all();
        return view('livewire.mostrar-alumnos',[
        'students' => $students, 
    ]);
    }
}
