<?php

namespace App\Http\services; // La 's' de services debe ser minúscula como en tu carpeta
use App\Models\pago;
use Illuminate\Pagination\LengthAwarePaginator;

class PagosService
{
    public function getAll(): LengthAwarePaginator
    {
        $query = pago::latest();
        return $query ->paginate(pago::PAGINATE);
    }

    public function find(int $id): pago
    {
        return pago::findOrFail($id);
    }

    public function createPagos(array $data): pago
    {
        return pago::create($data);
    }

    public function updatePagos(int $id, array $data): bool
    {
        return pago::where('id', $id)->update($data);
    }

    public function deletePagos(int $id): bool
    {
        return pago::where('id', $id)->delete();
    }
       
}