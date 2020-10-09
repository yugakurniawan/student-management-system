<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\MeetingsController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KehadiranController;
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

Route::get('/', function () {
return view('home');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout']);


Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/students/{student}/profile', [StudentsController::class, 'profile']);
    Route::resource('students', StudentsController::class);

    Route::get('/nilai/{score}', [ScoreController::class, 'show']);
    Route::post('/nilai/{id}', [ScoreController::class, 'store']);
    Route::delete('/nilai/{score}', [ScoreController::class, 'destroy']);
    Route::patch('/nilai/{score}', [ScoreController::class, 'update']);

    Route::get('/project/{project}', [ProjectsController::class, 'show']);
    Route::post('/project/{id}', [ProjectsController::class, 'store']);
    Route::delete('/project/{project}', [ProjectsController::class, 'destroy']);
    Route::patch('/project/{project}', [ProjectsController::class, 'update']);

    Route::resource('meetings', MeetingsController::class);
    Route::resource('jadwal', JadwalController::class)->except('create');
    Route::get('/jadwal/create/{project}', [JadwalController::class, 'create']);
    Route::patch('/kehadiran/{id}', [KehadiranController::class, 'update'])->name('kehadiran.update');

});
