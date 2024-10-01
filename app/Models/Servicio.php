<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Servicio extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'servicios'; // Nombre de la tabla

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    protected $dates = ['deleted_at'];
}