<?php

namespace App\Http\services; // La 's' de services debe ser minúscula como en tu carpeta
use App\Models\inventario_movimientos;
use Illuminate\Pagination\LengthAwarePaginator;

class InventarioMovimientosService
{
    public function getAll(): LengthAwarePaginator
    {
        $query = inventario_movimientos::latest();
        return $query ->paginate(inventario_movimientos::PAGINATE);
    }

    public function find(int $id): inventario_movimientos
    {
        return inventario_movimientos::findOrFail($id);
    }

    public function createInventarioMovimiento(array $data): inventario_movimientos
    {
        return inventario_movimientos::create($data);
    }

    public function updateInventarioMovimiento(int $id, array $data): bool
    {
        return inventario_movimientos::where('id', $id)->update($data);
    }

    public function deleteInventarioMovimiento(int $id): bool
    {
        return inventario_movimientos::where('id', $id)->delete();
    }
       
}