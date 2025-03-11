<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    function index()
    {
        //  Alumnos con rol_id = 3
        $alumnos = User::where('rol_id', 3)->with('Roles')->get();
        return response()->json([
            200,
            'success' => true,
            'alumnos' => $alumnos,
        ]);
    }
}
