<?php

namespace App\Http\services; // La 's' de services debe ser minúscula como en tu carpeta
use App\Models\servicio;
use Illuminate\Pagination\LengthAwarePaginator;

class ServiciosService
{
    public function getAll(): LengthAwarePaginator
    {
        $query = servicio::latest();
        return $query ->paginate(servicio::PAGINATE);
    }

    public function find(int $id): servicio
    {
        return servicio::findOrFail($id);
    }

    public function createServicio(array $data): servicio
    {
        return servicio::create($data);
    }

    public function updateServicio(int $id, array $data): bool
    {
        return servicio::where('id', $id)->update($data);
    }

    public function deleteServicio(int $id): bool
    {
        return servicio::where('id', $id)->delete();
    }
       
}