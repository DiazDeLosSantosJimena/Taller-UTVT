<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Avisos extends Model
{
    use HasFactory, HasApiTokens;
    
    protected $fillable = ['user_id', 'taller_id', 'titulo', 'descripcion', 'imagen'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function taller()
    {
        return $this->belongsTo(Talleres::class, 'taller_id');
    }
}