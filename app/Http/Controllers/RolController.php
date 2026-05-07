<?php

namespace App\Http\Controllers;

use App\Models\rol;
use App\Http\services\RolServices;
use App\Http\Requests\rol\CreateRolRequest;
use App\Http\Requests\rol\UpdateRolRequest;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function __construct(protected RolServices $Service)
    {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = $this->Service->getAll();
        return view('app.back.rol.Rol', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.back.rol.from', ['rol' => new rol()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRolRequest $request) // Corregido el tipo de Request
    {
        $this->Service->createRol($request->validated());
        return redirect()->route('rol.Rol')->with('success', 'Rol creado exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $rol = $this->Service->find($id);
        return view('app.back.rol.from', compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRolRequest $request, int $id) 
    {
        $this->Service->updateRol($id, $request->validated());
        return redirect()->route('rol.Rol')->with('success', 'Rol actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id) 
    {
        $this->Service->deleteRol($id);
        return redirect()->route('rol.Rol')->with('success', 'Rol eliminado correctamente.');
    }
}