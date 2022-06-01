<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradoAcademicoPeriodoDetalle extends Model
{
    use HasFactory;
    
    public $timestamps = true;
    protected $fillable = [
        'estado'
    ];

    protected $table = 'grados_academicos_periodos_estudiantes';
}
