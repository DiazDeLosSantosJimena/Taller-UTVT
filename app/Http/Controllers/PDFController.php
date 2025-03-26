<?php

namespace App\Http\Controllers;

use App\Models\Talleres;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generarPDF($taller_id)
    {
        $info = \DB::table('alumno_tallers as at')
            ->join('talleres as t', 'at.taller_id', '=', 't.id')
            ->leftJoin('asistencia as a', 'at.id', '=', 'a.alumtalle_id')
            ->leftJoin('periodos as p', 'a.periodo_id', '=', 'p.id')
            ->select(
                'at.id as alumno_taller_id',
                'at.taller_id',
                'at.user_id',
                't.nombre_taller',
                'at.constancia',
                'at.estatus',
                'p.id as periodo_id',
                'p.fecha_inicio',
                'p.fecha_fin'
            )
            ->where('at.id', $taller_id)
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

        $periodo = ucwords(Carbon::parse($info[0]->fecha_inicio)->translatedFormat('F'). ' - ' .Carbon::parse($info[0]->fecha_fin)->translatedFormat('F'));

        $data = [
            'taller' => $info[0]->nombre_taller,
            'alumno' => auth()->user()->name .' '. auth()->user()->app .' '. auth()->user()->apm,
            'periodo' => $periodo,
            'anoActual' => date('Y')
        ];

        $pdf = Pdf::loadView('alumno.constancia', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('Constancia.pdf'); // Para descargar el archivo
    }
}
