<?php

namespace App\Http\Controllers;

use App\Models\empleado;
use App\Http\services\EmpleadosService;
use App\Http\Requests\empleados\CreateEmpleadoRequest;
use App\Http\Requests\empleados\UpdateEmpleadoRequest; 
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function __construct(protected EmpleadosService $Service)
    {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = $this->Service->getAll();
        return view('app.back.empleado.Empleado', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Nota: Asegúrate de si tu archivo es 'form' o 'from'
        return view('app.back.empleado.from', ['empleado' => new empleado()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEmpleadoRequest $request) // CORREGIDO: Inyección de Request correcto
    {
        $this->Service->createEmpleado($request->validated());
        return redirect()->route('empleado.Empleado')->with('success', 'Empleado creado exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $empleado = $this->Service->find($id);
        return view('app.back.empleado.from', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmpleadoRequest $request, int $id) // CORREGIDO: Lógica implementada
    {
        $this->Service->updateEmpleado($id, $request->validated());
        return redirect()->route('empleado.Empleado')->with('success', 'Empleado actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id) // CORREGIDO: Lógica implementada
    {
        $this->Service->deleteEmpleado($id);
        return redirect()->route('empleado.Empleado')->with('success', 'Empleado eliminado exitosamente.');
    }
}