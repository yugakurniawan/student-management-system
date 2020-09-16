<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\ProjectsController;
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

    Route::get('/students', [StudentsController::class, 'index']);
    Route::get('/students/create', [StudentsController::class, 'create']);
    Route::get('/students/{student}/profile', [StudentsController::class, 'profile']);
    Route::get('/students/{student}', [StudentsController::class, 'show']);
    Route::post('/students', [StudentsController::class, 'store']);
    Route::delete('/students/{student}', [StudentsController::class, 'destroy']);
    Route::get('/students/{student}/edit', [StudentsController::class, 'edit']);
    Route::patch('/students/{student}', [StudentsController::class, 'update']);
    Route::resource('students', StudentsController::class);

    Route::get('/nilai/{score}', [ScoreController::class, 'show']);
    Route::post('/nilai/{id}', [ScoreController::class, 'store']);
    Route::delete('/nilai/{score}', [ScoreController::class, 'destroy']);
    Route::patch('/nilai/{score}', [ScoreController::class, 'update']);

    Route::get('/project/{project}', [ProjectsController::class, 'show']);
    Route::post('/project/{id}', [ProjectsController::class, 'store']);
    Route::delete('/project/{project}', [ProjectsController::class, 'destroy']);
    Route::patch('/project/{project}', [ProjectsController::class, 'update']);
});
