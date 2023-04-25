<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;

class MuestraAlumno extends Component
{
    public $student;

    public function render()
    {
        
        //$studentId = $this->student->studentID;
        $student = Student::where('studentID', $this->student->studentID)->first();
        return view('livewire.muestra-alumno',[
            'student' => $student
        ]);
    }
}
