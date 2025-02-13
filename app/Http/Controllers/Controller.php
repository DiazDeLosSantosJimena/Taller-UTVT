<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index() {
        $periodo = Periodo::latest()->first();

        if($periodo != null){
            $fecha_fin = $periodo->fecha_fin;
            return view('admin.index', compact('periodo', 'fecha_fin'));
        }else{
            $fecha_fin = "2001-09-03";
            return view('admin.index', compact('periodo', 'fecha_fin'));
        }
    }

    public function newPeriodo(Request $request) {
        //Reglas de validación
        $rules = [
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required'
        ];

        //Mensaje perzonalizado para la validación
        $message = [
            'fecha_inicio.required' => 'Por favor ingrese una fecha valida.',
            'fecha_fin.required' => 'Por favor ingrese una fecha valida.'
        ];

        $this->validate($request, $rules, $message);

        Periodo::create(array(
            'fecha_inicio' => $request->input('fecha_inicio'),
            'fecha_fin' => $request->input('fecha_fin')
        ));

        return redirect('/');
    }
}
