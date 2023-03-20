<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;


class MostrarAlumnos extends Component
{
    public function render()
    {
        $students = Student::all();
        return view('livewire.mostrar-alumnos',[
        'students' => $students, 
    ]);
    }
}
