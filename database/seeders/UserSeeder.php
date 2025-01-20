<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //  Administrador
        $usuario = new User();
        $usuario->name = 'Administrador';
        $usuario->app = 'Sistemas';
        $usuario->apm = 'Talleres';
        $usuario->email = 'admin@talleres.com';
        $usuario->password = 'admin';
        $usuario->carrera = 'Sistemas';
        $usuario->matricula = '000000000';
        $usuario->nss = '49180365113';
        $usuario->fecha_nac = '2001-01-01';
        $usuario->sexo = 'F';
        $usuario->genero = 'NB';
        $usuario->rol_id = '1';
        $usuario->save();

        //  Docente
        $usuario = new User();
        $usuario->name = 'Docente';
        $usuario->app = 'Taller';
        $usuario->apm = 'Voleibol';
        $usuario->email = 'docente@talleres.com';
        $usuario->password = 'docente';
        $usuario->carrera = 'Mtro. Educación Motriz';
        $usuario->matricula = '000000000';
        $usuario->nss = '49180365114';
        $usuario->fecha_nac = '2001-01-01';
        $usuario->sexo = 'F';
        $usuario->genero = 'NB';
        $usuario->rol_id = '2';
        $usuario->save();

        //  Docente
        $usuario = new User();
        $usuario->name = 'Alumno';
        $usuario->app = '-';
        $usuario->apm = 'UTVT';
        $usuario->email = 'alumno@talleres.com';
        $usuario->password = 'alumno';
        $usuario->carrera = 'Ingenieria en Desarrollo y Gestión de Software';
        $usuario->matricula = '000000000';
        $usuario->nss = '49180365115';
        $usuario->fecha_nac = '2001-01-01';
        $usuario->sexo = 'F';
        $usuario->genero = 'NB';
        $usuario->rol_id = '3';
        $usuario->save();
    }
}
