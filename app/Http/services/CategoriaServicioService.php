<?php

namespace App\Http\services; // La 's' de services debe ser minúscula como en tu carpeta
use App\Models\categoria_servicio;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoriaServicioService
{
    public function getAll(): LengthAwarePaginator
    {
        $query = categoria_servicio::latest();
        return $query ->paginate(categoria_servicio::PAGINATE);
    }


    public function find(int $id): categoria_servicio
    {
        return categoria_servicio::findOrFail($id);
    }

    public function createcategoria_servicio(array $data): categoria_servicio
    {
        return categoria_servicio::create($data);
    }

    public function updatecategoria_servicio(int $id, array $data): bool
    {
        return categoria_servicio::where('id', $id)->update($data);
    }

    public function deletecategoria_servicio(int $id): bool
    {
        return categoria_servicio::where('id', $id)->delete();
    }
       
}