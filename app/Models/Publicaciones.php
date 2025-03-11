<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Publicaciones extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'user_id',
        'titulo',
        'descripcion',
        'tipo',
        'imagen',
    ];

    public function User() {
        return $this->belongsTo(User::class,'user_id');
    }
}
