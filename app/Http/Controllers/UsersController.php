<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index(){
        if (Auth::check()) {
            switch (Auth::user()->rol_id) {
                case 1:
                    return view('admin.index');
                    break;
                case 2:
                    return view('docente.index');
                    break;
                case 3:
                    return view('alumno.index');
                    break;
                default:
                    return redirect('/login');
                    break;
            }
        }
        return redirect('/login');
    }
}
