<?php

namespace App\Http\Controllers;

use App\Models\servicio_producto;
use App\Http\services\ServicioProductoService;
use App\Http\Requests\servicio_producto\CreateServicioProductoRequest;
use App\Http\Requests\servicio_producto\UpdateServicioProductoRequest;
use Illuminate\Http\Request;

class ServicioProductoController extends Controller
{
    public function __construct(protected ServicioProductoService $Service)
    {}

    public function index()
    {
        $servicio_productos = $this->Service->getAll();
        return view('app.back.servicio_producto.ServicioProducto', compact('servicio_productos'));
    }

    public function create()
    {
        return view('app.back.servicio_producto.from', ['relacion' => new servicio_producto()]);
    }

    public function store(CreateServicioProductoRequest $request) 
    {
        $this->Service->createServicioProducto($request->validated());
        return redirect()->route('servicio_producto.ServicioProducto')->with('success', 'Relación creada exitosamente.');
    }

    public function edit(int $id)
    {
        $relacion = $this->Service->find($id);
        return view('app.back.servicio_producto.from', compact('relacion'));
    }

    public function update(UpdateServicioProductoRequest $request, int $id) 
    {
        $this->Service->updateServicioProducto($id, $request->validated());
        return redirect()->route('servicio_producto.ServicioProducto')->with('success', 'Relación actualizada.');
    }

    public function destroy(int $id) 
    {
        $this->Service->deleteServicioProducto($id);
        return redirect()->route('servicio_producto.ServicioProducto')->with('success', 'Relación eliminada.');
    }
}