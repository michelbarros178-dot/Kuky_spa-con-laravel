<?php

namespace App\Http\services; // La 's' de services debe ser minúscula como en tu carpeta
use App\Models\cliente;
use Illuminate\Pagination\LengthAwarePaginator;

class ClientesService
{
    public function getAll(): LengthAwarePaginator
    {
        $query = cliente::latest();
        return $query ->paginate(cliente::PAGINATE);
    }

    public function find(int $id): cliente
    {
        return cliente::findOrFail($id);
    }

    public function createCliente(array $data): cliente
    {
        return cliente::create($data);
    }

    public function updateCliente(int $id, array $data): bool
    {
        return cliente::where('id', $id)->update($data);
    }

    public function deleteCliente(int $id): bool
    {
        return cliente::where('id', $id)->delete();
    }
       
}