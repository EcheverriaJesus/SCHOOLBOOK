<?php

namespace App\Http\Livewire\Cursos;

use App\Models\Course;
use App\Models\Student;
use Livewire\Component;
use App\Models\Student_course;
use Illuminate\Support\Facades\DB;
use App\Models\Qualification;

class EditarCalificaciones extends Component
{
    public $course_id;
    public $course;
    public $qualifications;
    public $students;

    public function mount(Course $group)
    {
        $this->course_id = $group->id;
        $this->course = Course::where('id', $this->course_id)->first();
    }

    // public function saveQualifications()
    // {
    //     if (empty($this->qualifications)) {
    //         return;
    //     }

    //     foreach ($this->qualifications as $studentId => $data) {
    //         Qualification::updateOrCreate(
    //             [
    //                 'course_id' => $this->course_id,
    //                 'student_id' => $studentId,
    //             ],
    //             $data
    //         );
    //     }

    //     $this->emit('alertSuccess', ['message' => 'Las calificaciones han sido guardadas correctamente'], 'Calificaciones Guardadas');
    // }

    public function saveQualifications()
    {
        if (empty($this->qualifications)) {
            return;
        }

        foreach ($this->qualifications as $studentId => $data) {

            // Filtrar los valores vacíos antes de la actualización o creación
            $filteredData = array_map(function ($value) {
                return $value !== '' ? $value : null;
            }, $data);

            $qualification = Qualification::updateOrCreate(
                [
                    'course_id' => $this->course_id,
                    'student_id' => $studentId,
                ],
                $filteredData
            );
        }

        $this->emit('alertSuccess', ['message' => 'Las calificaciones han sido guardadas correctamente'], 'Calificaciones Guardadas');
    }


    public function render()
    {
        $this->students = DB::table('student_courses')
            ->join('courses', 'student_courses.course_id', '=', 'courses.id')
            ->leftJoin('qualifications', function ($join) {
                $join->on('student_courses.student_id', '=', 'qualifications.student_id')
                    ->on('courses.id', '=', 'qualifications.course_id');
            })
            ->join('students', 'student_courses.student_id', '=', 'students.studentID')
            ->select('student_courses.student_id', 'students.studentID', 'students.student_name', 'students.paternal_surname', 'students.maternal_surname', 'student_courses.course_id', 'qualifications.*')
            ->where('courses.id', $this->course_id)
            ->get();

        foreach ($this->students as $student) {
            $this->qualifications[$student->studentID]['p1'] = $student->p1;
            $this->qualifications[$student->studentID]['p2'] = $student->p2;
            $this->qualifications[$student->studentID]['p3'] = $student->p3;
            $this->qualifications[$student->studentID]['promedio_final'] = $student->promedio_final;
        }

        return view('livewire.cursos.editar-calificaciones', [
            'course' => $this->course,
            'students' => $this->students,

        ]);
    }
}
