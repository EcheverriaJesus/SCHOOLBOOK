<?php

use App\Http\Controllers\ClaseController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ContributionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\School_cycleController;
use App\Http\Controllers\SubjectController;
use App\Models\Group;
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
Route::resource('teachers', TeacherController::class)->middleware('auth:sanctum');

/* La ruta del index.notices no se usa, en su lugar se usa la de dashboard para el modulo inicio */
Route::resource('notices', NoticeController::class)->middleware('auth:sanctum');

Route::resource('classroom', ClassroomController::class)->middleware('auth:sanctum');

 Route::resource('subjects', SubjectController::class)
    ->middleware('auth:sanctum')
    ->names([
        'index' => 'subjects.index',
        'create' => 'subjects.create',
        'show' => 'subjects.show',
        'edit' => 'subjects.edit',
    ]);

Route::resource('contributions', ContributionController::class)->middleware('auth:sanctum');

/* Route::resource('Contribution', ContributionController::class)
    ->middleware('auth:sanctum')
    ->names([
        'index' => 'contributions.index',
        'create' => 'contributions.create',
        'edit' => 'contributions.edit'
    ]); */

Route::resource('groups', GroupController::class)->middleware('auth:sanctum');

/* Route::resource('groups', GroupController::class)
->middleware('auth:sanctum')
->names([
    'index' => 'groups.index',
    'create' => 'groups.create',
    'show' => 'groups.show',
    'edit' => 'groups.edit',
]); */

Route::resource('schoolCycles', School_cycleController::class)->middleware('auth:sanctum');

/* Route::resource('schoolCycles', School_cycleController::class)
    ->middleware('auth:sanctum')
    ->names([
        'index' => 'schoolCycles.index',
    ]);
 */

Route::get('/students', [StudentController::class,'index']) -> middleware('auth:sanctum')->name('students.index');
Route::get('/students/create', [StudentController::class,'create']) -> middleware('auth:sanctum') ->name('students.create');
Route::get('/students/{student}',[StudentController::class,'show'])-> middleware('auth:sanctum')->name('students.show');
Route::get('/students/{student}/edit',[TeacherController::class,'edit'])-> middleware('auth:sanctum')->name('students.edit');

Route::resource('tutor', App\Http\Controllers\TutorController::class);

Route::resource('document', App\Http\Controllers\DocumentController::class);

Route::resource('address', App\Http\Controllers\AddressController::class);

Route::resource('qualification', App\Http\Controllers\QualificationController::class);

Route::resource('class', App\Http\Controllers\ClassController::class);

Route::resource('schedule', App\Http\Controllers\ScheduleController::class);