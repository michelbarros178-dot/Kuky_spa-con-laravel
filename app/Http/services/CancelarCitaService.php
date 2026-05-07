<?php

namespace App\Http\services; // La 's' de services debe ser minúscula como en tu carpeta
use App\Models\cancelar_cita;
use Illuminate\Pagination\LengthAwarePaginator;

class CancelarCitaService
{
    public function getAll(): LengthAwarePaginator
    {
        $query = cancelar_cita::latest();
        return $query ->paginate(cancelar_cita::PAGINATE);
    }

    public function find(int $id): cancelar_cita
    {
        return cancelar_cita::findOrFail($id);
    }

    public function createCancelarCita(array $data): cancelar_cita
    {
        return cancelar_cita::create($data);
    }

    public function updateCancelarCita(int $id, array $data): bool
    {
        return cancelar_cita::where('id', $id)->update($data);
    }

    public function deleteCancelarCita(int $id): bool
    {
        return cancelar_cita::where('id', $id)->delete();
    }
       
}