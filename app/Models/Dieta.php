<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dieta extends Model
{
    use HasFactory;
    public $fillable = 
    [
        "nombre",
        "tipo_diabetes",
        "fecha_fin"
    ];

    public function alimentos()
    {
        return $this->belongsToMany(Alimento::class);
    }

}
