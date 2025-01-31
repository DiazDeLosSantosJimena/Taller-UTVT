<?php

namespace App\Http\Controllers;

use App\Models\Publicaciones;
use App\Models\User;
use Illuminate\Http\Request;

class PublicacionesController extends Controller
{
    public function index()
    {

        $publicacion = Publicaciones::with('user:id,name,app,apm')
        ->select('id', 'titulo', 'descripcion', 'imagen', 'tipo', 'user_id')
        ->get();

        $usuarios = User::select('id', 'name', 'app', 'apm')->where('rol_id', 2)->get();
        return view('publicaciones.index', compact('publicacion', 'usuarios'));
    }
}
