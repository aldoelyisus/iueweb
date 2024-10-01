<?php
// app/Models/Aspirante.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aspirante extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nombrecompleto',
        'edad',
        'telefono',
        'email',
        'nombre_servicio',
        'nombre_programa',
    ];

    public function servicios()
    {
        return $this->belongsToMany(Servicio::class, 'aspirante_servicio');
    }

    public function programas()
    {
        return $this->belongsToMany(Programa::class, 'aspirante_programa');
    }
}