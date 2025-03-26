<?php

use App\Http\Controllers\AlumnoTallerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AvisosController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\EventosPublicacionesController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\TalleresController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DocentesTallerController;
use App\Http\Controllers\GraficosController;
use App\Models\DocenteTaller;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    if (Auth::check()) {
        switch (Auth::user()->rol_id) {
            case 1:
                return redirect('admin');
                break;
            case 2:
                return redirect('/talleres-docente');
                break;
            case 3:
                return redirect('/inicio');
                break;
            default:
                return redirect('/login');
                break;
        }
    }
    return redirect('/inicio');
});

Route::get('/graficos', [GraficosController::class, 'index'])->name('graficos');

    //  Login
Route::get('/login', [LoginController::class, 'show']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

//  Docentes
Route::resource('docente', DocenteController::class);
Route::name('docente.delete')->delete('deleteDocente/{id}', [DocenteController::class, 'delete']);
Route::get('/talleres-docente',[DocenteController::class, 'index']);
Route::name('alumnos-taller')->get('alumnos-taller/{id}', [DocenteController::class, 'alumnos_taller']);
Route::name('asistencia')->get('asistencia/{id}', [DocenteController::class, 'asistenciaView']);
Route::post('asistencia/register', [DocenteController::class, 'asistenciaRegister'])->name('asistenciaRegister');
Route::post('constancia-alumno', [DocenteController::class, 'constancia'])->name('constancia-alumno');
Route::post('comentario', [DocenteController::class, 'crear_comentario'])->name('comentario');

//  Alumnos
Route::get('/talleres-alumno',[UsersController::class, 'viewAlumno']);
Route::get('/constancia/{taller}', [PDFController::class, 'generarPDF'])->name('constancia');

Route::get('/inicio', [UsersController::class, 'index']);
Route::name('admin')->get('/admin', [Controller::class, 'index']);
Route::name('agregar_periodo')->post('nuevoPeriodo', [Controller::class, 'newPeriodo']);

Route::resource('/users', UsersController::class);
Route::name('users.show')->get('/users/show', [UsersController::class, 'show']);
Route::post('/import', [UsersController::class, 'import'])->name('import');
Route::post('storeDocentes', [UsersController::class, 'storeDocentes'])->name('storeDocentes');

Route::resource('/taller', TalleresController::class);
Route::resource('/tallerdocen',DocentesTallerController::class);
Route::name('deletetalledo')->delete('deletetalledo/{id}', [DocentesTallerController::class, 'destroy']);
Route::name('desactivarTaller')->put('desactivarTaller/{id}', [TalleresController::class, 'desactivarTaller']);

// Publicaciones
Route::resource('/publicaciones', EventosPublicacionesController::class);
Route::get('/publicaciones', [EventosPublicacionesController::class, 'index'])->name('publicaciones.index');
Route::post('/publicaciones', [EventosPublicacionesController::class, 'store'])->name('publicaciones.store');

//AlumnosTalleres
Route::post('/inscribirse-taller', [AlumnoTallerController::class, 'store'])->name('store.taller');

//avisos 
Route::resource('/avisos', AvisosController::class);
Route::get('/avisos', [AvisosController::class, 'index'])->name('avisos.index');
Route::post('/avisos/{id}', [AvisosController::class, 'store'])->name('avisos.store');

//eventos
Route::post('/eventos', [EventosController::class, 'store'])->name('eventos.store');
    
