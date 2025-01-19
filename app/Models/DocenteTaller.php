<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocenteTaller extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'taller_id'
    ];

    public function Talleres() {
        return $this->belongsTo(Talleres::class,'taller_id');
    }

    public function User() {
        return $this->belongsTo(User::class,'user_id');
    }
}
