<?php

namespace App\Http\Livewire\Materias;

use App\Models\Subject;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class MostrarMaterias extends Component
{
    public $searchTerm;
    public $filtro1;
    public $filtro2;
    public $filtro3;

    protected $listeners = [
        'deleteSubject',
        'filtro1' => 'setFiltro1',
        'filtro2' => 'setFiltro2',
        'filtro3' => 'setFiltro3',
        'searchSubject' => 'setData'
    ];

    public function setFiltro1($filtro1){
        $this->filtro1 = $filtro1;
    }

    public function setFiltro2($filtro2){
        $this->filtro2 = $filtro2;
    }

    public function setFiltro3($filtro3){
        $this->filtro3 = $filtro3;
    }

    public function setData($searchSubject)
    {
        $this->searchTerm = $searchSubject;
    }

    public function deleteSubject(Subject $subject)
    {   
        //Eliminamos el temario
        if( $subject->syllabus) {
            Storage::delete('public/temarios/' . $subject->syllabus);
        }
        //se elimina teacher
        $subject->delete();
    }

    public function render()
    {
        $searchTerm = $this->searchTerm;
        $data = Subject::all();
        $subjects = Subject::when($this->searchTerm,function($query){
            $query->where('subject_name','LIKE',"%" .$this->searchTerm ."%")
            ->orWhere('subjectID','LIKE',"%" .$this->searchTerm ."%");
        })->when($this->filtro1,function($query){
            $query->orWhere('grade',1);
        })->when($this->filtro2,function($query){
            $query->orWhere('grade',2);
        })->when($this->filtro3,function($query){
            $query->orWhere('grade',3);
        })->paginate(8);
        return view('livewire.materias.mostrar-materias',[
        'subjects' => $subjects,
        'searchTerm' => $searchTerm,
        'data' => $data,
        ]);
    }
}
