<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generarPDF()
    {
        $data = [
            'taller' => 'Voleibol',
            'alumno' => auth()->user()->name .' '. auth()->user()->app .' '. auth()->user()->apm,
            'periodo' => 'Enero - Abril',
            'anoActual' => date('Y')
        ];

        $pdf = Pdf::loadView('alumno.constancia', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('Constancia.pdf'); // Para descargar el archivo
    }
}
