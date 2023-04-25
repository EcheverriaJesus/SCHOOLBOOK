<?php

namespace App\Http\Livewire\Cursos;

use App\Models\Course;
use App\Models\Group_course;
use Livewire\Component;

class MostrarCursos extends Component
{
    public $searchTerm;

    protected $listeners = [
        'deleteCourse',
        'searchCourse' => 'setData'
    ];

    public function deleteCourse(Course $course)
    {   
        $course->delete();
    }

    public function setData($searchCourse)
    {
        $this->searchTerm = $searchCourse;
    }

    public function render()
    {
        $searchTerm = $this->searchTerm;
        $data = Course::all();
        $courses = Course::when($this->searchTerm,function($query){
            $query->where('name','LIKE',"%" .$this->searchTerm ."%");
        })->paginate(8);
        $groupCourses = Group_course::all();
        return view('livewire.cursos.mostrar-cursos',[
            'courses' => $courses,
            'groupCourses' => $groupCourses,
            'searchTerm' => $searchTerm,
            'data' => $data
            
        ]);
    }
}
