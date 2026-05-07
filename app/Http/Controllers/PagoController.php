<?php

namespace App\Http\Controllers;

use App\Models\pago;
use App\Http\services\PagosService;
use App\Http\Requests\pagos\CreatePagosRequest;
use App\Http\Requests\pagos\UpdatePagosRequest;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function __construct(protected PagosService $Service)
    {}

    public function index()
    {
        $pago = $this->Service->getAll();
        return view('app.back.pagos.Pagos', compact('pago'));
    }

    public function create()
    {
        // Enviamos 'pago' en singular para el formulario
        return view('app.back.pagos.from', ['pago' => new pago()]);
    }

    public function store(CreatePagosRequest $request) 
    {
        $this->Service->createPagos($request->validated());
        return redirect()->route('pagos.Pagos')->with('success', 'Pago registrado exitosamente.');
    }

    public function edit(int $id)
    {
        $pago = $this->Service->find($id);
        return view('app.back.pagos.from', compact('pago'));
    }

    public function update(UpdatePagosRequest $request, int $id) 
    {
        $this->Service->updatePagos($id, $request->validated());
        return redirect()->route('pagos.Pagos')->with('success', 'Información de pago actualizada.');
    }

    public function destroy(int $id) 
    {
        $this->Service->deletePagos($id);
        return redirect()->route('pagos.Pagos')->with('success', 'Registro de pago eliminado.');
    }
}