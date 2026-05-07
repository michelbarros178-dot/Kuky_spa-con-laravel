<?php

namespace App\Http\services; // La 's' de services debe ser minúscula como en tu carpeta
use App\Models\factura;
use Illuminate\Pagination\LengthAwarePaginator;

class FacturasService   
{
    public function getAll(): LengthAwarePaginator
    {
        $query = factura::latest();
        return $query ->paginate(factura::PAGINATE);
    }

    public function find(int $id): factura
    {
        return factura::findOrFail($id);
    }

    public function createFactura(array $data): factura
    {
        return factura::create($data);
    }

    public function updateFactura(int $id, array $data): bool
    {
        return factura::where('id', $id)->update($data);
    }

    public function deleteFactura(int $id): bool
    {
        return factura::where('id', $id)->delete();
    }
       
}