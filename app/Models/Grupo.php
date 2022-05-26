<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = [
        'codigo',
        'nombre',
        'estado'
    ];

    //Relacion con la tabla GradoAcademicoPeriodo
    public function gradoacademicoperiodos()
    {
        return $this->hasMany(GradoAcademicoPeriodo::class, "id");
    }
}
