<?php

namespace App\Http\services; // La 's' de services debe ser minúscula como en tu carpeta
use App\Models\cita_servicio;
use Illuminate\Pagination\LengthAwarePaginator;

class CitaServicioService
{
    public function getAll(): LengthAwarePaginator
    {
        $query = cita_servicio::latest();
        return $query ->paginate(cita_servicio::PAGINATE);
    }

    public function find(int $id): cita_servicio
    {
        return cita_servicio::findOrFail($id);
    }

    public function createCitaServicio(array $data): cita_servicio
    {
        return cita_servicio::create($data);
    }

    public function updateCitaServicio(int $id, array $data): bool
    {
        return cita_servicio::where('id', $id)->update($data);
    }

    public function deleteCitaServicio(int $id): bool
    {
        return cita_servicio::where('id', $id)->delete();
    }
       
}