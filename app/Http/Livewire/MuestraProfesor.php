<?php

namespace App\Http\Livewire;

use App\Models\Teacher;
use Livewire\Component;

class MuestraProfesor extends Component
{
    public $teacher;
    protected $listeners = [
        'updateTeacher' => 'render'
    ];
    
    public function render()
    {
        return view('livewire.muestra-profesor', [
            'teacher' => $this->teacher
        ]);
    }
}
