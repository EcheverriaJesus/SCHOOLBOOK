<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
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

Route::get('/teachers', [TeacherController::class,'index']) -> middleware('auth:sanctum')
->name('teachers.index');
Route::get('/teachers/create', [TeacherController::class,'create']) -> middleware('auth:sanctum') ->name('teachers.create');
Route::get('/teachers/{teacher}',[TeacherController::class,'show'])-> middleware('auth:sanctum')->name('teachers.show');
Route::get('/teachers/{teacher}/edit',[TeacherController::class,'edit'])-> middleware('auth:sanctum')->name('teachers.edit');

Route::get('/students', [StudentController::class,'index']) -> middleware('auth:sanctum')->name('students.index');
Route::get('/students/create', [StudentController::class,'create']) -> middleware('auth:sanctum') ->name('students.create');
Route::get('/students/{student}',[StudentController::class,'show'])-> middleware('auth:sanctum')->name('students.show');
Route::get('/students/{student}/edit',[TeacherController::class,'edit'])-> middleware('auth:sanctum')->name('students.edit');

Route::resource('contribution', App\Http\Controllers\ContributionController::class);

Route::resource('tutor', App\Http\Controllers\TutorController::class);

Route::resource('document', App\Http\Controllers\DocumentController::class);

Route::resource('student', App\Http\Controllers\StudentController::class);

Route::resource('school_cycle', App\Http\Controllers\School_cycleController::class);

Route::resource('address', App\Http\Controllers\AddressController::class);

Route::resource('classroom', App\Http\Controllers\ClassroomController::class);

Route::resource('qualification', App\Http\Controllers\QualificationController::class);

Route::resource('notice', App\Http\Controllers\NoticeController::class);

Route::resource('teacher', App\Http\Controllers\TeacherController::class);

Route::resource('group', App\Http\Controllers\GroupController::class);

Route::resource('class', App\Http\Controllers\ClassController::class);

Route::resource('schedule', App\Http\Controllers\ScheduleController::class);

Route::resource('subject', App\Http\Controllers\SubjectController::class);


Route::resource('contribution', App\Http\Controllers\ContributionController::class);

Route::resource('tutor', App\Http\Controllers\TutorController::class);

Route::resource('document', App\Http\Controllers\DocumentController::class);

Route::resource('student', App\Http\Controllers\StudentController::class);

Route::resource('school_cycle', App\Http\Controllers\School_cycleController::class);

Route::resource('address', App\Http\Controllers\AddressController::class);

Route::resource('classroom', App\Http\Controllers\ClassroomController::class);

Route::resource('qualification', App\Http\Controllers\QualificationController::class);

Route::resource('notice', App\Http\Controllers\NoticeController::class);

Route::resource('teacher', App\Http\Controllers\TeacherController::class);

Route::resource('group', App\Http\Controllers\GroupController::class);

Route::resource('class', App\Http\Controllers\ClassController::class);

Route::resource('schedule', App\Http\Controllers\ScheduleController::class);

Route::resource('subject', App\Http\Controllers\SubjectController::class);
