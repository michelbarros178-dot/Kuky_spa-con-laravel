<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\services\UserService;
use App\Http\Requests\user\CreateUserRequest;
use App\Http\Requests\user\UpdateUserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(protected UserService $Service)
    {}

    public function index()
    {
        $users = $this->Service->getAll();
        // Corregido: 'users' en plural para que coincida con la variable
        return view('app.back.user.User', compact('users'));
    }

    public function create()
    {
        return view('app.back.user.from', ['user' => new User()]);
    }

    public function store(CreateUserRequest $request)
    {
        $this->Service->createUser($request->validated());
        return redirect()->route('user.User')->with('success', 'Usuario creado exitosamente.');
    }

    public function edit(int $id)
    {
        $user = $this->Service->find($id);
        return view('app.back.user.from', compact('user'));
    }

    public function update(UpdateUserRequest $request, int $id) 
    {
        $this->Service->updateUser($id, $request->validated());
        return redirect()->route('user.User')->with('success', 'Usuario actualizado.');
    }

    public function destroy(int $id) 
    {
        $this->Service->deleteUser($id);
        return redirect()->route('user.User')->with('success', 'Usuario eliminado.');
    }
}