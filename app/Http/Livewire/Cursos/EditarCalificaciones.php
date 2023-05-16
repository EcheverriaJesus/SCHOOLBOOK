<?php

namespace App\Http\Livewire\Cursos;

use Carbon\Carbon;
use App\Models\Course;
use App\Models\Student;
use Livewire\Component;
use App\Models\Qualification;
use App\Models\Student_course;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class EditarCalificaciones extends Component
{
    public $course_id;
    public $course;
    public $qualifications;
    public $students;
    public $grades_sent;
    public $usuario;

    protected $listeners = [
        'sentToSchool',
    ];

    public function mount(Course $group)
    {
        $user = auth()->user();
        if ($user) {
            $roles = $user->roles;

            foreach ($roles as $role) {
                $this->usuario = $role->name;
            }
        }
        $this->course_id = $group->id;
        $this->course = Course::where('id', $this->course_id)
            ->with('subject.teacherSubjects.teacher')
            ->first();
    }

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

    public function completeQualifications()
    {
        // Verificar que todas las calificaciones estén capturadas
        foreach ($this->qualifications as $studentId => $data) {
            if (empty($data['p1']) || empty($data['p2']) || empty($data['p3']) || empty($data['calificacion_final']) || empty($data['tipo_evaluacion'])) {
                $this->emit('alertWarning', ['message' => 'Captura todas las calificaciones parciales y finales con su correspondiente tipo de evaluación'], '¡Completa todos los campos!');
                return;
            }
        }
        $this->emit('confirmacionEnvio');
    }

    public function sentToSchool()
    {
        // Insertar valor en true en el campo grades_sent en la tabla de cursos
        $course = Course::find($this->course_id);
        $course->grades_sent = true;
        $course->save();
    }



    public function render()
    {
        $response = Http::get('http://worldtimeapi.org/api/timezone/America/Mexico_City');
        $data = $response->json();
        $currentDateTime = $data['datetime'];
        $fechaHoraActual = Carbon::createFromFormat('Y-m-d\TH:i:s.uP', $currentDateTime)->format('Y-m-d H:i:s');

        $this->grades_sent = DB::table('courses')
            ->where('id', $this->course_id) // Reemplaza $courseId por el ID del curso que deseas verificar
            ->value('grades_sent');

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
            $this->qualifications[$student->studentID]['promedio'] = $student->promedio;
            $this->qualifications[$student->studentID]['calificacion_final'] = $student->calificacion_final;
            $this->qualifications[$student->studentID]['tipo_evaluacion'] = $student->tipo_evaluacion;
        }

        return view('livewire.cursos.editar-calificaciones', [
            'course' => $this->course,
            'students' => $this->students,
            'grades_sent' => $this->grades_sent,
            'usuario' => $this->usuario,
            'fechaHoraActual' => $fechaHoraActual,
        ]);
    }
}
