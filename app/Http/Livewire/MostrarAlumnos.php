<?php

namespace App\Http\Livewire;


use App\Models\Address;
use App\Models\Tutor;
use App\Models\Document;
use App\Models\Student;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;


class MostrarAlumnos extends Component
{
    public $searchTerm;
    
    protected $listeners = [
        'deleteStudent',
        'search' => 'setData'
    ];

    public function setData($searchTerm)
    {
        $this->searchTerm = $searchTerm;
    }
    public function deleteStudent(Student $student)
    {   
        //Obtenemos la direccion del alumno
        $address = Address::find($student->address_id);
        $document = Document::find($student->document_id);
        $tutor = Tutor::find($student->tutor_id);
        //Eliminamos photo Alumno
        if( $student->photo) {
            Storage::delete('public/imageStudents/' . $student->photo);
        }
        //Eliminamos pdf 
        if( $document->file) {
            Storage::delete('public/fileStudents/' . $document->file);
        }
        //se elimina Alumno
        $student->delete();
        //se elimina direccion del Alumno
        $address->delete();
        $document->delete();
        $tutor->delete();
    }

    public function render()
    {
        $searchTerm = $this->searchTerm;
        $data = Student::all();
        $students = Student::when($this->searchTerm,function($query){
            $query->where('student_name','LIKE',"%" .$this->searchTerm ."%")
            ->orWhere('paternal_surname','LIKE',"%" .$this->searchTerm ."%")
            ->orWhere('maternal_surname','LIKE',"%" .$this->searchTerm ."%");
        })
        ->paginate(8);
        return view('livewire.mostrar-alumnos',[
            'students' => $students,
            'searchTerm' => $searchTerm,
            'data' => $data,
        ]);
    }
}
