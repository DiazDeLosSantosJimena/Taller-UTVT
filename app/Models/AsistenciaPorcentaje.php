<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsistenciaPorcentaje extends Model
{
    protected $table = 'asistencia_porcentaje'; // Nombre de la vista en la BD
    public $timestamps = false; // No tiene created_at ni updated_at
}
