<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AlumnoTaller;
use App\Models\Asistencia;
use App\Models\AsistenciaPorcentaje;
use App\Models\DocenteTaller;
use App\Models\Periodo;
use App\Models\Talleres;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    function talleres(User $user)
    {
        //  Verificar si el docente ya fue asignado a algún taller
        $exist = DocenteTaller::where('user_id', $user->id)->exists();;
        if ($exist) {
            $talleres = Talleres::select('talleres.id', 'nombre_taller', 'tipo')
                ->join('docente_tallers', 'docente_tallers.taller_id', 'talleres.id')
                ->where('docente_tallers.user_id', '=', $user->id)
                ->get();

            return response()->json([
                'talleres' => $talleres
            ], 200);
        }

        return response()->json([
            'taller' => false,
            'message' => 'Docente no asignado a ningún taller'
        ], 404);
    }

    function alumnos_taller(Talleres $taller): JsonResponse
    {
        //  Periodo actual en el sistema
        $periodo = Periodo::latest()->first();
        $fecha_actual = date('Y-m-d');

        //  Comprobar que existe un periodo valido
        if ($periodo->fecha_fin < $fecha_actual) {
            return response()->json([
                'periodo' => $periodo,
                'message' => 'Sin periodo registrado!'
            ], 404);
        }

        // Total de asistencias
        // Filtrar por taller_id si se proporciona
        $porcentajes = AsistenciaPorcentaje::select('asistencia_porcentaje.*', 'alumno_tallers.taller_id')
            ->join('alumno_tallers', 'alumno_tallers.user_id', '=', 'asistencia_porcentaje.user_id')
            ->whereNotNull('porcentaje_asistencia')
            ->where('alumno_tallers.taller_id', $taller->id)
            ->get();

        $alumnos = User::select('users.id', 'name', 'app', 'apm', 'email', 'carrera', 'matricula', 'genero', 'alumno_tallers.id as alumno_tallers_id', 'alumno_tallers.constancia', 'alumno_tallers.estatus')
            ->join('alumno_tallers', 'alumno_tallers.user_id', 'users.id')
            ->join('talleres', 'talleres.id', 'alumno_tallers.taller_id')
            ->where('talleres.id', '=', $taller->id)
            ->get();

        return response()->json([
            'taller' => $taller,
            'alumnos' => $alumnos,
            'asistencia' => $porcentajes
        ], 200);
    }

    function asistenciaView(Talleres $taller) : JsonResponse{
        //  Alumnos que no han asistido al taller durante la semana
        $alumnos = \DB::select('WITH asistencia_semanal AS (
            SELECT DISTINCT alumtalle_id
            FROM asistencia
            WHERE YEARWEEK(fecha, 1) = YEARWEEK(CURDATE(), 1)
        )
        SELECT users.id, users.name, users.app, users.apm, at.taller_id
        FROM alumno_tallers AT
        JOIN users ON at.user_id = users.id 
        LEFT JOIN asistencia_semanal a ON at.id = a.alumtalle_id
        WHERE a.alumtalle_id IS NULL AND at.taller_id = '.$taller->id.' AND at.estatus = "activo"');

        return response()->json($alumnos, 200);
    }

    function asistencia(Request $request, Talleres $taller){
        //  Almacenar el array con los id de los alumnos
        $alumnos_id = $request->alumnos_id;

        if(empty($alumnos_id)){
            return response()->json([
                'success' => false,
                'message' => 'Debe al menos seleccionar a un alumno.'
            ], 500);
        }

        //  Periodo actual
        $periodo = Periodo::latest()->first();
        $asistencia = array();

        foreach ($alumnos_id as $alumno) {
            //  El id_alumnoTaller para registrar la asistencia
            $alumtalle_id = AlumnoTaller::select('id')->where('user_id', $alumno)->where('taller_id', $taller->id)->get();

            array_push($asistencia, Asistencia::create(array(
                'alumtalle_id' => $alumtalle_id[0]->id,
                'fecha' => date('Y-m-d'),
                'periodo_id' => $periodo->id
            )));
        }

        return response()->json([
            'message' => 'Asistencias realizadas correctamente.',
            'asistencias' => $asistencia
        ], 200);
    }
}
