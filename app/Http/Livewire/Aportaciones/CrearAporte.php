<?php

namespace App\Http\Livewire\Aportaciones;

use App\Models\Contribution;
use App\Models\Student;
use Livewire\Component;

class CrearAporte extends Component
{
    public $amount;
    public $status;
    public $description;
    public $contribution_date;
    public $deadline_date;
    public $student_id;

    protected $rules = [
        'amount' => 'required|string|max:100',
        'status' => 'required|boolean',
        'description' => 'required|string|max:100',
        'contribution_date' => 'required|date',
        'deadline_date' => 'required|date',
        'student_id' => 'required|exists:students,studentID'
    ];

    public function crearAporte()
    {
        $datos = $this->validate();
    
        Contribution::create([
            'amount' => $datos['amount'],
            'status' => $datos['status'],
            'description' => $datos['description'],
            'contribution_date' => $datos['contribution_date'],
            'deadline_date' => $datos['deadline_date'],
            'student_id' => $datos['student_id']
        ]);

        session()->flash('mensaje', 'La aporteacion se registró correctamente');
        return redirect()->route('contributions.index');
    } 

    public function render()
    {
        $students = Student::all();
        return view('livewire.aportaciones.crear-aporte', [
            'students' => $students
        ]);
    }
}
