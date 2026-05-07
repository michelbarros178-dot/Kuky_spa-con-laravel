<?php

namespace App\Http\Requests\citas;

use Illuminate\Foundation\Http\FormRequest;

class CreateCitasRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Reglas de validación.
     */
    public function rules(): array
    {
        return [
            // Campos principales
            'fecha'    => 'required|string', 
            'hora'     => 'required|string',
            'nombre'   => 'required|string|max:255',
            
            // EL CAMBIO CLAVE: Validar que 'servicio' sea un array (por los checkboxes)
            'servicio' => 'nullable',
            
            // Campos opcionales
            'email'    => 'nullable|email|max:255',
            'telefono' => 'nullable|string|max:20',
            'notas'    => 'nullable|string|max:1000',

            // Si aún usas las llaves foráneas en el mismo formulario, mantenlas:
            // 'id_cliente'  => 'required|exists:clientes,id',
            // 'id_mascota'  => 'required|exists:mascotas,id',
            // 'id_empleado' => 'required|exists:empleados,id',
        ];
    }

    /**
     * Mensajes personalizados (Opcional, para que el error sea más amigable)
     */
    public function messages(): array
    {
        return [
            'servicio.required' => 'Debes seleccionar al menos un servicio.',
            'servicio.array'    => 'El formato de los servicios seleccionados no es válido.',
            'nombre.required'   => 'El nombre de la mascota es obligatorio.',
        ];
    }
}