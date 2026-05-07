<?php

namespace App\Http\services; // La 's' de services debe ser minúscula como en tu carpeta
use App\Models\citass;
use Illuminate\Pagination\LengthAwarePaginator;

class CitasService
{
    public function getAll(): LengthAwarePaginator
    {
        $query = citass::latest();
        return $query ->paginate(citass::PAGINATE);
    }

    public function find(int $id): citass
    {
        return citass::findOrFail($id);
    }

    public function createCita(array $data): citass
    {
        return citass::create($data);
    }

    public function updateCita(int $id, array $data): bool
    {
        return citass::where('id', $id)->update($data);
    }

    public function deleteCita(int $id): bool
    {
        return citass::where('id', $id)->delete();
    }
       
}