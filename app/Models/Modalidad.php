<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modalidad extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'modalidades'; // Nombre de la tabla

    protected $fillable = [
        'titulo',
        'subtitulo',
        'titulo_perfil_ingreso',
        'desc_perfil_ingreso',
        'link_img_perfil_ingreso',
        'titulo_perfil_egreso',
        'desc_perfil_egreso',
        'link_img_perfil_egreso',
        'titulo_mapa_curricular',
        'desc_mapa_curricular',
        'link_img_mapa_curricular',
        'link_video_clase_muestra',
        'link_img_extra',
        'desc_extra',
    ];

    protected $dates = ['deleted_at'];

    // Mutador para asegurar que el título siempre tenga la letra inicial en mayúscula
    public function setTituloAttribute($value)
    {
        $this->attributes['titulo'] = ucfirst($value);
    }

    public function servicios()
    {
        return $this->belongsToMany(Servicio::class, 'servicio_modalidad');
    }

    public function programas()
    {
        return $this->belongsToMany(Programa::class, 'modalidad_programa');
    }
}