<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acudiente extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = [
        'id_tipo_identificador',
        'id_genero',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'fecha_nacimiento',
        'numero_identificacion',
        'estado'
    ];
}
