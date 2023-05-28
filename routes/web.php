<?php

use App\Models\Group;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ContributionController;
use App\Http\Controllers\School_cycleController;
/* use App\Http\Controllers\Auth\RegisteredUserController;
 */
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
    Route::get('teachers/{teacherId}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
    Route::get('teachers/{teacherId}', [TeacherController::class, 'show'])->name('teachers.show');
    Route::get('teachers', [TeacherController::class, 'index'])->name('teachers.index');
});




Route::resource('user', UserController::class)->middleware('auth:sanctum');

/* La ruta del index.notices no se usa, en su lugar se usa la de dashboard para el modulo inicio */
Route::resource('notices', NoticeController::class)->middleware('auth:sanctum');

Route::resource('classroom', ClassroomController::class)
    ->middleware('auth:sanctum')
    ->names([
        'index' => 'classroom.index',
        'create' => 'classroom.create',
        'show' => 'classroom.show',
        'edit' => 'classroom.edit',
    ]);

Route::resource('Contribution', ContributionController::class)
    ->middleware('auth:sanctum')
    ->names([
        'index' => 'contributions.index',
        'create' => 'contributions.create',
        'edit' => 'contributions.edit'
    ]);

Route::get('/groups/main', [CourseController::class, 'groups'])->middleware('auth:sanctum')->name('courses.groups');
Route::get('/groups/{group}/qualifications', [CourseController::class, 'qualifications'])->middleware('auth:sanctum')->name('courses.qualifications');
Route::resource('groups', GroupController::class)
    ->middleware('auth:sanctum')
    ->names([
        'index' => 'groups.index',
        'create' => 'groups.create',
        'show' => 'groups.show',
        'edit' => 'groups.edit',
    ]);

Route::get('/subjects/assign-teacher', [SubjectController::class, 'assignTeacher'])->middleware('auth:sanctum')->name('subjects.assign-teacher');

Route::resource('subjects', SubjectController::class)
    ->middleware('auth:sanctum')
    ->names([
        'index' => 'subjects.index',
        'create' => 'subjects.create',
        'show' => 'subjects.show',
        'edit' => 'subjects.edit',
    ]);



Route::resource('courses', CourseController::class)
    ->middleware('auth:sanctum')
    ->names([
        'index' => 'courses.index',
        'create' => 'courses.create',
        'show' => 'courses.show',
        'edit' => 'courses.edit',
    ]);

// Ruta para mostrar los horarios del docente
Route::get('schedule/teacher', [ScheduleController::class, 'teacherSchedule'])->name('schedule.teacher');
// Ruta para mostrar los horarios del alumno
Route::get('schedule/student', [ScheduleController::class, 'studentSchedule'])->name('schedule.student');
Route::resource('schedule', ScheduleController::class)
    ->middleware('auth:sanctum')
    ->names([
        'index' => 'schedule.index',
        'create' => 'schedule.create',
        'show' => 'schedule.show',
        'edit' => 'schedule.edit',
    ]);

Route::resource('schoolCycles', School_cycleController::class)
    ->middleware('auth:sanctum')
    ->names([
        'index' => 'schoolCycles.index',
    ]);

Route::get('/students', [StudentController::class, 'index'])->middleware('auth:sanctum')->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->middleware('auth:sanctum')->name('students.create');
Route::get('/students/{student}', [StudentController::class, 'show'])->middleware('auth:sanctum')->name('students.show');
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->middleware('auth:sanctum')->name('students.edit');

Route::resource('tutor', App\Http\Controllers\TutorController::class);

Route::resource('document', App\Http\Controllers\DocumentController::class);

Route::resource('address', App\Http\Controllers\AddressController::class);

Route::resource('qualification', App\Http\Controllers\QualificationController::class);

Route::resource('class', App\Http\Controllers\ClassController::class);

Route::resource('schedule', App\Http\Controllers\ScheduleController::class);

Route::resource('subject', App\Http\Controllers\SubjectController::class);

Route::get('/historial/mostrar', function () {
    return view('livewire.historial.mostrar-historial');
})->name('historial.mostrar');

Fortify::registerView(function () {
    abort(404);
});
