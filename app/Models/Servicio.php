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
        'requiere_programas',
    ];

    protected $dates = ['deleted_at'];

    // Mutador para asegurar que el nombre siempre tenga la letra inicial en mayúscula
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = ucfirst($value);
    }

    public function modalidades()
    {
        return $this->belongsToMany(Modalidad::class, 'servicio_modalidad');
    }

    public function programas()
    {
        return $this->belongsToMany(Programa::class, 'programa_servicio');
    }
}