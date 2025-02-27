<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $faker = Faker::create();
        $nss = 49180000000;
        $carrera = [
            'T.S.U Mantenimiento, Área industrial.',
            'T.S.U Mecatrónica, Área Sistermas Manufactura Flexible.',
            'T.S.U Tecnologías de la información, Área infraestructura de Redes Digitales.',
            'T.S.U Procesos Industriales, Área Manufactura.',
            'T.S.U Química, Área Tecnología Ambiental.',
            'T.S.U Paramédico.',
            'T.S.U Desarrollo de Negocios, Área Ventas.',
            'ING. Mantenimiento Industrial.',
            'ING. Mecatrónica.',
            'ING. Redes Inteligentes y Ciberseguridad.',
            'ING. Sistemas Productivos.',
            'ING. Tecnología Ambiental.',
            'LIC. Protección Civil y Emergencias.',
            'LIC. Innovación de Negocios y Mercadotecnica.',
            'LIC. Enfermería.'
        ];

        //  Administrador
        $usuario = new User();
        $usuario->name = 'Administrador';
        $usuario->app = 'Sistemas';
        $usuario->apm = 'Talleres';
        $usuario->email = 'admin@utvt.com';
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
        for($i = 1; $i <= 9; $i++) {
            $usuario = new User();
            $usuario->name = 'Docente';
            $usuario->app = $i;
            $usuario->apm = 'UTVT';
            $usuario->email = 'docente'.$i.'@utvt.com';
            $usuario->password = 'docente'.$i;
            $usuario->carrera = 'Mtro. Educación Motriz';
            $usuario->matricula = '000000000';
            $usuario->nss = $nss++;
            $usuario->fecha_nac = '2001-01-01';
            $usuario->sexo = 'F';
            $usuario->genero = 'NB';
            $usuario->rol_id = '2';
            $usuario->save();
        }

        //  Alumno
        $sexo = ['F', 'M'];
        for($i = 1; $i <= 27; $i++) {
            $usuario = new User();
            $usuario->name = 'Alumno';
            $usuario->app = $i;
            $usuario->apm = 'UTVT';
            $usuario->email = 'alumno'.$i.'@utvt.com';
            $usuario->password = 'alumno'.$i;
            $usuario->carrera = $carrera[array_rand($carrera)];
            $usuario->matricula = '00000000'.$i;
            $usuario->nss = $nss++;
            $usuario->fecha_nac = $faker->dateTimeBetween('2003-01-01', '2006-01-01');
            $usuario->sexo = $sexo[array_rand($sexo)];
            $usuario->genero = 'SN';
            $usuario->rol_id = '3';
            $usuario->save();
            }
    }
}
