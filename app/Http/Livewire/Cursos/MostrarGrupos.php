<?php

namespace App\Http\Livewire\Cursos;

use App\Models\Course;
use App\Models\Student;
use App\Models\Student_course;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Teacher_subject;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class MostrarGrupos extends Component
{
    public $courses;
    public function render()
    {
        $user = Auth::user();
        $rol = $user->roles->pluck('name')->first();
        if ($rol == 'docente') {
            $teacherEmail = $user->email;
            $teacher = Teacher::where('email', $teacherEmail)->first();
            $teacherID = $teacher->teacherID;
            $subjectsID = Teacher_subject::where('teacher_id', $teacherID)->pluck('subject_id');
            $subjects = Subject::whereIn('subjectID', $subjectsID)->pluck('id');
            $this->courses = Course::whereIn('subject_id', $subjects)->get();
        } else if ($rol == 'alumno') {
            $studentEmail = $user->email;
            $student = Student::where('email', $studentEmail)->first();
            $studentID = $student->studentID;

            // Obtener los ID de los cursos del alumno
            $coursesID = Student_course::where('student_id', $studentID)->pluck('course_id');

            $this->courses = Course::whereIn('id', $coursesID)
                ->with(['subject.teacherSubjects.teacher' => function ($query) {
                    $query->select('teacherID', 'first_name', 'father_surname', 'fathers_last_name');
                }])
                ->with(['qualifications' => function ($query) use ($studentID) {
                    $query->where('student_id', $studentID);
                }])
                ->get();

            //dd($this->courses);
            
        }
        return view('livewire.cursos.mostrar-grupos', [
            'courses' => $this->courses,
        ]);
    }
}
