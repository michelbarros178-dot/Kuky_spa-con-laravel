<?php

namespace App\Http\services; // La 's' de services debe ser minúscula como en tu carpeta
use App\Models\confirmacion_cita;
use Illuminate\Pagination\LengthAwarePaginator;

class ConfirmacionCitasService
{
    public function getAll(): LengthAwarePaginator
    {
        $query = confirmacion_cita::latest();
        return $query ->paginate(confirmacion_cita::PAGINATE);
    }

    public function find(int $id): confirmacion_cita
    {
        return confirmacion_cita::findOrFail($id);
    }

    public function createConfirmacionCita(array $data): confirmacion_cita
    {
        return confirmacion_cita::create($data);
    }

    public function updateConfirmacionCita(int $id, array $data): bool
    {
        return confirmacion_cita::where('id', $id)->update($data);
    }

    public function deleteConfirmacionCita(int $id): bool
    {
        return confirmacion_cita::where('id', $id)->delete();
    }
       
}