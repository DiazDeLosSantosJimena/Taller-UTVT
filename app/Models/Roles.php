<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Roles extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'name',
    ];

    public function User() {
        return $this->hasMany(User::class,'rol_id','id');

    }
}
