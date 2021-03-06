<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradoAcademico extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = [
        'nombre',
        'descripcion',
        'orden',
        'estado'
    ];

    protected $table = 'grados_academicos';

    //Relacion con la tabla GradoAcademicoPeriodo
    public function gradoacademicoperiodos()
    {
        return $this->hasMany(GradoAcademicoPeriodo::class, "id");
    }
}
