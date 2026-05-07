<?php

namespace App\Http\Controllers;

use App\Models\producto;
use App\Http\services\ProductoService;
use App\Http\Requests\producto\CreateProductoRequest;
use App\Http\Requests\producto\UpdateProductoRequest;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Inyectamos el servicio correctamente
    public function __construct(protected ProductoService $Service)
    {}

    public function index()
    {
        $productos = $this->Service->getAll();
        // IMPORTANTE: El nombre en compact debe ser igual a la variable
        return view('app.back.productos.Productos', compact('productos'));
    }

    public function create()
    {
        // Enviamos 'producto' en singular para que el formulario sea $producto->nombre
        return view('app.back.productos.from', ['producto' => new producto()]);
    }

    public function store(CreateProductoRequest $request) 
    {
        // Si usas Request $request normal, validated() fallará. 
        // Asegúrate que CreateProductoRequest tenga 'authorize' en true.
        $this->Service->createProducto($request->validated());
        
        return redirect()->route('productos.Productos')->with('success', 'Producto creado exitosamente.');
    }

    public function edit(int $id)
    {
        $producto = $this->Service->find($id);
        return view('app.back.productos.from', compact('producto'));
    }

    public function update(UpdateProductoRequest $request, int $id) 
    {
        $this->Service->updateProducto($id, $request->validated());
        return redirect()->route('productos.Productos')->with('success', 'Producto actualizado.');
    }

    public function destroy(int $id) 
    {
        $this->Service->deleteProducto($id);
        return redirect()->route('productos.Productos')->with('success', 'Producto eliminado.');
    }
}