<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Programa extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'programas'; // Nombre de la tabla

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    protected $dates = ['deleted_at'];

    // Relaciones
    public function modalidades()
    {
        return $this->belongsToMany(Modalidad::class, 'modalidad_programa');
    }

    public function servicios()
    {
        return $this->belongsToMany(Servicio::class, 'programa_servicio');
    }
}