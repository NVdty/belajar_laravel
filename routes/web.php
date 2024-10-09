<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\ExtracurricularController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->middleware('auth'); 

//login
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticating'])->middleware('guest');
// Route::get('/logins', function () {
//         return view('/');
//         })->middleware(RedirectIfAuthenticated::class);

Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');


Route::middleware(['auth'])->group(function () {

//student
    Route::get('/students', [StudentController::class, 'index']);
    Route::get('/student/{id}', [StudentController::class, 'show']);
    Route::get('/student-add', [StudentController::class, 'create']);
    Route::post('/student', [StudentController::class, 'store']);
    Route::get('/student-edit/{id}', [StudentController::class, 'edit']);
    Route::put('/student/{id}', [StudentController::class, 'update']);
    Route::get('/student-delete/{id}', [StudentController::class, 'delete']);
    Route::delete('/student-destroy/{id}', [StudentController::class, 'destroy']);
    Route::get('/student-deleted', [StudentController::class, 'deletedStudent']);
    Route::get('/student/{id}/restore', [StudentController::class, 'restore']);
    
 //class 
    Route::get('/class', [ClassController::class, 'index']);
    Route::get('/class-detail/{id}', [ClassController::class, 'show']);
    
//extracurricular
    Route::get('/extracurricular', [ExtracurricularController::class, 'index']);
    Route::get('/extracurricular-detail/{id}', [ExtracurricularController::class, 'show']);
   
//teacher
    Route::get('/teacher', [TeacherController::class, 'index']);
    Route::get('/teacher-detail/{id}', [TeacherController::class, 'show']);
});
// untuk mengisi data null/ update secara masal
// Route::get('/student-mass-update', [StudentController::class, 'massUpdate']);