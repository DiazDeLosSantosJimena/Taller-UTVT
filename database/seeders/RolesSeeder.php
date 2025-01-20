<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //  Tipos de usuarios
        $tipo = new Roles();
        $tipo->name = 'Administrador';
        $tipo->save();

        $tipo = new Roles();
        $tipo->name = 'Docente';
        $tipo->save();

        $tipo = new Roles();
        $tipo->name = 'Alumno';
        $tipo->save();
    }
}
