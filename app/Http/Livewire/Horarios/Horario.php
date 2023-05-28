<?php

namespace App\Http\Livewire\Horarios;

use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Teacher_subject;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class Horario extends Component
{
    public $userRole;
    public $scheduleData = [];

    public function mount()
    {
        $user = Auth::user();
        if ($user->hasRole('alumno')) {
            $this->userRole = 'alumno';
        } elseif ($user->hasRole('docente')) {
            $this->userRole = 'docente';
        }

        if ($this->userRole === 'alumno') {
            $email = Auth::user()->email;
            $student = Student::where('email', $email)->first();
            if ($student) {
                $studentID = $student->studentID;

                $courses = Course::whereHas('studentCourses', function ($query) use ($studentID) {
                    $query->where('student_id', $studentID);
                })->with('courseSchedules')->get();

                foreach ($courses as $course) {
                    $schedules = $course->courseSchedules->sortBy('start_time');
                    foreach ($schedules as $schedule) {
                        $day = $this->getDayName($schedule->day);
                        $this->scheduleData[$day][] = [
                            'course_id' => $schedule->course_id,
                            'schedule_id' => $schedule->schedule_id,
                            'name' => $schedule->course->subject->subject_name,
                            'teacher' => $schedule->course->subject->teacherSubjects->first()->teacher->first_name . ' ' . $schedule->course->subject->teacherSubjects->first()->teacher->father_surname . ' ' . $schedule->course->subject->teacherSubjects->first()->teacher->fathers_last_name,
                            'classroom' => $schedule->schedule->group->classroom->classroom_name,
                            'start_time' => $schedule->start_time,
                            'end_time' => $schedule->end_time,
                        ];
                    }
                }
                
                // Ordenar los días de la semana en el arreglo $scheduleData
                $this->scheduleData = Arr::sort($this->scheduleData, function ($value, $key) {
                    $daysOrder = [
                        'Lunes' => 1,
                        'Martes' => 2,
                        'Miércoles' => 3,
                        'Jueves' => 4,
                        'Viernes' => 5,
                        'Sábado' => 6,
                        'Domingo' => 7,
                    ];
                    return $daysOrder[$key];
                });
            }
        } else if ($this->userRole === 'docente') {
            $email = Auth::user()->email;
            $teacher = Teacher::where('email', $email)->first();
            if ($teacher) {
                $teacherID = $teacher->id;
                $teacher = Teacher::with('teacherSubjects.subject.course')->find($teacherID);
                $teacherSubjects = $teacher->teacherSubjects;
                
                $courses = [];

                foreach ($teacherSubjects as $teacherSubject) {
                    $subject = $teacherSubject->subject;
                    if ($subject) {
                        $subjectCourses = $subject->course;
                        if ($subjectCourses) {
                            $courses[] = $subjectCourses;
                        }
                    }
                }

                foreach ($courses as $course) {
                    $schedules = $course->courseSchedules->sortBy('start_time');
                    foreach ($schedules as $schedule) {
                        $day = $this->getDayName($schedule->day);
                        $this->scheduleData[$day][] = [
                            'course_id' => $schedule->course_id,
                            'schedule_id' => $schedule->schedule_id,
                            'name' => $schedule->course->subject->subject_name,
                            'classroom' => $schedule->schedule->group->classroom->classroom_name,
                            'start_time' => $schedule->start_time,
                            'end_time' => $schedule->end_time,
                            'group' => $schedule->schedule->group->grade.'° '.$schedule->schedule->group->name
                        ];
                    }
                }
                
            }
        }
    }

    private function getDayName($day)
    {
        $dayNames = [
            1 => 'Lunes',
            2 => 'Martes',
            3 => 'Miércoles',
            4 => 'Jueves',
            5 => 'Viernes',
            6 => 'Sábado',
            7 => 'Domingo',
        ];

        return $dayNames[$day] ?? 'Desconocido';
    }

    public function render()
    {
        return view('livewire.horarios.horario', [
            'userRole' => $this->userRole,
            'scheduleData' => $this->scheduleData,
        ]);
    }
}
