<?php

namespace App\Http\Controllers;
use App\Models\categoria_servicio;
use App\Http\services\CategoriaServicioService;
use App\Http\Requests\categoria_servicio\CreateCategoriaServicioRequest;
use App\Http\Requests\categoria_servicio\UpdateCategoriaServicioRequest;

use Illuminate\Http\Request;

class CategoriaServicioController extends Controller
{
        public function __construct(protected CategoriaServicioService $Service)
        {}
        
    /**
     * Display a listing of the resource.
     */
    public function index() 
{
    // 1. Obtienes los datos
    $categoria_servicios = $this->Service->getAll(); 

    // 2. IMPORTANTE: Pasarlos a la vista usando compact()
    // Esto hace que $admins esté disponible en admin.blade.php
    return view('app.back.categoria_servicio.CategoriaServicio', compact('categoria_servicios'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.back.categoria_servicio.from', ['categoria_servicio' => new categoria_servicio()]); // Asegúrate de tener esta vista creada
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCategoriaServicioRequest $request)
    {
        $this->Service->createcategoria_servicio($request->validated());
        return redirect()->route('categoria_servicio.categoriaServicio')->with('success', 'Categoría de servicio creada exitosamente.');
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
        $categoria_servicios = $this->Service->find($id);
        return view('app.back.categoria_servicio.from', compact('categoria_servicio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoriaServicioRequest $request, int $id)
    {
        $this->Service->updatecategoria_servicio($id, $request->validated());
        return redirect()->route('categoria_servicio.categoriaServicio')->with('success', 'Categoría de servicio actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->Service->deletecategoria_servicio($id);
        return redirect()->route('categoria_servicio.categoriaServicio')->with('success', 'Categoría de servicio eliminada exitosamente.');
    }
}
