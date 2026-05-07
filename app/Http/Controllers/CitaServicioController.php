<?php

namespace App\Http\Controllers;

use App\Models\cita_servicio;
use App\Http\services\CitaServicioService;
use App\Http\Requests\cita_servicio\CreateCitaServicioRequest;
use App\Http\Requests\cita_servicio\UpdateCitaServicioRequest;
use Illuminate\Http\Request;

class CitaServicioController extends Controller
{
    public function __construct(protected CitaServicioService $Service)
    {}

    public function index()
    {
        $cita_servicios = $this->Service->getAll();
        
        // CORREGIDO: El nombre en compact debe ser igual a la variable (cita_servicios)
        return view('app.back.cita_servicio.CitaServicio', compact('cita_servicios'));
    }

    public function create()
    {
        // Nota: Revisa si tu archivo es 'form.blade.php' o 'from.blade.php'
        return view('app.back.cita_servicio.from', ['cita_servicio' => new cita_servicio()]);
    }

    public function store(CreateCitaServicioRequest $request) // CORREGIDO: Inyección del Request correcto
    {
        $this->Service->createCitaServicio($request->validated());
        
        // CORREGIDO: Ruta estándar 'index' y mensaje de éxito acorde al modelo
        return redirect()->route('cita_servicio.CitaServicio')->with('success', 'Servicio de cita creado exitosamente.');
    }

    public function edit(int $id)
    {
        $cita_servicio = $this->Service->find($id);
        return view('app.back.cita_servicio.from', compact('cita_servicio'));
    }

    public function update(UpdateCitaServicioRequest $request, int $id) // CORREGIDO: string a int
    {
        $this->Service->updateCitaServicio($id, $request->validated());
        return redirect()->route('cita_servicio.CitaServicio')->with('success', 'Servicio de cita actualizado.');
    }

    public function destroy(int $id) // CORREGIDO: string a int
    {
        $this->Service->deleteCitaServicio($id);
        return redirect()->route('cita_servicio.CitaServicio')->with('success', 'Servicio de cita eliminado.');
    }
}