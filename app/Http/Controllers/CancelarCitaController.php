<?php

namespace App\Http\Controllers;
use App\Models\cancelar_cita;
use App\Http\services\CancelarCitaService;
use App\Http\Requests\cancelar_citas\CreateCancelarCitaRequest;
use App\Http\Requests\cancelar_citas\UpdateCancelarCitaRequest;

use Illuminate\Http\Request; 

class CancelarCitaController extends Controller
{
        public function __construct(protected CancelarCitaService $Service)
        {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cancelar_citas = $this->Service->getAll(); 
    
    // Verifica que la ruta sea: carpeta back -> carpeta admin -> archivo admin.blade.php
    return view('app.back.cancelar_cita.cancelarCita', compact('cancelar_citas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.back.cancelar_cita.from', ['cancelar_cita' => new cancelar_cita()]); // Asegúrate de tener esta vista creada
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(CreateCancelarCitaRequest $request) // <-- Cambiado
{
    $this->Service->createCancelarCita($request->validated());
    return redirect()->route('cancelar_cita.index')->with('success', '...');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $cancelar_cita = $this->Service->find($id);
        return view('app.back.cancelar_cita.from', compact('cancelar_cita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCancelarCitaRequest $request, int $id)
    {
        $this->Service->updateCancelarCita($id, $request->validated());
        return redirect()->route('cancelar_cita.cancelarCita')->with('success', 'Cancelar Cita actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->Service->deleteCancelarCita($id);
        return redirect()->route('cancelar_cita.cancelarCita')->with('success', 'Cancelar Cita eliminada exitosamente.');
    }
}
