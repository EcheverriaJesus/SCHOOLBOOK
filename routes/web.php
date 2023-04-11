<?php

use App\Http\Controllers\TeacherController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\School_cycleController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

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

Route::resource('teachers', TeacherController::class)
    ->middleware('auth:sanctum')
    ->names([
        'index' => 'teachers.index',
        'create' => 'teachers.create',
        'show' => 'teachers.show',
        'edit' => 'teachers.edit',
    ]);

Route::resource('subjects', SubjectController::class)
    ->middleware('auth:sanctum')
    ->names([
        'index' => 'subjects.index',
        'create' => 'subjects.create',
        'show' => 'subjects.show',
        'edit' => 'subjects.edit',
    ]);

Route::resource('schoolCycles', School_cycleController::class)
    ->middleware('auth:sanctum')
    ->names([
        'index' => 'schoolCycles.index',
    ]);

/* La ruta del index.notices no se usa, en su lugar se usa la de dashboard para el modulo inicio */

Route::resource('notices', NoticeController::class, ['except' => ['index']])
    ->middleware('auth:sanctum')
    ->names([
        'create' => 'notices.create',
        'show' => 'notices.show',
        'edit' => 'notices.edit',
    ]);

Route::resource('contribution', App\Http\Controllers\ContributionController::class);

Route::resource('tutor', App\Http\Controllers\TutorController::class);

Route::resource('document', App\Http\Controllers\DocumentController::class);

Route::resource('student', App\Http\Controllers\StudentController::class);

Route::resource('school_cycle', App\Http\Controllers\School_cycleController::class);

Route::resource('address', App\Http\Controllers\AddressController::class);

Route::resource('classroom', App\Http\Controllers\ClassroomController::class);

Route::resource('qualification', App\Http\Controllers\QualificationController::class);

Route::resource('group', App\Http\Controllers\GroupController::class);

Route::resource('class', App\Http\Controllers\ClassController::class);

Route::resource('schedule', App\Http\Controllers\ScheduleController::class);

Route::resource('subject', App\Http\Controllers\SubjectController::class);
