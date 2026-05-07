<?php

namespace App\Http\Requests\historial_mascotas;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateHistorialMascotasRequest extends FormRequest
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
            'descripcion' => 'required|string|max:100',
            'fecha_registro' => 'nullable|string|max:100',
            
            //las siguientes reglas aseguran que los IDs de rol y usuario existan en sus respectivas tablas
            'id_mascota' => 'required|exists:mascotas,id',
            'id_cita' => 'required|exists:citasses,id',

        ];
    }
}
