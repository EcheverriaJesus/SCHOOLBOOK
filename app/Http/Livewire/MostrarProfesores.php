<?php

namespace App\Http\Livewire;

use App\Models\Address;
use App\Models\Teacher;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class MostrarProfesores extends Component
{
    public $searchTerm;
    protected $listeners = [
        'deleteTeacher',
        'search' => 'setData'
    ];

    public function setData($searchTerm)
    {
        $this->searchTerm = $searchTerm;
    }

    public function deleteTeacher(Teacher $teacher)
    {   
        //Obtenemos la direccion del teacher
        $address = Address::find($teacher->address_id);
        //Eliminamos photo Teacher
        if( $teacher->photo) {
            Storage::delete('public/imageTeachers/' . $teacher->photo);
        }
        //Eliminamos pdf ced. Professional
        if( $teacher->professional_license) {
            Storage::delete('public/cedProfessional/' . $teacher->professional_license);
        }
        //se elimina teacher
        $teacher->delete();
        //se elimina direccion del teacher
        $address->delete();
    }

    public function render()
    { 
        $searchTerm = $this->searchTerm;
        $data = Teacher::all();
        $teachers = Teacher::when($this->searchTerm,function($query){
            $query->where('first_name','LIKE',"%" .$this->searchTerm ."%")
            ->orWhere('father_surname','LIKE',"%" .$this->searchTerm ."%")
            ->orWhere('fathers_last_name','LIKE',"%" .$this->searchTerm ."%")
            ->orWhere('teacherID','LIKE',"%" .$this->searchTerm ."%");
        })
        ->paginate(8);
        return view('livewire.mostrar-profesores',[
            'teachers' => $teachers,
            'searchTerm' => $searchTerm,
            'data' => $data,
        ]);
    }
}