<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudianteFormRequest extends FormRequest
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
            'primer_nombre' => 'required',
            'primer_apellido' => 'required',
            'numero_identificacion' => 'required',
        ];
    }

    public function messages(){
        return [
            'primer_nombre.required' => 'El campo "Primer Nombre" debe ser diligenciado',
            'primer_apellido.required' => 'El campo "Primer Apellido" debe ser diligenciado',
            'numero_identificacion.required' => 'El campo "Nùmero de Identificaciòn" debe ser diligenciado',
        ];
    }
}
