<?php

namespace App\Http\Controllers;

use App\Models\AlumnoTaller;
use App\Models\Asistencia;
use App\Models\DocenteTaller;
use App\Models\Periodo;
use App\Models\Talleres;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocenteController extends Controller
{
    public function index()
    {
        if (session('taller') === false) {
            return view('docente.index');
        } else {
            if (Auth()->user()->rol_id === 2) {
                $talleres = Talleres::select('talleres.id', 'nombre_taller', 'horarios')
                    ->join('docente_tallers', 'docente_tallers.taller_id', 'talleres.id')
                    ->where('docente_tallers.user_id', '=', Auth()->user()->id)->get();
            } else if (Auth()->user()->rol_id === 3) {
                $talleres = Talleres::select('talleres.id', 'nombre_taller', 'horarios')
                    ->join('alumno_tallers', 'alumno_tallers.taller_id', 'talleres.id')
                    ->where('alumno_tallers.user_id', '=', Auth()->user()->id)->get();
            }

            return view('docente.index', compact('talleres'));
        }
    }

    public function alumnos_taller($id)
    {
        //  Porcentaje de asistencia de los alumnos que pertenencen a un taller
        $periodo = Periodo::latest()->first();
        $fecha_inicio = Carbon::parse($periodo->fecha_inicio);
        $fecha_fin = Carbon::parse($periodo->fecha_fin);

        $totalDias = $fecha_inicio->diffInDays($fecha_fin) + 1; // +1 para incluir el día inicial

        // Total de asistencias
        $asistencias = Asistencia::join('alumno_tallers', 'alumno_tallers.id', 'asistencia.alumtalle_id')
            ->join('periodos', 'periodos.id', 'asistencia.periodo_id')
            ->whereBetween('fecha', [$fecha_inicio, $fecha_fin]);

        // dd($asistencias);

        $taller = Talleres::find($id);
        $alumnos = User::select('users.id', 'name', 'app', 'apm', 'email', 'carrera', 'matricula', 'genero')
            ->join('alumno_tallers', 'alumno_tallers.user_id', 'users.id')
            ->join('talleres', 'talleres.id', 'alumno_tallers.taller_id')
            ->where('talleres.id', '=', $id)
            ->get();

        return view('docente.alumnos', compact('alumnos', 'taller'));
    }

    public function asistenciaView($id)
    {
        $taller = Talleres::find($id);
        $alumnos = User::select('users.id', 'name', 'app', 'apm', 'email', 'carrera', 'matricula', 'genero')
            ->join('alumno_tallers', 'alumno_tallers.user_id', 'users.id')
            ->join('talleres', 'talleres.id', 'alumno_tallers.taller_id')
            ->where('talleres.id', '=', $id)
            ->get();
        return view('docente.asistencia', compact('alumnos', 'taller'));
    }

    public function asistenciaRegister(Request $request)
    {

        //  Id de los alumnos para la asistencia
        $alumnos_id = $request->input('alumnos_id', []);

        if (empty($alumnos_id)) {
            return back()->with('error', 'Debe haber al menos 1 alumno selecionado.');
        }

        //  Periodo actual
        $periodo = Periodo::latest()->first();

        foreach ($alumnos_id as $alumno) {
            //  El id_alumnoTaller para registrar la asistencia
            $alumtalle_id = AlumnoTaller::select('id')->where('user_id', $alumno)->get();

            Asistencia::create(array(
                'alumtalle_id' => $alumtalle_id[0]->id,
                'fecha' => date('y-m-d'),
                'periodo_id' => $periodo->id
            ));
        }

        return redirect()->route('alumnos-taller', ['id' => $request->input('taller_id')])->with('success', 'Asistencia realizada correctamente.');
    }
}
