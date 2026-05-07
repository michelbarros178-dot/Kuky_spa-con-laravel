<?php

namespace App\Http\Controllers;

use App\Models\confirmacion_cita;
use App\Http\services\ConfirmacionCitasService;
use App\Http\Requests\confirmacion_citas\CreateConfirmacionCitasRequest;
use App\Http\Requests\confirmacion_citas\UpdateConfirmacionCitasRequest;
use Illuminate\Http\Request;

class ConfirmacionCitaController extends Controller
{
    public function __construct(protected ConfirmacionCitasService $Service)
    {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // CORREGIDO: Plural para la colección
        $confirmacion_citas = $this->Service->getAll();
        return view('app.back.confirmacion_citas.ConfirmacionCitas', compact('confirmacion_citas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Nota: Revisa si el archivo es 'form' o 'from'
        return view('app.back.confirmacion_citas.from', ['confirmacion_cita' => new confirmacion_cita()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateConfirmacionCitasRequest $request) // CORREGIDO: Request específico
    {
        $this->Service->createConfirmacionCita($request->validated());
        return redirect()->route('confirmacion_citas.ConfirmacionCitas')->with('success', 'Confirmación de cita creada exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        // CORREGIDO: Singular para un solo registro
        $confirmacion_cita = $this->Service->find($id);
        return view('app.back.confirmacion_citas.from', compact('confirmacion_cita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConfirmacionCitasRequest $request, int $id) // CORREGIDO: Lógica implementada
    {
        $this->Service->updateConfirmacionCita($id, $request->validated());
        return redirect()->route('confirmacion_citas.ConfirmacionCitas')->with('success', 'Confirmación actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id) // CORREGIDO: Lógica implementada
    {
        $this->Service->deleteConfirmacionCita($id);
        return redirect()->route('confirmacion_citas.ConfirmacionCitas')->with('success', 'Confirmación eliminada exitosamente.');
    }
}