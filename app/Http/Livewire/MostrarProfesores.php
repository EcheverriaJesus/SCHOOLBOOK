<?php

namespace App\Http\Livewire;

use App\Models\Address;
use App\Models\Teacher;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class MostrarProfesores extends Component
{
    protected $listeners = [
        'deleteTeacher'
    ];

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
        $teachers = Teacher::paginate(8);
        return view('livewire.mostrar-profesores',[
            'teachers' => $teachers,
        ]);
    }
}
