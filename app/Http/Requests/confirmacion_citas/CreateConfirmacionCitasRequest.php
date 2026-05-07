<?php

namespace App\Http\Requests\confirmacion_citas;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateConfirmacionCitasRequest extends FormRequest
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
            'fecha_confirmacion' => 'required|date',
             // llaves foráneas
            'id_cita' => 'required|exists:citasses,id',

        ];
    }
}
