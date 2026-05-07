<?php

namespace App\Http\Requests\servicios;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateServiciosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre_servicio' => 'required|string|max:100',
            'precio' => 'nullable|decimal:2|max:100',
            
            //las siguientes reglas aseguran que los IDs de rol y usuario existan en sus respectivas tablas
            'id_cat_serv' => 'required|exists:categoria_servicios,id',

        ];
    }
}
