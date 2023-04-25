<?php

namespace App\Http\Livewire\Cursos;

use App\Models\Course;
use App\Models\Group;
use App\Models\Group_course;
use App\Models\School_cycle;
use App\Models\Subject;
use Livewire\Component;

class EditarCurso extends Component
{
    public $materia;
    public $grupo;
    public $ciclo;
    public $estatus;
    public $course_id;

    protected $rules = [
        'materia' => 'required|integer',
        'grupo' => 'required|integer',
        'ciclo' => 'required|integer',
        'estatus' => 'nullable:boolean'
    ];

    public function mount(Course $course)
    {
        $this->course_id = $course->id;
        $groupId = Group_course::where('course_id', $course->id)->first();
        $group = Group::where('id', $groupId->group_id)->first();
        $this->materia = $course->subject_id;
        $this->grupo = $group->id;
        $this->ciclo = $course->cycle_id;
        $this->estatus = $course->status;
    }

    public function editarCurso()
    {   
        //Validar campos
        $datos = $this->validate();
        $course = Course::find($this->course_id);
        $group_course = Group_course::where('course_id', $this->course_id)->first();
        $subject = Subject::find($datos['materia']);
        $group = Group::find($datos['grupo']);
        $nameCourse = $subject->subject_name . ' ' . $group->grade . '° ' . $group->name;
        //Asignar y guardar los valores del curso
        $course->name = $nameCourse;
        $course->subject_id = $datos['materia'];
        $course->cycle_id = $datos['ciclo'];
        $course->status = $datos['estatus'];
        $group_course->group_id = $datos['grupo'];
        $group_course->save();
        $course->save();

        //redireccionar with message
        session()->flash('mensaje', 'Los datos del curso se actualizarón correctamente');
        return redirect()->route('courses.index');
    }

    public function render()
    {
        $subjects = Subject::all();
        $groups = Group::all();
        $cycles = School_cycle::where('status', 1)->get();
        return view('livewire.cursos.editar-curso', [
            'subjects' => $subjects,
            'groups' => $groups,
            'cycles' => $cycles,
        ]);
    }
}
