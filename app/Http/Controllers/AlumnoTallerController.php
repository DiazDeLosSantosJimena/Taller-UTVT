<?php

namespace App\Http\Controllers;

use App\Models\AlumnoTaller;
use App\Models\Talleres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlumnoTallerController extends Controller
{
    public function store(Request $request)
    {
        
        $request->validate([
            'taller_id' => 'required|exists:talleres,id',
        ]);

        
        $user = Auth::user();
        $exists = AlumnoTaller::where('user_id', $user->id)
            ->where('taller_id', $request->taller_id)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Ya estás inscrito en este taller.');
        }

        
        AlumnoTaller::create([
            'user_id' => $user->id,
            'taller_id' => $request->taller_id,
            'constancia' => false,  // CAMBIAR VALORES
            'estatus' => 'Inscrito',  // CAMBIAR VALORES
        ]);

        // ESTE PRRO MENSAJE NO SALE, CHECARLO
        return redirect()->back()->with('success', 'Te has inscrito correctamente al taller.');
    }
}
