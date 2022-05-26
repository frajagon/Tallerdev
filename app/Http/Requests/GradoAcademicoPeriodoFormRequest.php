<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GradoAcademicoPeriodoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'id_docente' => 'exists:App\Models\Docente,id',
            'id_grado_academico' => 'exists:App\Models\GradoAcademico,id',
            'id_grupo' => 'exists:App\Models\Grupo,id',
        ];
    }

    public function messages(){
        return [
            'nombre.required' => 'El nombre debe ser un campo obligatorio',
            'fecha_inicio.required' => 'La fecha de inicio es un campo obligatorio',
            'fecha_fin.required' => 'La fecha de final es un campo obligatorio',
            'id_docente.exists' => 'Debe seleccionar uno de los docentes presentes en el campo Docente',
            'id_grado_academico.exists' => 'Debe seleccionar uno de los grados academicos',
            'id_grupo.exists' => 'Debe seleccionar una opciòn del selector de Grupos',
        ];
    }
}
