<?php

namespace App\Http\Requests\cancelar_citas;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateCancelarCitaRequest extends FormRequest
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
            'id' => 'required|integer|unique:cancelar_citas,id',
            'motivo' => 'required|string|max:255',
            'fecha_cancelacion' => 'required|date',
            'id_cita' => 'required|exists:citasses,id',
        ];
    }
}
