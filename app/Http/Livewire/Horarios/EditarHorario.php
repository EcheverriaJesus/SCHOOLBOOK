<?php

namespace App\Http\Livewire\Horarios;

use App\Models\Group;
use App\Models\Course;
use Livewire\Component;
use App\Models\Schedule;
use App\Models\Course_schedule;
use Illuminate\Validation\Rule;

class EditarHorario extends Component
{
    public $nombre;
    public $grupo;
    public $curso;
    public $día;
    public $hora_inicio;
    public $hora_fin;
    public $horarioId;
    public $horario;
    public $courses;
    public $horarios = [];

    protected $listeners = [
        'eliminarCursoHorario',
    ];


    public function mount($schedule)
    {
        $this->horarioId = $schedule->id;
        $this->horario = Schedule::where('id', $this->horarioId)->first();
        $this->grupo = $this->horario->group->id;
    }

    public function agregarHorario()
    {
        if ($this->horario && $this->horario->group && $this->horario->group->shift == 'matutino') {
            $rules = [
                'curso' => 'required|exists:courses,id',
                'día' => 'required|numeric|between:1,5',
                'hora_inicio' => [
                    'required',
                    'date_format:H:i',
                    Rule::in(['07:00', '07:50', '08:40', '09:30', '10:20', '10:50', '11:40', '12:30', '13:20']) // Aquí puedes agregar las horas permitidas
                ],
                'hora_fin' => [
                    'required',
                    'date_format:H:i',
                    Rule::in(['07:50', '08:40', '09:30', '10:20', '10:50', '11:40', '12:30', '13:20', '14:00']) // Aquí puedes agregar las horas permitidas
                ],

            ];
        } else{
            $rules = [
                'curso' => 'required|exists:courses,id',
                'día' => 'required|numeric|between:1,5',
                'hora_inicio' => [
                    'required',
                    'date_format:H:i',
                    Rule::in(['14:00', '14:50', '15:40', '16:30', '17:20', '17:50', '18:40', '19:30', '20:20']) // Aquí puedes agregar las horas permitidas
                ],
                'hora_fin' => [
                    'required',
                    'date_format:H:i',
                    Rule::in(['14:50', '15:40', '16:30', '17:20', '17:50', '18:40', '19:30', '20:20', '21:00']) // Aquí puedes agregar las horas permitidas
                ],

            ];
        }
        $datos = $this->validate($rules);
        Course_schedule::create([
            'course_id' => $datos['curso'],
            'schedule_id' => $this->horarioId,
            'day' => $datos['día'],
            'start_time' => $datos['hora_inicio'],
            'end_time' => $datos['hora_fin'],
        ]);
        // Restablecer los valores de los campos
        $this->curso = null;
        $this->día = null;
        $this->hora_inicio = null;
        $this->hora_fin = null;
    }

    public function eliminarCursoHorario($course_id, $schedule_id){
        Course_schedule::where('course_id', $course_id)
        ->where('schedule_id', $schedule_id)
        ->delete();
    }


    public function render()
    {
        $groups = Group::all();
        $grupoId = $this->grupo;

        if ($this->horario && $this->horario->group && $this->horario->group->shift == 'matutino') {
            $this->horarios = [
                "7:00 - 7:50",
                "7:50 - 8:40",
                "8:40 - 9:30",
                "9:30 - 10:20",
                "10:20 - 10:50",
                "10:50 - 11:40",
                "11:40 - 12:30",
                "12:30 - 13:20",
                "13:20 - 14:00"
            ];
        } else if ($this->horario && $this->horario->group && $this->horario->group->shift == 'vespertino') {
            $this->horarios = [
                "14:00 - 14:50",
                "14:50 - 15:40",
                "15:40 - 16:30",
                "16:30 - 17:20",
                "17:20 - 17:50",
                "17:50 - 18:40",
                "18:40 - 19:30",
                "19:30 - 20:20",
                "20:20 - 21:00"
            ];
        }
        $this->courses = Course::whereHas('groupCourses', function ($query) use ($grupoId) {
            $query->where('group_id', $grupoId);
        })->get();

        $cursosHorarios = Course_schedule::where('schedule_id', $this->horarioId)
            ->with('course.subject.teacherSubjects.teacher')->get();
        
        $coursesSchedule = [];

        foreach ($cursosHorarios as $cursoHorario) {
            $coursesSchedule[date("G:i", strtotime($cursoHorario->start_time)) . ' - ' . date("G:i", strtotime($cursoHorario->end_time))][$cursoHorario->day] = [
                'course_id' => $cursoHorario->course_id,
                'schedule_id' => $cursoHorario->schedule_id,
                'name' => $cursoHorario->course->subject->subject_name,
                'teacher' => $cursoHorario->course->subject->teacherSubjects->first()->teacher->first_name . ' ' . $cursoHorario->course->subject->teacherSubjects->first()->teacher->father_surname . ' ' . $cursoHorario->course->subject->teacherSubjects->first()->teacher->fathers_last_name,
                'classroom' => $cursoHorario->schedule->group->classroom->classroom_name,
            ];
        }
        //dd($this->horarios);
        return view('livewire.horarios.editar-horario', [
            'groups' => $groups,
            'courses' => $this->courses,
            'horario' => $this->horario,
            'coursesSchedule' => $coursesSchedule,
            'horarios' => $this->horarios
        ]);        
    }
}
