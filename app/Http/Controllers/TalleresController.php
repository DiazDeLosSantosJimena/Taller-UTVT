<?php

namespace App\Http\Controllers;

use App\Models\Talleres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'descripcion.required' => 'Es necesario completar el campo.',
            'horario_img.required' => 'Es necesario completar el campo.',
            'imagen.required' => 'Es necesario completar el campo.',
            'tipo_taller.required' => 'Es necesario completar el campo.',
            'estatus.required' => 'Es necesario completar el campo.',
        ];

        $request->validate([
            'nombre_taller' => ['required'],
            'descripcion' => ['required'],
            'horario_img' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'imagen' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'tipo_taller' => ['required'],
            'estatus' => ['required'],
        ], $messages);

        $file = $request->file('horario_img');
        $nombreFoto = $file->getClientOriginalName();
        $dates = date('YmdHis');
        $horario_img = $dates . $nombreFoto;
        \Storage::disk('horarios')->put($horario_img, \File::get($file));

        $file = $request->file('imagen');
        $nombreImagen = $file->getClientOriginalName();
        $dates = date('YmdHis');
        $imagen_taller = $dates . $nombreImagen;
        \Storage::disk('portadas')->put($imagen_taller, \File::get($file));

        if ($request->input('estatus') == 'on') {
            $estatus = 'Activo';
        }

        $talleres = new Talleres([
            'nombre_taller' => $request->input('nombre_taller'),
            'descripcion' => $request->input('descripcion'),
            'horarios_img' => $horario_img,
            'imagen' => $imagen_taller,
            'tipo' => $request->input('tipo_taller'),
            'estatus' => $estatus,
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
        $messages = [
            'nombre_taller.required' => 'Es necesario completar el campo.',
            'descripcion.required' => 'Es necesario completar el campo.',
            'horario_img.required' => 'Es necesario completar el campo.',
            'imagen.required' => 'Es necesario completar el campo.',
            'tipo_taller.required' => 'Es necesario completar el campo.',
            'estatus.required' => 'Es necesario completar el campo.',
        ];

        if ($request->file('horario_img') != null) {
            $request->validate([
                'horario_img' => ['image', 'mimes:jpg,png', 'max:2048'],
            ], $messages);
        } else if ($request->file('imagen') != null) {
            $request->validate([
                'imagen' => ['image', 'mimes:jpg,png', 'max:2048'],
            ], $messages);
        }

        $request->validate([
            'nombre_taller' => ['required'],
            'descripcion' => ['required'],
            'tipo_taller' => ['required'],
            'estatus' => ['required'],
        ], $messages);

        $talle = Talleres::find($id);

        //  Horario
        if ($request->file('horario_img') != null) {
            //busca en el storage la ruta de la imagen del horario del taller y lo elimina
            $path = Storage::path(trim('img\horarios\ ') . $talle->horarios_img);
            unlink($path);
            $exists = Storage::disk('horarios')->exists($talle->imagen);
            if ($exists) {
                Storage::disk('horarios')->delete($talle->imagen);
            }

            //guarda el nuevo horario en el storage
            $file = $request->file('horario_img');
            $nombreFoto = $file->getClientOriginalName();
            $horario_img = $talle->id . '_' . date('Y-m-d') . '_' . $nombreFoto;
            \Storage::disk('horarios')->put($horario_img, \File::get($file));

            $talle->horarios_img = $horario_img;

        } 

        //  Imagen - Portada
        if ($request->file('imagen') != null) {
            //busca en el storage la ruta de la imagen del taller y lo elimina
            $path = Storage::path(trim('img\portadas\ ') . $talle->imagen);
            unlink($path);
            $exists = Storage::disk('portadas')->exists($talle->imagen);
            if ($exists) {
                Storage::disk('portadas')->delete($talle->imagen);
            }
            //guarda el nuevo archivo en el storage
            $file = $request->file('imagen');
            $nombreFoto = $file->getClientOriginalName();
            $imagen_taller = $talle->id . '_' . date('Y-m-d') . '_' . $nombreFoto;
            \Storage::disk('portadas')->put($imagen_taller, \File::get($file));
            
            $talle->imagen = $imagen_taller;
        }

        if ($request->input('estatus') == 'on') {
            $estatus = 'Activo';
        }

        $talle->nombre_taller = $request->input('nombre_taller');
        $talle->descripcion = $request->input('descripcion');
        $talle->tipo = $request->input('tipo_taller');
        $talle->estatus = $estatus;
        $talle->save();

        return redirect()->route('taller.index')->with('success', 'Taller actualizado exitosamente.');
    }

    public function destroy(string $id)
    {
        //
    }
}
