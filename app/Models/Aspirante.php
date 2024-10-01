<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aspirante extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'aspirantes'; // Nombre de la tabla

    protected $fillable = [
        'nombre_completo',
        'edad',
        'telefono',
        'email',
        'servicio_interes',
    ];

    protected $dates = ['deleted_at'];
}