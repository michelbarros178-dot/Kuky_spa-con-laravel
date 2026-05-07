<?php

namespace App\Http\Requests\inventario_movimientos;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateInventarioMovimientosRequest extends FormRequest
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
            'tipo_movimiento' => 'required|enum:entrada,salida',
            'cantidad' => 'nullable|integer|max:100',
            'fecha_movimiento' => 'nullable|dateTime|date_format:Y-m-d H:i:s',
            
            //las siguientes reglas aseguran que el ID de producto exista en susrespectiva tabla
            'id_producto' => 'required|exists:productos,id',
        ];
    }
}
