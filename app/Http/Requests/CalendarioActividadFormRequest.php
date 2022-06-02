<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalendarioActividadFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre_actividad' => 'required',
            'descripcion' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nombre_actividad.required' => 'El campo "Nombre actividad" debe ser diligenciado',
            'descripcion.required' => 'El campo "Descripción" debe ser diligenciado',
            'fecha_inicio.required' => 'El campo "Fecha de Inicio" debe ser diligenciado',
            'fecha_fin.required' => 'El campo "Fecha fin" debe ser diligenciado',
        ];
    }
}
