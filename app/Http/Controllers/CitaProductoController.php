<?php

namespace App\Http\Controllers;

use App\Models\cita_producto;
use App\Http\services\CitaProductoService;
use App\Http\Requests\cita_producto\CreateCitaProductoRequest;
use App\Http\Requests\cita_producto\UpdateCitaProductoRequest;
use Illuminate\Http\Request;

class CitaProductoController extends Controller
{
    public function __construct(protected CitaProductoService $Service)
    {}

    public function index()
    {
        $cita_productos = $this->Service->getAll();
        // Corregido: el nombre en compact debe coincidir con la variable
        return view('app.back.cita_producto.CitaProducto', compact('cita_productos'));
    }

    public function create()
    {
        return view('app.back.cita_producto.CitaProducto', ['cita_producto' => new cita_producto()]);
    }

    public function store(CreateCitaProductoRequest $request) // Corregido el Request
    {
        $this->Service->createCitaProducto($request->validated());
        return redirect()->route('cita_producto.CitaProducto')->with('success', 'Producto de cita creado exitosamente.');
    }

    public function edit(int $id)
    {
        $cita_producto = $this->Service->find($id);
        return view('app.back.cita_producto.CitaProducto', compact('cita_producto'));
    }

    public function update(UpdateCitaProductoRequest $request, int $id)
    {
        $this->Service->updateCitaProducto($id, $request->validated());
        return redirect()->route('cita_producto.CitaProducto')->with('success', 'Producto de cita actualizado.');
    }

    public function destroy(int $id)
    {
        $this->Service->deleteCitaProducto($id);
        return redirect()->route('cita_producto.CitaProducto')->with('success', 'Producto de cita eliminado.');
    }
}