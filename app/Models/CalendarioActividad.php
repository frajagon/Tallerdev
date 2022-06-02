<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarioActividad extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = [
        'nombre_actividad',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'estado'
    ];

    protected $table = 'calendario_actividades_detalle';
    
}
