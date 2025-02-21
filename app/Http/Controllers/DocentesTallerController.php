<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Talleres;
use App\Models\DocenteTaller;


use Illuminate\Http\Request;

class DocentesTallerController extends Controller
{
    public function index()
    {
        //Vista principal
        $talleresdocen = DB::table('docente_tallers as tu')
            ->join('users as u', 'tu.user_id', '=', 'u.id')
            ->join('talleres as t', 'tu.taller_id', '=', 't.id')
            ->select(
                'tu.id as talleres_users_id',
                'u.name',
                'u.app',
                'u.apm',
                't.nombre_taller'
            )
            ->get();
        //Consulta de select
        $userD = User::where('rol_id', 2)->get();

        $tallers = Talleres::whereNotIn('id', function ($query) {
            $query->select('taller_id')->from('docente_tallers');
        })->get();

        return view('admin.talleresusers.index', compact('talleresdocen', 'userD', 'tallers',));
    }
    public function create()
    {
        return view('tallerdocen.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'user_id.required' => 'Es necesario seleccionar una opción',
            'taller_id.required' => 'Es necesario seleccionar una opción.',
        ];
        $request->validate([
            'user_id' => ['required'],
            'taller_id' => ['required'],

        ], $messages);

        $user_id = $request->user_id;
        $talleres = $request->taller_id[0];
        $separador = ',';
        $ids = explode($separador, $talleres);
        $contador = count($ids);

        for ($i = 0; $i < $contador; $i++) {
            DocenteTaller::create(array(
                'user_id' => $user_id,
                'taller_id' => $ids[$i]
            ));
        }
        return redirect()->route('tallerdocen.index')->with('success', 'Docente asignado a un taller exitosamente');
    }

    public function update(Request $request, string $id)
    {
        $rules = [
            'user_id' => 'required',
            'taller_id' => 'required',

        ];
        $message = [
            'user_id.required' => 'Es necesario seleccionar una opción',
            'taller_id.required' => 'Es necesario seleccionar una opción.',
        ];

        $this->validate($request, $rules, $message);

        $talleDO = DocenteTaller::find($id);
        $talleDO->user_id = $request->input('user_id');
        $talleDO->taller_id = $request->input('taller_id');
        $talleDO->save();

        return redirect()->route('tallerdocen.index')->with('success', 'Campo actualizado exitosamente.');
    }
    public function destroy($id)
    {
        $query = DocenteTaller::findOrFail($id);
        if ($query) {
            $query->delete();
            return redirect()->route('tallerdocen.index')->with('success', 'Registro eliminado correctamente');
        } else {
            return redirect()->route('tallerdocen.index')->with('error', 'Registro no encontrado');
        }
    }
}
