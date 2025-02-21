<?php

namespace App\Http\Controllers;

use App\Models\Avisos;
use App\Models\Talleres;
use Illuminate\Http\Request;

class AvisosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        

        $talleres = Talleres::select('talleres.id', 'nombre_taller', 'horarios')
            ->join('alumno_tallers', 'alumno_tallers.taller_id', 'talleres.id')
            ->where('alumno_tallers.user_id', '=', Auth()->user()->id)
            ->get();
        
        $avisos = Avisos::select('avisos.id', 'avisos.titulo', 'avisos.descripcion', 'avisos.imagen', 'talleres.nombre_taller')
            ->join('talleres', 'talleres.id', '=', 'avisos.taller_id')
            ->where('avisos.user_id', '=', auth()->user()->id)
            ->get();

        return view('avisos.index', compact('talleres', 'avisos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'taller_id' => 'required|exists:talleres,id',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Guardar imagen si existe
        if ($request->file('imagen')  !=  '') {
            $file = $request->file('imagen');
            $foto1 = $file->getClientOriginalName();
            $dates = date('YmdHis');
            $foto2 = $dates . $foto1;
            \Storage::disk('local')->put($foto2, \File::get($file));
        } else {
            $foto2 = 'avisos.png';
        }
    
        // Crear el aviso
        Avisos::create([
            'user_id' => $request->user_id, // Se obtiene del formulario
            'taller_id' => $request->taller_id,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $foto2,
        ]);
    
        return redirect()->route('avisos.index')->with('success', 'Aviso creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
