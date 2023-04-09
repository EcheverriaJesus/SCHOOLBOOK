<?php

namespace App\Http\Livewire;

use App\Models\Teacher;
use Livewire\Component;

class MuestraProfesor extends Component
{
    public $teacher;
    public $teacherId;
    protected $listeners = [
        'updateTeacher' => 'render'
    ];
    public function render()
    {
        $teacherId = $this->teacher->id;
        $teacher = Teacher::where('id', $teacherId);
        return view('livewire.muestra-profesor', [
            'teacher' => $teacher
        ]);
    }
}
