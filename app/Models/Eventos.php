<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Eventos extends Model
{
    use HasFactory, HasApiTokens;

    // Agregar 'user_id' a la propiedad fillable
    protected $fillable = [
        'user_id',  // Agrega el campo 'user_id'
        'titulo',
        'imagen',
    ];
}
