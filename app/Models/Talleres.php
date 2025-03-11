<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Talleres extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'nombre_taller',
        'descripcion',
        'horarios_img',
        'imagen',
        'tipo',
        'estatus'
    ];

    public function AlumnoTaller() {
        return $this->hasOne(AlumnoTaller::class,'taller_id','id');

    }

    public function DocenteTaller() {
        return $this->hasOne(DocenteTaller::class,'taller_id','id');

    }
}
