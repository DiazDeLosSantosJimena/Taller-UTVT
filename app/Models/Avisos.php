<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avisos extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'taller_id', 'titulo', 'descripcion', 'imagen'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function taller()
    {
        return $this->belongsTo(Talleres::class, 'id');
    }
}