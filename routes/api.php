<?php

use App\Http\Controllers\Api\AlumnosController;
use App\Http\Controllers\Api\AvisosController;
use App\Http\Controllers\Api\DocenteController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//  Login
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout']);

//  Alumnos
Route::get('/inicio', [AlumnosController::class, 'index']);
Route::get('/talleres/{user}', [AlumnosController::class, 'talleresView']);
Route::post('/inscripcion-talleres', [AlumnosController::class, 'incripcionTaller']);

//  Docente
Route::get('/talleres-docente/{user}', [DocenteController::class, 'talleres']);
Route::get('/alumnos/{taller}', [DocenteController::class, 'alumnos_taller']);
Route::get('/asistencia-alumnos/{taller}', [DocenteController::class, 'asistenciaView']);
Route::post('/asistencia/{taller}', [DocenteController::class, 'asistencia']);

//  Avisos
Route::get('/avisos', [AvisosController::class, 'avisosView']);
Route::post('/crear-aviso/{taller}', [AvisosController::class, 'crear']);