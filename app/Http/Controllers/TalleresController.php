<?php

namespace App\Http\Controllers;

use App\Models\Talleres;
use Illuminate\Http\Request;

class TalleresController extends Controller
{

    public function index()
    {
        $talleres = Talleres::all();
        return view('admin.talleres.index', compact('talleres'));
    }

    public function create()
    {
        return view('taller.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'nombre_taller.required' => 'Es necesario completar el campo.',
            'horarios.required' => 'Es necesario completar el campo.',
            'ubicacion.required' => 'Es necesario completar el campo',
        ];
        $request->validate([
            'nombre_taller' => ['required'],
            'horarios' => ['required'],
            'ubicacion' => ['required'],

        ], $messages);

        $talleres = new Talleres([
            'nombre_taller' => $request->input('nombre_taller'),
            'horarios' => $request->input('horarios'),
            'ubicacion' => $request->input('ubicacion'),
        ]);

        $talleres->save();
        return redirect()->route('taller.index')->with('success', 'Taller creado exitosamente');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $rules = [
            'nombre_taller' => 'required',
            'horarios' => 'required',
            'ubicacion' => 'required',

        ];
        $message = [
            'nombre_taller.required' => 'Es necesario completar el campo.',
            'horarios.required' => 'Es necesario completar el campo.',
            'ubicacion.required' => 'Es necesario completar el campo',
        ];

        $this->validate($request, $rules, $message);

        $talle = Talleres::find($id);
        $talle->nombre_taller = $request->input('nombre_taller');
        $talle->horarios = $request->input('horarios');
        $talle->ubicacion = $request->input('ubicacion');
        $talle->save();

        return redirect()->route('taller.index')->with('success', 'Taller actualizado exitosamente.');
    }

    public function destroy(string $id)
    {
        //
    }
}