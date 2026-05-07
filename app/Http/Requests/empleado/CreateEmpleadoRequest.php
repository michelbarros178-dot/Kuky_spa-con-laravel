<?php

namespace App\Http\Requests\empleados;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateEmpleadoRequest extends FormRequest
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
            'nombre_completo' => 'required|string|max:100',
            'especialidad' => 'nullable|string|max:100',
            'telefono' => 'nullable|string|max:20',
            
            //las siguientes reglas aseguran que los IDs de rol y usuario existan en sus respectivas tablas
            'id_rol' => 'required|exists:rols,id',
            'id_usuario' => 'required|exists:users,id',
            
        ];
    }
}
