<?php

namespace App\Http\Requests\admin;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateAdminRequest extends FormRequest
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
            'email' => 'required|string|email|max:255|unique:users',
            'telefono' => 'required|string|max:20|nullable',

            // llaves foráneas
            'id_rol' => 'required|exists:rols,id',
            'password' => 'required|string|min:8',
 
        ];
    }
}
