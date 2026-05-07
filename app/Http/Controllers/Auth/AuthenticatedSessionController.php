<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        // 1. Validar email y password (proceso estándar de Laravel Breeze)
        $request->authenticate();

        // 2. Si llegamos aquí, la contraseña es correcta. Obtenemos al usuario.
        $user = Auth::user();

        // 3. Validar que el rol seleccionado en el formulario coincida con el id_rol de la BD
        // El input 'rol' ahora envía 1, 2 o 3 según el HTML que te pasé arriba.
        if ($user->id_rol != $request->rol) {
            // Si no coincide, cerramos la sesión por seguridad
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return back()->withErrors([
                'rol' => 'El rol seleccionado no coincide con tu cuenta.',
            ])->onlyInput('email');
        }

        // 4. Si todo es correcto, regeneramos sesión
        $request->session()->regenerate();

        // 5. Redirección por Rol
        switch ($user->id_rol) {
            case 1: // Administrador
                // Asegúrate de que esta ruta o URL exista
                return redirect()->intended('app.back.admin.admin'); 
            
            case 2: // Empleado / Términos
                return redirect()->to('/terminos');
            
            case 3: // Cliente
                return redirect()->intended(route('bienvenida'));
            
            default:
                return redirect('/');
        }
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}