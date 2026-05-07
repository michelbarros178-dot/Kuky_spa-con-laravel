<?php

namespace App\Http\Controllers;

use App\Models\servicio;
use App\Http\services\ServiciosService;
use App\Http\Requests\servicios\CreateServiciosRequest;
use App\Http\Requests\servicios\UpdateServiciosRequest;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function __construct(protected ServiciosService $Service)
    {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicios = $this->Service->getAll();
        // Corregido: El nombre del compact debe coincidir con la variable
        return view('app.back.servicio.Servicio', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.back.servicio.from', ['servicio' => new servicio()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateServiciosRequest $request) 
    {
        $this->Service->createServicio($request->validated());
        return redirect()->route('servicio.Servicio')->with('success', 'Servicio creado exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        // Corregido: Referencias incorrectas a inventario eliminadas
        $servicio = $this->Service->find($id);
        return view('app.back.servicio.from', compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiciosRequest $request, int $id) 
    {
        $this->Service->updateServicio($id, $request->validated());
        return redirect()->route('servicio.Servicio')->with('success', 'Servicio actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id) 
    {
        $this->Service->deleteServicio($id);
        return redirect()->route('servicio.Servicio')->with('success', 'Servicio eliminado.');
    }
}