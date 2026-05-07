<?php

namespace App\Http\Requests\cita_servicio;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateCitaServicioRequest extends FormRequest
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
             // llaves foráneas
            'id_cita' => 'required|exists:citasses,id',
            'id_servicio' => 'required|exists:servicios,id',
        ];
    }
}
