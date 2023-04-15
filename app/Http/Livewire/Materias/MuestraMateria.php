<?php

namespace App\Http\Livewire\Materias;

use App\Models\Subject;
use Livewire\Component;

class MuestraMateria extends Component
{
    public $subject;
    public $subjectId;

    public function render()
    {
        $subjectId = $this->subject->id;
        $subject = Subject::where('id', $subjectId);
        return view(
            'livewire.materias.muestra-materia',
            ['subject' => $subject]
        );
    }
}
