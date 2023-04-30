<?php

namespace App\Http\Livewire\Materias;

use App\Models\Subject;
use App\Models\Teacher;
use Livewire\Component;
use App\Models\Teacher_subject;
use Illuminate\Support\Facades\DB;

class AsignarDocente extends Component
{
    public $nombreMateria;
    public $grado;
    public $nombreProfesor;
    public $curp;
    public $correo;
    public $telefono;
    public $buscarMateria;
    public $buscarProfesor;
    public $subject;
    public $teacher;

    protected $listeners = [
        'deleteAssign',
    ];

    public function buscarMateria()
    {
        $validatedData = $this->validate([
            'buscarMateria' => ['required','alpha_num','size:6', 'exists:subjects,subjectID'],
        ], [
            'buscarMateria.required' => 'Ingresa la clave de una materia',
            'buscarMateria.alpha_num' => 'La clave de la materia es alfanumérica.',
            'buscarMateria.size' => 'La clave de la materia debe tener :size dígitos.',
            'buscarMateria.exists' => 'Clave de materia no encontrada.',
        ]);

        $this->subject = Subject::where('subjectID',$this->buscarMateria)->first();
    }

    public function buscarProfesor()
    {
        $validatedData = $this->validate([
            'buscarProfesor' => ['required','alpha_num','size:7', 'exists:teachers,teacherID'],
        ], [
            'buscarProfesor.required' => 'Ingresa la clave de un Docente',
            'buscarProfesor.alpha_num' => 'La clave del Docente es alfanumérica.',
            'buscarProfesor.size' => 'La clave del docente debe tener :size dígitos.',
            'buscarProfesor.exists' => 'Clave de Docente no encontrada.',
        ]);

        $this->teacher = Teacher::where('teacherID',$this->buscarProfesor)->first();
    }

    public function asignarProfesor()
    {
        if (empty($this->subject->subjectID) || empty($this->teacher->teacherID)) {
            $this->emit('alertWarning', ['message' => 'No se puede asignar la materia al docente'], 'Busca una Materia y un Docente');
        } else {
            $teacherID = $this->teacher->teacherID;
            $subjectID = $this->subject->subjectID;
            $alreadyEnrolled = Teacher_subject::where('subject_id', $subjectID)->exists();

            if ($alreadyEnrolled) {
                $this->emit('alertWarning', ['message' => 'La materia ya tiene un docente asignado'], 'La Materia ya esta asignada  ');
            }else{
                Teacher_subject::create([
                    'subject_id' => $subjectID,
                    'teacher_id' => $teacherID
                ]);
                $this->emit('alertSuccess', ['message' => 'La materia ha sido asignada correctamente al docente'],'Materia Asignada');
            }
            $this->reset(['subject']);
            $this->reset(['teacher']);
        }
    }

    public function deleteAssign($teacherId, $subjectId)
    {   
        $assign = Teacher_subject::where('subject_id',$subjectId)
        ->where('teacher_id', $teacherId )
        ->first();
        $assign->delete();
    }

    public function render()
    {
        $subjects = DB::table('subjects')
                ->leftJoin('teacher_subjects', 'subjects.subjectID', '=', 'teacher_subjects.subject_id')
                ->leftJoin('teachers', 'teacher_subjects.teacher_id', '=', 'teachers.teacherID')
                ->select('subjects.*','teachers.teacherID','teachers.first_name as first_name','teachers.father_surname','teachers.fathers_last_name')
                ->get();

        return view('livewire.materias.asignar-docente',[
            'subjects' => $subjects,
            'subject' => $this->subject,
            'teacher' => $this->teacher,

        ]);
    }
}
