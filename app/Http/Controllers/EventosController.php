<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use Illuminate\Http\Request;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        {
            // Validación de los datos recibidos
            $request->validate([
                'titulo' => 'required|string|max:255',
                'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
        
            // Guardar la imagen si se ha subido
            if ($request->file('imagen')  !=  '') {
                $file = $request->file('imagen');
                $foto1 = $file->getClientOriginalName();
                $dates = date('YmdHis');
                $foto2 = $dates . $foto1;
                \Storage::disk('local')->put($foto2, \File::get($file));
            } else {
                $foto2 = 'eventos.png';
            }
        
            // Crear el evento
            Eventos::create([
                'user_id' => Auth()->user()->id,  
                'titulo' => $request->titulo,    
                'imagen' => $foto2,         
            ]);
        
            // Redirigir a la lista de eventos o cualquier otra página con un mensaje de éxito
            return redirect()->route('alumnos-taller', ['id' => $id])->with('eventSuccess', 'Evento creado correctamente!');
        }
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
