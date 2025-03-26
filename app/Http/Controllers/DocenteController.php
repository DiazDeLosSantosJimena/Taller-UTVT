<?php

namespace App\Http\Controllers;

use App\Models\AlumnoTaller;
use App\Models\Asistencia;
use App\Models\AsistenciaPorcentaje;
use App\Models\Comentarios;
use App\Models\DocenteTaller;
use App\Models\Periodo;
use App\Models\Talleres;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DocenteController extends Controller
{
    public function index()
    {
        if (session('taller') === false) {
            return view('docente.index');
        } else {
            if (Auth()->user()->rol_id === 2) {
                $talleres = Talleres::select('talleres.id', 'nombre_taller', 'tipo')
                    ->join('docente_tallers', 'docente_tallers.taller_id', 'talleres.id')
                    ->where('docente_tallers.user_id', '=', Auth()->user()->id)->get();
            } else if (Auth()->user()->rol_id === 3) {
                $talleres = Talleres::select('talleres.id', 'nombre_taller', 'tipo')
                    ->join('alumno_tallers', 'alumno_tallers.taller_id', 'talleres.id')
                    ->where('alumno_tallers.user_id', '=', Auth()->user()->id)->get();
            }

            return view('docente.index', compact('talleres'));
        }
    }

    public function alumnos_taller($id)
    {
        //  Periodo actual en el sistema
        $periodo = Periodo::latest()->first();

        if($periodo == null){
            return view('docente.alumnos', [
                'periodo' => $periodo
            ]);
        }

        // Total de asistencias
        // Filtrar por taller_id si se proporciona
        $porcentajes = AsistenciaPorcentaje::select('asistencia_porcentaje.*', 'alumno_tallers.taller_id')
            ->join('alumno_tallers', 'alumno_tallers.user_id', '=', 'asistencia_porcentaje.user_id')
            ->whereNotNull('porcentaje_asistencia')
            ->where('alumno_tallers.taller_id', $id)
            ->get();

        // dd($porcentajes);

        $taller = Talleres::find($id);
        $alumnos = User::select('users.id', 'name', 'app', 'apm', 'email', 'carrera', 'matricula', 'genero', 'alumno_tallers.id as alumno_tallers_id', 'alumno_tallers.constancia')
            ->join('alumno_tallers', 'alumno_tallers.user_id', 'users.id')
            ->join('talleres', 'talleres.id', 'alumno_tallers.taller_id')
            ->where('talleres.id', '=', $id)
            ->get();

        return view('docente.alumnos', [
            'alumnos' => $alumnos,
            'taller' => $taller,
            'porcentajes' => $porcentajes,
            'periodo' => $periodo
        ]);
    }

    public function asistenciaView($id)
    {
        $periodo = Periodo::latest()->first();
        $taller = Talleres::find($id);
        
        // $alumnos = User::select('users.id', 'name', 'app', 'apm', 'email', 'carrera', 'matricula', 'genero')
        //     ->join('alumno_tallers', 'alumno_tallers.user_id', 'users.id')
        //     ->join('talleres', 'talleres.id', 'alumno_tallers.taller_id')
        //     ->where('talleres.id', '=', $id)
        //     ->get();

        $alumnos = \DB::select('WITH asistencia_semanal AS (
            SELECT DISTINCT alumtalle_id
            FROM asistencia
            WHERE YEARWEEK(fecha, 1) = YEARWEEK(CURDATE(), 1)
        )
        SELECT users.id, users.name, users.app, users.apm, at.taller_id
        FROM alumno_tallers AT
        JOIN users ON at.user_id = users.id 
        LEFT JOIN asistencia_semanal a ON at.id = a.alumtalle_id
        WHERE a.alumtalle_id IS NULL AND at.taller_id = '.$id.' AND at.estatus = "activo"');

        return view('docente.asistencia', compact('alumnos', 'taller', 'periodo'));
    }

    public function constancia(Request $request)
    {

        $alumno_taller = AlumnoTaller::find($request->input('alumno_tallers_id'));

        $alumno_taller->constancia = 1;
        $alumno_taller->save();

        return redirect()->route('alumnos-taller', ['id' => $alumno_taller->taller_id])->with('success', 'Constancia concedida.');
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
                'fecha' => Carbon::now(),
                'periodo_id' => $periodo->id
            ));
        }

        return redirect()->route('alumnos-taller', ['id' => $request->input('taller_id')])->with('success', 'Asistencia realizada correctamente.');
    }

    function comentarios_alumno($id){
        $comentarios = Comentarios::select('id', 'alumno_taller_id', 'fecha', 'comentario as comentario_docente')->where('alumno_taller_id', $id)->get();

        $alumno = AlumnoTaller::select('us.name', 'us.app', 'us.apm')
            ->join('users as us', 'us.id', 'alumno_tallers.user_id')
            ->where('alumno_tallers.id', $id)
            ->get();

        return response()->json([
            'comentarios' => $comentarios,
            'alumno' => $alumno
        ], 200);
    }

    public function crear_comentario(Request $request){
        
        $request->validate([
            'comentarios' => 'required',
            'alumno_taller_id' => 'required'
        ]);

        $comentario = Comentarios::create(array(
            'fecha' => date('Y-m-d'),
            'comentario' => $request->input('comentarios'),
            'alumno_taller_id' => $request->input('alumno_taller_id')
        ));

        return redirect()->back()->with('success', 'Comentario creado correctamente.');
    }

    public function delete($id){
        $docente = User::find($id);
        $docente->delete();
        return redirect()->route('tallerdocen.index')->with('success', 'Docente eliminado correctamente.');
    }
}
