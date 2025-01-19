<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talleres extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_taller',
        'horarios',
        'ubicacion'
    ];

    public function AlumnoTaller() {
        return $this->hasOne(AlumnoTaller::class,'taller_id','id');

    }

    public function DocenteTaller() {
        return $this->hasOne(DocenteTaller::class,'taller_id','id');

    }
}
