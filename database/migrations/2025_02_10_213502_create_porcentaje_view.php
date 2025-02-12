<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW asistencia_porcentaje AS
            SELECT 
                at.user_id,
                COUNT(a.id) AS total_asistencias,
                (SELECT COUNT(DISTINCT WEEK(fecha)) 
                 FROM asistencia 
                 WHERE periodo_id = p.id) AS total_semanas,
                (COUNT(a.id) * 100.0 / NULLIF((SELECT COUNT(DISTINCT WEEK(fecha)) 
                                               FROM asistencia 
                                               WHERE periodo_id = p.id), 0)) AS porcentaje_asistencia
            FROM alumno_tallers at
            LEFT JOIN asistencia a ON at.id = a.alumtalle_id
            LEFT JOIN periodos p ON a.periodo_id = p.id
            GROUP BY at.user_id, p.id;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS asistencia_porcentaje");
    }
};
