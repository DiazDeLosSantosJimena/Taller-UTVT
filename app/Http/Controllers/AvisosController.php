<?php

namespace App\Http\Controllers;

use App\Models\Avisos;
use App\Models\Talleres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvisosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $talleres = Talleres::all();
        
        $avisos = Avisos::select('avisos.id', 'avisos.taller_id', 'avisos.titulo', 'avisos.descripcion', 'avisos.imagen', 'avisos.created_at', 'users.name', 'users.app', 'users.apm')
            ->join('talleres', 'talleres.id', '=', 'avisos.taller_id')
            ->join('users', 'users.id', '=', 'avisos.user_id')
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
    public function store(Request $request, $id)
    {
        // dd($request->all());
        // Validación
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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
            'user_id' => Auth()->user()->id, // Se obtiene del formulario
            'taller_id' => $id,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $foto2,
        ]);
    
        return redirect()->route('alumnos-taller', ['id' => $id])->with('avisoSuccess', 'Aviso creado correctamente!');
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
        // Validación
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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
    
        $avisos = Avisos::find($id);

        // Crear el aviso
        $avisos->titulo = $request->titulo;
        $avisos->descripcion = $request->descripcion;
        $avisos->imagen = $foto2;
        $avisos->save();

        return redirect()->route('publicaciones.index')->with('success', 'Publicación actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $aviso = Avisos::find($id);
        $aviso->delete();
        return redirect()->route('publicaciones.index')->with('success', 'Publicación eliminada exitosamente.');
    }
}
