<?php

namespace App\Http\Controllers;

use App\Models\factura;
use App\Http\services\FacturasService;
use App\Http\Requests\facturas\CreateFacturasRequest;
use App\Http\Requests\facturas\UpdateFacturasRequest;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    public function __construct(protected FacturasService $Service)
    {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facturas = $this->Service->getAll();
        return view('app.back.facturas.Facturas', compact('facturas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Nota: Revisa si tu archivo es 'form' o 'from'
        return view('app.back.facturas.from', ['factura' => new factura()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateFacturasRequest $request) 
    {
        $this->Service->createFactura($request->validated());
        return redirect()->route('facturas.Facturas')->with('success', 'Factura creada exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $factura = $this->Service->find($id);
        return view('app.back.facturas.from', compact('factura'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFacturasRequest $request, int $id) 
    {
        $this->Service->updateFactura($id, $request->validated());
        return redirect()->route('facturas.Facturas')->with('success', 'Factura actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id) 
    {
        $this->Service->deleteFactura($id);
        return redirect()->route('facturas.Facturas')->with('success', 'Factura eliminada exitosamente.');
    }
}