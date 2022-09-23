<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePeriodoLectivoRequest extends FormRequest
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
            'anio_academico' => 'required|integer',
            'periodo_academico_id' => 'required|integer',
            'fecha_inicio_activo' => 'required|date',
            'fecha_fin_activo' => 'required|date'
        ];
    }
}
