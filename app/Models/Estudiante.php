<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = [
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'fecha_nacimiento',
        'numero_identificacion',
        'estado'
    ];

    //Relacion con la tabla Acudiente
    public function acudiente()
    {
        return $this->belongsTo(Acudiente::class, "id_acudiente");
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

    public function scopeNumeroIdentificacion($query, $numero_identificacion)
    {
        if($numero_identificacion)
            return  $query->where('numero_identificacion', 'LIKE', "%$numero_identificacion%");

    }

    public function scopeNombres($query, $valor)
    {
        if($valor)
            return  $query->where('primer_nombre', 'LIKE', "%$valor%");

    }

    public function scopeApellidos($query, $valor)
    {
        if($valor)
            return  $query->where('primer_apellido', 'LIKE', "%$valor%");

    }
}
