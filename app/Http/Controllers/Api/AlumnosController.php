<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AlumnoTaller;
use App\Models\Avisos;
use App\Models\Eventos;
use App\Models\Talleres;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AlumnosController extends Controller
{
    function index()
    {
        //  Consulta sobre talleres (en caso de no tener un docente asignado aparecerá como nulo)
        $talleres = Talleres::select('talleres.id', 'talleres.nombre_taller', 'talleres.descripcion', 'talleres.horarios_img', 'talleres.imagen', 'talleres.tipo', 'talleres.estatus', 'users.name as docente_name', 'users.app as docente_app', 'users.apm as docente_apm')
            ->leftJoin('docente_tallers', 'docente_tallers.taller_id', 'talleres.id')
            ->leftJoin('users', 'users.id', 'docente_tallers.user_id')
            ->where('talleres.estatus', '=', 'activo')
            ->get();

        $eventos = Eventos::all();

        return response()->json([
            'success' => true,
            'talleres' => $talleres,
            'eventos' => $eventos
        ], 200);
    }

    function talleresView(User $user): JsonResponse
    {
        $talleres = Talleres::select('talleres.id', 'nombre_taller', 'tipo', 'alumno_tallers.constancia')
            ->join('alumno_tallers', 'alumno_tallers.taller_id', 'talleres.id')
            ->where('alumno_tallers.user_id', '=', $user->id) // Id del usuario que está logueado
            ->where('alumno_tallers.estatus', '=', 'activo')
            ->get();

        $periodos = \DB::table('alumno_tallers as at')
            ->join('talleres as t', 'at.taller_id', '=', 't.id')
            ->leftJoin('asistencia as a', 'at.id', '=', 'a.alumtalle_id')
            ->leftJoin('periodos as p', 'a.periodo_id', '=', 'p.id')
            ->select(
                'at.id as alumno_taller_id',
                'at.user_id',
                't.nombre_taller',
                'at.constancia',
                'at.estatus',
                'p.id as periodo_id',
                'p.fecha_inicio',
                'p.fecha_fin'
            )
            ->where('at.user_id', $user->id)
            ->groupBy(
                'at.id',
                't.nombre_taller',
                'at.user_id',
                'at.taller_id',
                'at.constancia',
                'at.estatus',
                'p.id',
                'p.fecha_inicio',
                'p.fecha_fin'
            )
            ->get();

        return response()->json([
            'talleres' => $talleres,
            'periodos' => $periodos
        ], 200);
    }

    function incripcionTaller(Request $request) : JsonResponse {
        $messages = [
            'taller_id.required' => 'Es necesario seleccionar un taller.',
            'taller_id.exists' => 'Error en el registro.'
        ];

        $request->validate([
                'taller_id' => ['required', 'exists:talleres,id']
        ], $messages);

        //  Validar que el usuario no este ya inscrito en el taller
        $exists = AlumnoTaller::where('user_id', $request->user_id)
            ->where('taller_id', $request->taller_id)
            ->exists();
        
            if($exists){
                return response()->json([
                    'success' => false,
                    'message' => 'Ya se encuentra inscrito en el taller.'
                ],500);
            }

            $inscripcion = AlumnoTaller::create([
                'user_id' => $request->user_id,
                'taller_id' => $request->taller_id,
                'constancia' => false,  // CAMBIAR VALORES
                'estatus' => 'Activo',  // CAMBIAR VALORES
            ]);

            return response()->json([
                'message' => 'Alumno inscrito correctamente!',
                'taller' => true,   //  Se actualiza la sesión 'taller' a true en caso de ser una primera inscripción
                'inscripcion' => $inscripcion
            ], 200);
    }
}
