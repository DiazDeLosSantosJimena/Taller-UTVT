<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;
    protected $table = 'asistencia';

    protected $fillable = [
        'alumtalle_id',
        'periodo_id',
        'fecha'
    ];

    public function AlumnoTaller() {
        return $this->belongsTo(AlumnoTaller::class,'alumtalle_id');
    }

    public function periodoAsistencia() {
        return $this->belongsTo(Periodo::class,'periodo_id');
    }
}
