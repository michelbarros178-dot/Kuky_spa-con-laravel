<?php

namespace App\Http\services; 

use App\Models\producto;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductoService
{
    public function getAll(): LengthAwarePaginator
    {
        // Asegúrate de que en tu modelo 'producto' tengas: const PAGINATE = 10;
        $query = producto::latest();
        return $query->paginate(producto::PAGINATE ?? 10);
    }

    public function find(int $id): producto
    {
        return producto::findOrFail($id);
    }

    public function createProducto(array $data): producto
    {
        return producto::create($data);
    }

    public function updateProducto(int $id, array $data): bool
    {
        $producto = $this->find($id);
        return $producto->update($data);
    }

    public function deleteProducto(int $id): bool
    {
        $producto = $this->find($id);
        return $producto->delete();
    }
}