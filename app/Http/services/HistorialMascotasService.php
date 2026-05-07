<?php

namespace App\Http\services; // La 's' de services debe ser minúscula como en tu carpeta
use App\Models\historial_mascota;
use Illuminate\Pagination\LengthAwarePaginator;

class HistorialMascotasService
{

    public function getAll(): LengthAwarePaginator
    {
        $query = historial_mascota::latest();
        return $query ->paginate(historial_mascota::PAGINATE);
    }

    public function find(int $id): historial_mascota
    {
        return historial_mascota::findOrFail($id);
    }

    public function createHistorialMascotas(array $data): historial_mascota
    {
        return historial_mascota::create($data);
    }

    public function updateHistorialMascotas(int $id, array $data): bool
    {
        return historial_mascota::where('id', $id)->update($data);
    }

    public function deleteHistorialMascotas(int $id): bool
    {
        return historial_mascota::where('id', $id)->delete();
    }
       
}