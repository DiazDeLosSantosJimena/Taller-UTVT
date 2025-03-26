<?php

namespace App\Http\Controllers;

use App\Models\Avisos;
use App\Models\Publicaciones;
use App\Models\Talleres;
use Illuminate\Http\Request;

class EventosPublicacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publish = Avisos::select('avisos.id', 'avisos.taller_id','titulo', 'avisos.descripcion', 'avisos.imagen','avisos.created_at', 'users.name as nombre', 'users.app', 'users.apm', 'talleres.nombre_taller as taller')
        ->join('users', 'users.id', 'avisos.user_id')
        ->join('talleres', 'talleres.id', 'avisos.taller_id')
        ->get();

        $talleres = Talleres::all();
        return view('admin.publicaciones.index', compact('publish', 'talleres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publicaciones.create');
    }   
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Validación
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'taller' => 'required',
        ]);
    
        // Guardar imagen si existe
        if ($request->file('imagen')  !=  '') {
            $file = $request->file('imagen');
            $foto1 = $file->getClientOriginalName();
            $dates = date('YmdHis');
            $foto2 = $dates . $foto1;
            \Storage::disk('public')->put($foto2, \File::get($file));
        } else {
            $foto2 = null;
        }
    
        // Crear el aviso
        Avisos::create([
            'user_id' => Auth()->user()->id,
            'taller_id' => $request->taller,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $foto2,
        ]);

        return redirect()->route('publicaciones.index')->with('success', 'Publicación creada exitosamente.');
    }
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
