<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\PresenceController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;

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

Route::group(['middleware' => ['web', 'guest']], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/postlogin', [AuthController::class, 'postlogin']);
});

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::group(['middleware' => ['can:admin-student']], function () {

        Route::get('/logout', [AuthController::class, 'logout']);
        Route::get('/', [DashboardController::class, 'index']);

        Route::get('/students/{student}/profile', [StudentsController::class, 'profile']);
        Route::get('/students/{student}/delete', [StudentsController::class, 'destroy']);
        Route::get('/students/exportexcel', [StudentsController::class, 'exportExcel']);
        Route::get('/students/exportpdf', [StudentsController::class, 'exportPDF']);
        Route::get('/students/cetak2/{student}', [StudentsController::class, 'cetak2']);
        Route::resource('students', StudentsController::class);

        Route::get('/extracurriculars/{extracurricular}', [ExtracurricularController::class, 'show']);
        Route::post('/extracurriculars/{id}', [ExtracurricularController::class, 'store']);
        Route::delete('/extracurriculars/{extracurricular}', [ExtracurricularController::class, 'destroy']);
        Route::patch('/extracurriculars/{extracurricular}', [ExtracurricularController::class, 'update']);

        Route::post('/students/{student}/nilai', [StudentsController::class, 'tambahnilai']);
        Route::delete('/students/{student}/{subject}/delete-nilai', [StudentsController::class, 'destroynilai']);

        Route::resource('attendances', AttendanceController::class);
        Route::resource('schedules', ScheduleController::class)->except('create');
        Route::get('/schedules/create/{project}', [ScheduleController::class, 'create']);
        Route::patch('/presences/{id}', [PresenceController::class, 'update'])->name('presence.update');

        Route::get('/teachers/{teacher}/profile', [TeacherController::class, 'profile']);


    });
});
