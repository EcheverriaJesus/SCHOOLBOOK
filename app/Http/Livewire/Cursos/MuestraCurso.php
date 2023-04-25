<?php

namespace App\Http\Livewire\Cursos;

use App\Models\Course;
use App\Models\Student;
use Livewire\Component;
use App\Models\Student_course;
use Illuminate\Support\Facades\DB;

class MuestraCurso extends Component
{
    public $buscarAlumno;
    public $course;
    public $courseId;
    public $student;

    protected $listeners = [
        'deleteStudent',
    ];

    public function buscarEstudiante()
    {
        $validatedData = $this->validate([
            'buscarAlumno' => ['required', 'numeric', 'digits:8', 'exists:students,studentID'],
        ], [
            'buscarAlumno.required' => 'Ingresa una matrícula de un alumno',
            'buscarAlumno.numeric' => 'La matricula debe ser numérico.',
            'buscarAlumno.digits' => 'La matricula debe tener :digits dígitos.',
            'buscarAlumno.exists' => 'Matrícula no encontrada.',
        ]);

        $this->student = Student::find($this->buscarAlumno);
    }

    public function inscribirCurso()
    {
        if (empty($this->student->studentID)) {
            $this->emit('alertWarning', ['message' => 'No se puede inscribir a un curso sin seleccionar un estudiante'],'Alumno no seleccionado');
        } else {
            $studentID = $this->student->studentID;
            $alreadyEnrolled = Student_course::where('student_id', $studentID)
                ->where('course_id', $this->courseId)
                ->exists();

            if ($alreadyEnrolled) {
                $this->emit('alertWarning', ['message' => 'El alumno ya esta inscrito es este curso'], 'El  Alumno ya esta inscrito');
            }else{
                Student_course::create([
                    'student_id' => $studentID,
                    'course_id' => $this->courseId
                ]);
                $this->emit('alertSuccess', ['message' => 'Alumno inscrito correctamente'],'Alumno Inscrito');
            }
            $this->reset(['student']);
        }
    }

    public function deleteStudent($studentId)
    {   
        $student = Student_course::where('student_id', $studentId)
        ->where('course_id', $this->courseId)
        ->first();
        $student->delete();
    }

    public function render()
    {
        $this->courseId = $this->course->id;
        $course = Course::where('id', $this->courseId);
        $students = Student_course::where('course_id', $this->courseId)->get();
        //dd($students);
        return view('livewire.cursos.muestra-curso', [
            'course' => $course,
            'student' => $this->student,
            'students' => $students
        ]);
    }
}
