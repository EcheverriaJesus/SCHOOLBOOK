<?php

namespace App\Http\Livewire\Horarios;

use App\Models\Course_schedule;
use App\Models\Schedule;
use Livewire\Component;

class MuestraHorario extends Component
{
    public $horarioId;
    public $horario;

    public function mount($schedule)
    {
        $this->horarioId = $schedule->id;
        $this->horario = Schedule::where('id',$this->horarioId)->first();
    }

    public function render()
    {
        if ($this->horario && $this->horario->group && $this->horario->group->shift == 'matutino') {
            $horarios = [
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
            $horarios = [
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
        } else {
            $horarios = [];
        }

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
        return view('livewire.horarios.muestra-horario',[
            'coursesSchedule' => $coursesSchedule,
            'horarios' => $horarios
        ]);
    }
}
