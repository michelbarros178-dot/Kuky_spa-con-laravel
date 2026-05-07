<?php

namespace App\Http\Requests\facturas;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateFacturasRequest extends FormRequest
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
            'fecha_emision' => 'required|string|max:100',
            'total' => 'nullable|string|max:100',
            
            'id_cita' => 'required|integer|exists:citas,id',
        ];
    }
}
