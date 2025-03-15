<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Eventos;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EventosController extends Controller
{
    function eventosView() : JsonResponse{
        $eventos = Eventos::all();

        return response()->json([
            'success' => true,
            'eventos' => $eventos
        ], 200);
    }
}
