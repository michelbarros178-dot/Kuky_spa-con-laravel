<?php

namespace App\Http\Controllers;
use App\Models\citass;
use App\Http\services\CitasService;
use App\Http\Requests\citas\CreateCitasRequest;
use App\Http\Requests\citas\UpdateCitasRequest;

use Illuminate\Http\Request;

class CitassController extends Controller
{
        public function __construct(protected CitasService $Service)
        {}
        
    /**
     * Display a listing of the resource.
     */
    public function index() 
{
    // 1. Obtienes los datos
    $citas = $this->Service->getAll(); 

    // 2. IMPORTANTE: Pasarlos a la vista usando compact()
    // Esto hace que $admins esté disponible en admin.blade.php
    return view('app.back.citas.Citas', compact('citas'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.back.citas.from', ['citas' => new citass()]); // Asegúrate de tener esta vista creada
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCitasRequest $request)
    {
        $this->Service->createCita($request->validated());
        return redirect()->route('citas.Citas')->with('success', 'Cita creada exitosamente.');
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
        $cita = $this->Service->find($id);
        return view('app.back.citas.from', compact('cita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCitasRequest $request, int $id)
    {
        $this->Service->updateCita($id, $request->validated());
        return redirect()->route('citas.Citas')->with('success', 'Cita actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->Service->deleteCita($id);
        return redirect()->route('citas.Citas')->with('success', 'Cita eliminada exitosamente.');
    }
}
