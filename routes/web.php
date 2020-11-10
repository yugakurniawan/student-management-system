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

Route::group(['middleware' => ['web', 'guest']], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/postlogin', [AuthController::class, 'postlogin']);
});

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::group(['middleware' => ['can:admin-student']], function () {

        Route::get('/logout', [AuthController::class, 'logout']);
        Route::get('/', [DashboardController::class, 'index']);

        Route::get('/students/{student}/profile', [StudentsController::class, 'profile']);
        Route::post('/students/{student}/nilai', [StudentsController::class, 'tambahnilai']);
        Route::patch('/students/{student}/nilai}', [StudentsController::class, 'editnilai']);
        Route::resource('students', StudentsController::class);


    });
});
