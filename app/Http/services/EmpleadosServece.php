<?php

namespace App\Http\Services;

use App\Models\Empleado;
use Illuminate\Support\Facades\Log;

class EmpleadoService
{
    /**
     * Obtener todos los empleados con paginación.
     */
    public function getAll()
    {
        return Empleado::orderBy('id', 'desc')->paginate(10);
    }

    /**
     * Buscar un empleado por su ID.
     */
    public function find(int $id)
    {
        return Empleado::findOrFail($id);
    }

    /**
     * Crear un nuevo empleado.
     */
    public function createEmpleado(array $data)
    {
        try {
            return Empleado::create($data);
        } catch (\Exception $e) {
            Log::error("Error al crear empleado: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Actualizar un empleado existente.
     */
    public function updateEmpleado(int $id, array $data)
    {
        try {
            $empleado = $this->find($id);
            $empleado->update($data);
            return $empleado;
        } catch (\Exception $e) {
            Log::error("Error al actualizar empleado ID {$id}: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Eliminar un empleado.
     */
    public function deleteEmpleado(int $id)
    {
        try {
            $empleado = $this->find($id);
            return $empleado->delete();
        } catch (\Exception $e) {
            Log::error("Error al eliminar empleado ID {$id}: " . $e->getMessage());
            return false;
        }
    }
}