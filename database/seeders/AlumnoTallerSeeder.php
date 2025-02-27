<?php

namespace Database\Seeders;

use App\Models\Talleres;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlumnoTallerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener todos los IDs de la tabla "usuarios"
        $talleres = Talleres::all();

        foreach ($talleres as $taller) {

            // Seleccionar 3 alumnos aleatorios
            $alumnos = User::where('rol_id','3')->inRandomOrder()->limit(3)->pluck('id');

            foreach ($alumnos as $alumno_id) {
                \DB::table('alumno_tallers')->insert([
                    'user_id' => $alumno_id,
                    'taller_id' => $taller->id,
                    'constancia' => 0,
                    'estatus' => 'Activo',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
