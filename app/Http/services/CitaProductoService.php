<?php

namespace App\Http\services; // La 's' de services debe ser minúscula como en tu carpeta
use App\Models\cita_producto;
use Illuminate\Pagination\LengthAwarePaginator;

class CitaProductoService
{
    public function getAll(): LengthAwarePaginator
    {
        $query = cita_producto::latest();
        return $query ->paginate(cita_producto::PAGINATE);
    }

    public function find(int $id): cita_producto
    {
        return cita_producto::findOrFail($id);
    }

    public function createCitaProducto(array $data): cita_producto
    {
        return cita_producto::create($data);
    }

    public function updateCitaProducto(int $id, array $data): bool
    {
        return cita_producto::where('id', $id)->update($data);
    }

    public function deleteCitaProducto(int $id): bool
    {
        return cita_producto::where('id', $id)->delete();
    }
       
}