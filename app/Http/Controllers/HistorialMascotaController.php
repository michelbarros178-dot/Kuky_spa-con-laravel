<?php

namespace App\Http\Controllers;

use App\Models\historial_mascota;
use App\Http\services\HistorialMascotasService;
use App\Http\Requests\historial_mascotas\CreateHistorialMascotasRequest;
use App\Http\Requests\historial_mascotas\UpdateHistorialMascotasRequest;
use Illuminate\Http\Request;

class HistorialMascotaController extends Controller
{
    public function __construct(protected HistorialMascotasService $Service)
    {}

    public function index()
    {
        $historial_mascotas = $this->Service->getAll();
        return view('app.back.historial_mascotas.HistorialMascotas', compact('historial_mascota'));
    }

    public function create()
    {
        // Se envía como 'historial' para simplificar en la vista 'from'
        return view('app.back.historial_mascotas.from', ['historial_mascota' => new historial_mascota()]);
    }

    public function store(CreateHistorialMascotasRequest $request) 
    {
        $this->Service->createHistorialMascotas($request->validated());
        return redirect()->route('historial_mascotas.HistorialMascotas')->with('success', 'Historial creado exitosamente.');
    }

    public function edit(int $id)
    {
        $historial = $this->Service->find($id);
        return view('app.back.historial_mascotas.from', compact('historial_mascota'));
    }

    public function update(UpdateHistorialMascotasRequest $request, int $id) 
    {
        $this->Service->updateHistorialMascotas($id, $request->validated());
        return redirect()->route('historial_mascotas.HistorialMascotas')->with('success', 'Historial actualizado.');
    }

    public function destroy(int $id) 
    {
        $this->Service->deleteHistorialMascotas($id);
        return redirect()->route('historial_mascotas.HistorialMascotas')->with('success', 'Historial eliminado.');
    }
}