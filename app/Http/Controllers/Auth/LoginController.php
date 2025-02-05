<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\AlumnoTaller;
use App\Models\DocenteTaller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //

    public function show()
    {
        if(Auth::check()){
            return redirect('/home');
        }
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if (!Auth::validate($credentials)) {
            return redirect()->to('/login')->withErrors('auth.failed');
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
        if($user->rol_id === 2){
            //  Identificar si el docente está en algun taller
            $talleres = DocenteTaller::where('user_id', '=', $user->id)->get();

            if(count($talleres) > 0){
                $request->session()->put('taller', true);
                $session_taller = session('taller');
                // dd($session_taller);
                return redirect('/');
            }else{
                $request->session()->put('taller', false);
                $session_taller = session('taller');
                // dd($session_taller);
                return redirect('/')->with('taller', $session_taller);
            }
        }else if($user->rol_id === 3){

            //  Identificar si el alumno está en algun taller
            $talleres = AlumnoTaller::where('user_id', '=', $user->id)->get();
            if(count($talleres) > 0){
                $request->session()->put('taller', true);
                $session_taller = session('taller');
                // dd($session_taller);
                return redirect('/');
            }else{
                $request->session()->put('taller', false);
                $session_taller = session('taller');
                // dd($session_taller);
                return redirect('/')->with('taller', $session_taller);
            }
        }
        return redirect('/');
    }

    public function logout(){
        Session::flush();

        Auth::logout();

        return redirect()->to('/login');
    }
}
