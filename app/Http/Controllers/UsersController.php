<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use App\Models\AlumnoTaller;
use App\Models\Eventos;
use App\Models\Roles;
use App\Models\Talleres;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{
    public function index()
    {
        $talleres = Talleres::select('talleres.id', 'talleres.nombre_taller', 'talleres.descripcion', 'talleres.horarios_img', 'talleres.imagen', 'talleres.tipo', 'talleres.estatus', 'users.name as docente_name', 'users.app as docente_app', 'users.apm as docente_apm')
            ->leftJoin('docente_tallers', 'docente_tallers.taller_id', 'talleres.id')
            ->leftJoin('users', 'users.id', 'docente_tallers.user_id')
            ->where('talleres.estatus', '=', 'activo')
            ->get();
        $eventos = Eventos::all();

        $clase = 'transparent';

        return view('welcome', compact('talleres', 'eventos', 'clase'));
    }

    public function viewAlumno()
    {
        $talleres = Talleres::select('talleres.id', 'nombre_taller', 'tipo', 'alumno_tallers.constancia', 'alumno_tallers.id as alumno_taller_id')
            ->join('alumno_tallers', 'alumno_tallers.taller_id', 'talleres.id')
            ->where('alumno_tallers.user_id', '=', Auth()->user()->id)
            ->where('alumno_tallers.estatus', '=', 'activo')
            ->get();

        $periodos = \DB::table('alumno_tallers as at')
            ->join('talleres as t', 'at.taller_id', '=', 't.id')
            ->leftJoin('asistencia as a', 'at.id', '=', 'a.alumtalle_id')
            ->leftJoin('periodos as p', 'a.periodo_id', '=', 'p.id')
            ->select(
                'at.id as alumno_taller_id',
                'at.taller_id',
                'at.user_id',
                't.nombre_taller',
                'at.constancia',
                'at.estatus',
                'p.id as periodo_id',
                'p.fecha_inicio',
                'p.fecha_fin'
            )
            ->where('at.user_id', Auth()->user()->id)
            ->groupBy(
                'at.id',
                't.nombre_taller',
                'at.user_id',
                'at.taller_id',
                'at.constancia',
                'at.estatus',
                'p.id',
                'p.fecha_inicio',
                'p.fecha_fin'
            )
            ->get();

        return view('alumno.index', compact('talleres', 'periodos'));
    }

    public function show()
    {
        $usuarios = User::all();
        $roles = Roles::all();
        return view('admin.users.index', compact('usuarios', 'roles'));
    }

    public function create()
    {
        // Lógica para mostrar el formulario de creación de usuario
        return view('users.create');
    }

    public function storeDocentes(Request $request)
    {
        //  Validaciones
        $messages = [
            'name.required' => 'Es necesario colocar un nombre.',
            'app.required' => 'Es necesario colocar el primer apellido.',
            'apm.required' => 'Es necesario completar el campo.',
            'sexo.required' => 'Es necesario seleccionar una opción.',
            'genero.required' => 'Es necesario seleccionar una opción.',
            'fecha_nac.required' => 'Es necesario completar el campo.',
            'email.required' => 'Es necesario colocar un correo.',
            'email.unique' => 'El correo debe ser unico.',
            'password.required' => 'Genere una contraseña'
        ];

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'app' => ['required', 'string', 'max:255'],
            'apm' => ['required', 'string', 'max:255'],
            'sexo' => ['required'],
            'genero' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:' . User::class],
            'password' => ['required'],
            'fecha_nac' => ['required']
        ], $messages);

        $usuario = new User([
            'name' => $request->input('name'),
            'app' => $request->input('app'),
            'apm' => $request->input('apm'),
            'sexo' => $request->input('sexo'),
            'fecha_nac' => $request->input('fecha_nac'),
            'genero' => $request->input('genero'),
            'rol_id' => 2,
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);


        $usuario->save();
        return redirect()->route('tallerdocen.index')->with('success', 'Docente creado exitosamente');
    }

    public function store(Request $request)
    {
        //  Validaciones
        $messages = [
            'name.required' => 'Es necesario colocar un nombre.',
            'app.required' => 'Es necesario colocar el primer apellido.',
            'apm.required' => 'Es necesario completar el campo.',
            'sexo.required' => 'Es necesario seleccionar una opción.',
            'genero.required' => 'Es necesario seleccionar una opción.',
            'fecha_nac.required' => 'Es necesario completar el campo.',
            'carrera.required' => 'Es necesario seleccionar una opción.',
            'matricula.required' => 'Es necesario colocar la matricula.',
            'nss.required' => 'Es necesario proporcionar tu numero de seguridad social.',
            'email.required' => 'Es necesario colocar un correo.',
            'email.unique' => 'El correo debe ser unico.',
            'password.required' => 'Genere una contraseña',
        ];

        if ($request->input('rol_id') == 1) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'app' => ['required', 'string', 'max:255'],
                'apm' => ['required', 'string', 'max:255'],
                'sexo' => ['required'],
                'genero' => ['required', 'string'],
                'email' => ['required', 'email', 'unique:' . User::class],
                'password' => ['required'],
                'fecha_nac' => ['required']
            ], $messages);

            $usuario = new User([
                'name' => $request->input('name'),
                'app' => $request->input('app'),
                'apm' => $request->input('apm'),
                'sexo' => $request->input('sexo'),
                'fecha_nac' => $request->input('fecha_nac'),
                'genero' => $request->input('genero'),
                'rol_id' => $request->input('rol_id'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ]);
        } else if ($request->input('rol_id') == 3) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'app' => ['required', 'string', 'max:255'],
                'apm' => ['required', 'string', 'max:255'],
                'sexo' => ['required'],
                'genero' => ['required', 'string'],
                'carrera' => ['required', 'string'],
                'matricula' => ['required', 'string'],
                'fecha_nac' => ['required'],
                'nss' => ['required'],
                'email' => ['required', 'email', 'unique:' . User::class],
                'password' => ['required'],
            ], $messages);
            $usuario = new User([
                'name' => $request->input('name'),
                'app' => $request->input('app'),
                'apm' => $request->input('apm'),
                'sexo' => $request->input('sexo'),
                'fecha_nac' => $request->input('fecha_nac'),
                'genero' => $request->input('genero'),
                'rol_id' => $request->input('rol_id'),
                'carrera' => $request->input('carrera'),
                'matricula' => $request->input('matricula'),
                'nss' => $request->input('nss'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ]);
        }


        $usuario->save();
        return redirect()->route('users.show')->with('success', 'Usuario creado exitosamente');
    }

    public function edit(Request $request, $id)
    {
        //  Mensajes de validación
        $messages = [
            'name.required' => 'Es necesario colocar un nombre.',
            'app.required' => 'Es necesario colocar el primer apellido.',
            'apm.required' => 'Es necesario completar el campo.',
            'sexo.required' => 'Es necesario seleccionar una opción.',
            'genero.required' => 'Es necesario seleccionar una opción.',
            'fecha_nac.required' => 'Es necesario completar el campo.',
            'carrera.required' => 'Es necesario seleccionar una opción.',
            'matricula.required' => 'Es necesario colocar la matricula.',
            'nss.required' => 'Es necesario proporcionar tu numero de seguridad social.',
            'email.required' => 'Es necesario colocar un correo.',
            'email.unique' => 'El correo debe ser unico.',
            'password.required' => 'Genere una contraseña',
        ];

        $user = User::find($id);

        if ($user) {
            //  Validaciones
            if ($user->rol_id == 1 || $user->rol_id == 2) {  // Admin y auxiliar
                $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'app' => ['required', 'string', 'max:255'],
                    'apm' => ['required', 'string', 'max:255'],
                    'sexo' => ['required'],
                    'genero' => ['required', 'string'],
                    'email' => ['required', 'email', 'unique:' . User::class],
                    'password' => ['required'],
                    'fecha_nac' => ['required']
                ], $messages);
            } elseif ($user->rol_id == 3) { // Estudiante
                $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'app' => ['required', 'string', 'max:255'],
                    'apm' => ['required', 'string', 'max:255'],
                    'sexo' => ['required'],
                    'genero' => ['required', 'string'],
                    'carrera' => ['required', 'string'],
                    'matricula' => ['required', 'string'],
                    'fecha_nac' => ['required'],
                    'nss' => ['required'],
                    'email' => ['required', 'email', 'unique:' . User::class],
                    'password' => ['required'],
                ], $messages);
            }

            // Actualiza los campos del usuario
            $user->nombre = $request->input('nombre');
            $user->app = $request->input('app');
            $user->apm = $request->input('apm');
            $user->sexo = $request->input('sexo');
            $user->fecha_nac = $request->input('fecha_nac');
            $user->genero = $request->input('genero');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));


            // Actualiza campos específicos según el rol
            if ($user->rol_id == 3) { // Estudiante
                $user->matricula = $request->input('matricula');
                $user->nss = $request->input('nss');
            }

            $user->save();
            return redirect()->route('users.view')->with('success', 'Usuario actualizado exitosamente.');
        } else {
            return redirect()->route('users.view')->with('error', 'Usuario no encontrado.');
        }
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new UsersImport, $request->file('file'));

        return redirect()->back()->with('success', 'Datos importados correctamente.');
    }

    public function destroy(User $user){
        try {
            $user->delete();
            return redirect()->route('users.show')->with('success', 'Usuario eliminao exitosamente');
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1451) {
                return redirect()->route('users.show')->with('error', 'Error al eliminar el usuario. El usuario tiene registros asociados');
            }
            return redirect()->route('users.show')->with('error', 'Error al eliminar al usuario: '.$e->getMessage());
        }
    }
}
