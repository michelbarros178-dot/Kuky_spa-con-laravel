<?php

namespace App\Http\Services; // La 's' de services debe ser minúscula como en tu carpeta
use App\Models\rol;
use Illuminate\Pagination\LengthAwarePaginator;

class RolServices
{
    public function getAll(): LengthAwarePaginator
    {
        $query = rol::latest();
        return $query ->paginate(rol::PAGINATE);
    }

    public function find(int $id): rol  
    {
        return rol::findOrFail($id);
    }

    public function createRol(array $data): rol
    {
        return rol::create($data);
    }

    public function updateRol(int $id, array $data): bool
    {
        return rol::where('id', $id)->update($data);
    }

    public function deleteRol(int $id): bool
    {
        return rol::where('id', $id)->delete();
    }
       
}