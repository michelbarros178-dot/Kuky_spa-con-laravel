<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Http\services\clientesService;
use App\Http\Requests\cliente\CreateClienteRequest;
use App\Http\Requests\cliente\UpdateClienteRequest; 
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function __construct(protected clientesService $Service)
    {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = $this->Service->getAll();
        return view('app.back.clientes.Clientes', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Nota: Revisa si tu archivo es 'form' o 'from'
        return view('app.back.clientes.from', ['cliente' => new cliente()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateClienteRequest $request) // CORREGIDO: Request específico
    {
        $this->Service->createCliente($request->validated());
        return redirect()->route('clientes.Clientes')->with('success', 'Cliente creado exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        // CORREGIDO: Nombre de variable correcto y compact correcto
        $cliente = $this->Service->find($id);
        return view('app.back.clientes.from', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClienteRequest $request, int $id) // CORREGIDO: Lógica implementada
    {
        $this->Service->updateCliente($id, $request->validated());
        return redirect()->route('clientes.Clientes')->with('success', 'Cliente actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id) // CORREGIDO: Lógica implementada
    {
        $this->Service->deleteCliente($id);
        return redirect()->route('clientes.Clientes')->with('success', 'Cliente eliminado exitosamente.');
    }
}