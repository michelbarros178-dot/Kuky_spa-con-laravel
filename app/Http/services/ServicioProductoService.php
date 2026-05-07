<?php

namespace App\Http\services; // La 's' de services debe ser minúscula como en tu carpeta
use App\Models\servicio_producto;
use Illuminate\Pagination\LengthAwarePaginator;

class ServicioProductoService
{
    public function getAll(): LengthAwarePaginator
    {
        $query = servicio_producto::latest();
        return $query ->paginate(servicio_producto::PAGINATE);
    }

    public function find(int $id): servicio_producto
    {
        return servicio_producto::findOrFail($id);
    }

    public function createServicioProducto(array $data): servicio_producto
    {
        return servicio_producto::create($data);
    }

    public function updateServicioProducto(int $id, array $data): bool
    {
        return servicio_producto::where('id', $id)->update($data);
    }

    public function deleteServicioProducto(int $id): bool
    {
        return servicio_producto::where('id', $id)->delete();
    }
       
}