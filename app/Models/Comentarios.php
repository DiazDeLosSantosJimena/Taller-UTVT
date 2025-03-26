<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    use HasFactory;

    protected $fillable = ['alumno_taller_id', 'fecha', 'comentario'];

    public function alumno_taller()
    {
        return $this->hasOne(AlumnoTaller::class, 'id');
    }

}
