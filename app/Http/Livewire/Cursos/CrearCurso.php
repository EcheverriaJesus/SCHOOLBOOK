<?php

namespace App\Http\Livewire\Cursos;

use App\Models\Group;
use App\Models\Course;
use App\Models\Subject;
use Livewire\Component;
use App\Models\Group_course;
use App\Models\School_cycle;
use Illuminate\Support\Facades\DB;

class CrearCurso extends Component
{

    public $materia;
    public $grupo;
    public $ciclo;
    public $estatus;

    protected $rules = [
        'materia' => 'required|integer',
        'grupo' => 'required|integer',
        'ciclo' => 'required|integer',
        'estatus' => 'nullable|boolean'
    ];

    public function crearCurso()
    {
        $datos = $this->validate();
        $subject = Subject::find($datos['materia']);
        $group = Group::find($datos['grupo']);
        $nameCourse = $subject->subject_name . ' ' . $group->grade . '° ' . $group->name;
        try {
            DB::beginTransaction(); // Inicia la transacción
            $curso = Course::create([
                'name' => $nameCourse,
                'subject_id' => $datos['materia'],
                'cycle_id' => $datos['ciclo'],
                'status' => $datos['estatus'],
            ]);

            Group_course::create([
                'course_id' => $curso->id,
                'group_id' => $datos['grupo'],
            ]);

            DB::commit(); // Confirma la transacción si ambas consultas se ejecutan correctamente

        } catch (\Exception $e) {
            DB::rollback(); // Deshace la transacción si ocurre algún error
            throw $e; // Puedes manejar el error de alguna manera o simplemente arrojarlo
        }


        session()->flash('mensaje', 'Se registro el curso correctamente');
        return redirect()->route('courses.index');
    }


    public function render()
    {
        $subjects = Subject::all();
        $groups = Group::all();
        $cycles = School_cycle::where('status', 1)->get();
        return view('livewire.cursos.crear-curso', [
            'subjects' => $subjects,
            'groups' => $groups,
            'cycles' => $cycles,
        ]);
    }
}
