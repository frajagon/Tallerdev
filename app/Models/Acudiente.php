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

    //Relacion con la tabla Asiganacion estudiantes
    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class, "id");
    }


    public function getGetNombresAttribute()
    {
        return $this->primer_nombre . ' ' . $this->segundo_nombre;
    }

    public function getGetApellidosAttribute()
    {
        return $this->primer_apellido . ' ' . $this->segundo_apellido;
    }

    public function getGetNombreCompletoAttribute()
    {
        return $this->primer_nombre . ' ' . $this->segundo_nombre . ' ' . $this->primer_apellido . ' ' . $this->segundo_apellido;
    }

    public function setPrimerNombreAttribute($value)
    {
        $this->attributes['primer_nombre'] = ucfirst(strtolower($value));
    }
}
