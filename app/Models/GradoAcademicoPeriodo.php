<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradoAcademicoPeriodo extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = [
        'nombre',
        'fecha_inicio',
        'fecha_fin',
        'estado'
    ];

    protected $table = 'grados_academicos_periodos';

    //Relacion con la tabla docentes
    public function docente()
    {
        return $this->belongsTo(Docente::class, "id_docente");
    }

    //Relacion con la tabla grados_academicos
    public function gradosacademicos()
    {
        return $this->belongsTo(GradoAcademico::class, "id_grado_academico");
    }

    //Relacion con la tabla grupos
    public function grupos()
    {
        return $this->belongsTo(Grupo::class, "id_grupo");
    }
}
