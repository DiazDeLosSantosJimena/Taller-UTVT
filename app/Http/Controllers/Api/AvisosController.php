<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Avisos;
use App\Models\Talleres;
use Illuminate\Http\Request;

class AvisosController extends Controller
{
    function avisosView()
    {
        $avisos = Avisos::select('avisos.id', 'avisos.taller_id', 'talleres.nombre_taller', 'avisos.titulo', 'avisos.descripcion', 'avisos.imagen', 'avisos.created_at', 'users.name', 'users.app', 'users.apm')
            ->join('talleres', 'talleres.id', '=', 'avisos.taller_id')
            ->join('users', 'users.id', '=', 'avisos.user_id')
            ->get();

        return response()->json([
            'success' => true,
            'avisos' => $avisos
        ], 200);
    }

    function crear(Request $request){
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'taller_id' => 'required',
            'user_id' => 'required',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Guardar imagen si existe (solo almacena el nombre |por el momento|)
        if ($request->imagen  !=  '') {
            $foto1 = $request->imagen;
            $dates = date('YmdHis');
            $foto2 = $dates . $foto1;
        } else {
            $foto2 = null;
        }

        // Crear el aviso
        $aviso = Avisos::create([
            'user_id' => $request->user_id, // Debe quedar el usuario que esta logueado
            'taller_id' => $request->taller_id,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $foto2,
        ]);

        return response()->json([
            'message' => 'Aviso creado correctamente!',
            'aviso' => $aviso
        ], 200);
    }
}
