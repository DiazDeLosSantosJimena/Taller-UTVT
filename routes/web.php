<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PublicacionesController;
use App\Http\Controllers\TalleresController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UsuariosController;
use App\Models\Talleres;
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
    return view('welcome');
});

    //  Login
Route::get('/login',[LoginController::class, 'show']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/home', [UsersController::class, 'index']);
Route::resource('/users', UsuariosController::class);
Route::resource('/taller', TalleresController::class);
Route::resource('/post', PublicacionesController::class);