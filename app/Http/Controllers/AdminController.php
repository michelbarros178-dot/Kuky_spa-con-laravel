<?php

namespace App\Http\Controllers;
use App\Models\admin;
use App\Http\services\AdminService;
use App\Http\Requests\admin\CreateAdminRequest;
use App\Http\Requests\admin\UpdateAdminRequest;

use Illuminate\Http\Request;

class AdminController extends Controller
{
        public function __construct(protected AdminService $Service)
        {}
        
    /**
     * Display a listing of the resource.
     */
    public function index() 
{
    // 1. Obtienes los datos
    $admins = $this->Service->getAll(); 

    // 2. IMPORTANTE: Pasarlos a la vista usando compact()
    // Esto hace que $admins esté disponible en admin.blade.php
    return view('app.back.admin.admin', compact('admins'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.back.admin.from', ['admin' => new admin()]); // Asegúrate de tener esta vista creada
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateAdminRequest $request)
    {
        $this->Service->createAdmin($request->validated());
        return redirect()->route('admin.admin')->with('success', 'Admin creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $admin = $this->Service->find($id);
        return view('app.back.admin.from', compact('admins'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, int $id)
    {
        $this->Service->updateAdmin($id, $request->validated());
        return redirect()->route('admin.admin')->with('success', 'Admin actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->Service->deleteAdmin($id);
        return redirect()->route('admin.admin')->with('success', 'Admin eliminado exitosamente.');
    }
}
