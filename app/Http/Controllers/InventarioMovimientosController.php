<?php

namespace App\Http\Controllers;

use App\Models\inventario_movimientos;
use App\Http\services\InventarioMovimientosService;
use App\Http\Requests\inventario_movimientos\CreateInventarioMovimientosRequest;
use App\Http\Requests\inventario_movimientos\UpdateInventarioMovimientosRequest;
use Illuminate\Http\Request;

class InventarioMovimientosController extends Controller
{
    public function __construct(protected InventarioMovimientosService $Service)
    {}

    public function index()
    {
        // Corregido: Variable consistente para el compact
        $inventario_movimientos = $this->Service->getAll();
        return view('app.back.inventario_movimiento.InventarioMovimiento', compact('inventario_movimientos'));
    }

    public function create()
    {
        return view('app.back.inventario_movimiento.from', ['movimiento' => new inventario_movimientos()]);
    }

    public function store(CreateInventarioMovimientosRequest $request) 
    {
        $this->Service->createInventarioMovimiento($request->validated());
        return redirect()->route('inventario_movimiento.InventarioMovimiento')->with('success', 'Movimiento registrado correctamente.');
    }

    public function edit(int $id)
    {
        $movimiento = $this->Service->find($id);
        return view('app.back.inventario_movimiento.from', compact('movimiento'));
    }

    public function update(UpdateInventarioMovimientosRequest $request, int $id) 
    {
        $this->Service->updateInventarioMovimiento($id, $request->validated());
        return redirect()->route('inventario_movimiento.InventarioMovimiento')->with('success', 'Movimiento actualizado.');
    }

    public function destroy(int $id) 
    {
        $this->Service->deleteInventarioMovimiento($id);
        return redirect()->route('inventario_movimiento.InventarioMovimiento')->with('success', 'Movimiento eliminado.');
    }
}