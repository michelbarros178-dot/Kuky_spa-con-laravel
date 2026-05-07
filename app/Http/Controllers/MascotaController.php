<?php

namespace App\Http\Controllers;

use App\Models\mascota;
use App\Http\services\MascotasService;
use App\Http\Requests\mascotas\CreateMascotasRequest;
use App\Http\Requests\mascotas\UpdateMascotasRequest;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    /**
     * Inyección de dependencias del servicio de lógica de negocio.
     */
    public function __construct(protected MascotasService $Service)
    {}

    /**
     * Muestra el listado de mascotas registradas.
     */
    public function index()
    {
        $mascotas = $this->Service->getAll();
        return view('app.back.mascotas.Mascotas', compact('mascotas'));
    }

    /**
     * Muestra el formulario para crear una nueva mascota.
     */
    public function create()
    {
        return view('app.back.mascotas.from', ['mascota' => new mascota()]);
    }

    /**
     * Procesa el almacenamiento de una nueva mascota.
     * Utiliza CreateMascotasRequest para validación automática.
     */
    public function store(CreateMascotasRequest $request) 
    {
        // El método validated() asegura que solo pasen datos limpios al servicio
        $this->Service->createMascota($request->validated());
        
        return redirect()->route('mascotas.Mascotas')->with('success', '¡Mascota registrada con éxito!');
    }

    /**
     * Muestra el formulario de edición para una mascota específica.
     */
    public function edit(int $id)
    {
        $mascota = $this->Service->find($id);
        return view('app.back.mascotas.from', compact('mascota'));
    }

    /**
     * Actualiza los datos de la mascota en la base de datos.
     */
    public function update(UpdateMascotasRequest $request, int $id) 
    {
        $this->Service->updateMascota($id, $request->validated());
        
        return redirect()->route('mascotas.Mascotas')->with('success', 'Datos de la mascota actualizados.');
    }

    /**
     * Elimina una mascota (Soft Delete o Hard Delete según tu Service).
     */
    public function destroy(int $id) 
    {
        $this->Service->deleteMascota($id);
        
        return redirect()->route('mascotas.Mascotas')->with('success', 'Mascota eliminada del sistema.');
    }
}