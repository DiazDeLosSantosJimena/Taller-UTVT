<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;
    protected $fillable = [
        'alumtalle_id',
        'fecha'
    ];

    public function AlumnoTaller() {
        return $this->belongsTo(AlumnoTaller::class,'alumtalle_id');
    }
}
