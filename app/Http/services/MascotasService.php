<?php

namespace App\Http\services; // La 's' de services debe ser minúscula como en tu carpeta
use App\Models\mascota;
use Illuminate\Pagination\LengthAwarePaginator;

class MascotasService
{
    public function getAll(): LengthAwarePaginator
    {
        $query = mascota::latest();
        return $query ->paginate(mascota::PAGINATE);
    }

    public function find(int $id): mascota
    {
        return mascota::findOrFail($id);
    }

    public function createMascota(array $data): mascota
    {
        return mascota::create($data);
    }

    public function updateMascota(int $id, array $data): bool
    {
        return mascota::where('id', $id)->update($data);
    }

    public function deleteMascota(int $id): bool
    {
        return mascota::where('id', $id)->delete();
    }
       
}