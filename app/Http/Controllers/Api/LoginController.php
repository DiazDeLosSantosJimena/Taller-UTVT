<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\AlumnoTaller;
use App\Models\DocenteTaller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {

        //  Validacion para saber si un usuario ya se encuentra logueado
        // if (Auth::check()) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'User already authenticated!'
        //     ], 401);
        // }

        $credentials = $request->getCredentials();

        if (!Auth::validate($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Correo o contraseña invalidos!',
            ], 200);
        }

        //  Consulta para obtener la validación del login
        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        //  Login
        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    public function authenticated(Request $request, $user)
    {
        //  Identificar el rol del usuario
        if ($user->rol_id === 2) {
            //  Identificar si el docente está en algun taller
            $talleres = DocenteTaller::where('user_id', '=', $user->id)->get();
            if (count($talleres) > 0) {
                return response()->json([
                    'success' => true,
                    'user' => $user,
                    'taller' => true
                ], 200);
            } else {
                return response()->json([
                    'success' => true,
                    'taller' => false,
                    'user' => $user
                ], 200);
            }
        } else if ($user->rol_id === 3) {

            //  Identificar si el alumno está en algun taller
            $talleres = AlumnoTaller::where('user_id', '=', $user->id)->get();

            if (count($talleres) > 0) {
                return response()->json([
                    'success' => true,
                    'taller' => true,
                    'user' => $user
                ], 200);
            } else {
                return response()->json([
                    'success' => true,
                    'taller' => false,
                    'user' => $user
                ], 200);
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('api')->logout();

        return response()->json([
            'success' => true,
            'message' => 'Successfully logged out',
        ], 200);
    }
}
