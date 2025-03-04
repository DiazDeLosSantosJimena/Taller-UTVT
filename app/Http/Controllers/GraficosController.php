<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class GraficosController extends Controller
{
    function index(): View
    {
        $taller_alumnos = DB::table('talleres as t')
            ->leftJoin('alumno_tallers as at', 't.id', '=', 'at.taller_id')
            ->leftJoin('users as u', 'at.user_id', '=', 'u.id')
            ->select('t.id as taller_id', 't.nombre_taller', DB::raw('COUNT(u.id) as total_inscritos'))
            ->where('u.rol_id', 3) // Filtra solo los usuarios con rol_id = 3
            ->groupBy('t.id', 't.nombre_taller')
            ->get();

        $asistencias = DB::table('talleres as t')
            ->leftJoin('alumno_tallers as at', 't.id', '=', 'at.taller_id')
            ->leftJoin('asistencia as a', 'at.id', '=', 'a.alumtalle_id')
            ->select(
                't.id as taller_id',
                't.nombre_taller',
                DB::raw('COUNT(a.id) as total_asistencias'),
                DB::raw('(COUNT(a.id) * 100.0 / (SELECT COUNT(*) FROM asistencia)) as porcentaje')
            )
            ->groupBy('t.id', 't.nombre_taller')
            ->get();

        return view('admin.graficos', compact('taller_alumnos', 'asistencias'));
    }
}
