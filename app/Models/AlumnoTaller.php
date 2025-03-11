<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class AlumnoTaller extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'user_id',
        'taller_id',
        'constancia',
        'estatus'
    ];

    public function Talleres() {
        return $this->belongsTo(Talleres::class,'taller_id');
    }

    public function User() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function Asistencia() {
        return $this->hasMany(Asistencia::class,'alumtalle_id', 'id');
    }
}
