<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDocenteRequest extends FormRequest
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
            'apellido' => 'required',
            'nombre' => 'required',
            'nro_documento' => 'required',
            //'email' => 'required|unique:docentes'
            'email' => [
                'required',
                 Rule::unique('docentes')->ignore($this->id),
                'email'
            ],
        ];
    }
}
