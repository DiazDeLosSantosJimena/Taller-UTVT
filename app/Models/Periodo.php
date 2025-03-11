<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Periodo extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'fecha_inicio',
        'fecha_fin'
    ];

    public function Asistencia() {
        return $this->hasMany(Asistencia::class,'periodo_id','id');
    }
}
