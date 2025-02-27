<?php

namespace Database\Seeders;

use App\Models\Talleres;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TalleresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //  Futbol
        $taller = new Talleres();
        $taller->nombre_taller = 'Futbol';
        $taller->descripcion = 'Deporte de equipo donde 11 jugadores buscan anotar goles pateando un balón en la portería contraria. Se juega en una cancha rectangular y gana el equipo con más goles.';
        $taller->horarios_img = 'FUTBOL.jpg';
        $taller->imagen = 'futbolSoccer.jpg';
        $taller->tipo = 'Deportivo';
        $taller->estatus = 'Activo';
        $taller->save();

        //  Basquetbol
        $taller = new Talleres();
        $taller->nombre_taller = 'Basquetbol';
        $taller->descripcion = 'Deporte de equipo donde 5 jugadores buscan anotar puntos en una canasta contraria. Se juega en una cancha rectangular y gana el equipo con más puntos.';
        $taller->horarios_img = 'BASQUETBOL.jpg';
        $taller->imagen = 'basquetbol.jpg';
        $taller->tipo = 'Deportivo';
        $taller->estatus = 'Activo';
        $taller->save();

        //  Voleibol
        $taller = new Talleres();
        $taller->nombre_taller = 'Voleibol';
        $taller->descripcion = 'Es un deporte donde dos equipos se enfrentan sobre un terreno de juego liso separados por una red central, tratando de pasar el balón por encima de la red hacia el suelo del campo contrario.';
        $taller->horarios_img = 'VOLEIBOL.jpg';
        $taller->imagen = 'voleibol.jpg';
        $taller->tipo = 'Deportivo';
        $taller->estatus = 'Activo';
        $taller->save();

        //  Tocho Bandera
        $taller = new Talleres();
        $taller->nombre_taller = 'Tocho Bandera';
        $taller->descripcion = 'Es un deporte de equipo donde dos equipos buscan anotar puntos llevando un balón hacia la zona de anotación contraria. Se juega en una cancha rectangular y gana el equipo con más puntos.';
        $taller->horarios_img = 'TOCHO_BANDERA.jpg';
        $taller->imagen = 'tocho.jpg';
        $taller->tipo = 'Deportivo';
        $taller->estatus = 'Activo';
        $taller->save();

        //  Danza
        $taller = new Talleres();
        $taller->nombre_taller = 'Danza';
        $taller->descripcion = 'Es una forma de arte que se refiere al movimiento del cuerpo rítmicamente en un espacio determinado, con el propósito de expresar una idea o sentimiento, liberar energía, o simplemente disfrutar del movimiento.';
        $taller->horarios_img = 'DANZA.jpg';
        $taller->imagen = 'danza.jpg';
        $taller->tipo = 'Cultural';
        $taller->estatus = 'Activo';
        $taller->save();

        //  Rondalla
        $taller = new Talleres();
        $taller->nombre_taller = 'Rondalla';
        $taller->descripcion = 'Agrupación musical que interpreta canciones con instrumentos de cuerda, como guitarras y laúdes, generalmente con un estilo romántico y tradicional.';
        $taller->horarios_img = 'RONDALLA.jpg';
        $taller->imagen = 'rondalla.jpg';
        $taller->tipo = 'Cultural';
        $taller->estatus = 'Activo';
        $taller->save();

        //  Teatro
        $taller = new Talleres();
        $taller->nombre_taller = 'Teatro';
        $taller->descripcion = 'Es una forma de arte donde los actores representan una historia o situación frente a un público. Se puede realizar en un escenario o en un espacio abierto.';
        $taller->horarios_img = 'TEATRO.jpg';
        $taller->imagen = 'teatro.jpg';
        $taller->tipo = 'Cultural';
        $taller->estatus = 'Activo';
        $taller->save();

        //  Ortografía y Redacción
        $taller = new Talleres();
        $taller->nombre_taller = 'Ortografía y Redacción';
        $taller->descripcion = 'Taller enfocado en mejorar la escritura y la redacción de textos, así como en el correcto uso de la ortografía y la gramática.';
        $taller->horarios_img = 'ORTOGRAFIA_Y_REDACCION.jpg';
        $taller->imagen = 'redaccion.jpg';
        $taller->tipo = 'Cultural';
        $taller->estatus = 'Activo';
        $taller->save();

        //  Artes Visuales
        $taller = new Talleres();
        $taller->nombre_taller = 'Artes Visuales';
        $taller->descripcion = 'Taller enfocado en la creación de obras de arte visuales, como pinturas, dibujos, esculturas, fotografías, entre otras.';
        $taller->horarios_img = 'ARTES.jpg';
        $taller->imagen = 'artesVisuales.jpg';
        $taller->tipo = 'Cultural';
        $taller->estatus = 'Activo';
        $taller->save();
    }
}
