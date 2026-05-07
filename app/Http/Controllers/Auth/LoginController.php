<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Muestra el formulario de login.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Maneja la autenticación del usuario.
     */
    public function login(Request $request): RedirectResponse
    {
        // 1. Validar los datos de entrada (incluyendo el rol del select)
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'rol' => ['required'], // Validamos que seleccionó un rol
        ]);

        // Extraemos solo email y password para el intento inicial de login
        $authCredentials = $request->only('email', 'password');

        // 2. Intentar iniciar sesión
        if (Auth::attempt($authCredentials, $request->has('remember'))) {
            
            $user = Auth::user();

            /**
             * 3. Verificación de Seguridad:
             * Comparamos el rol elegido en el formulario con el id_rol de la BD.
             */
            if ($user->id_rol != $request->rol) {
                // Si el rol no coincide, cerramos la sesión inmediatamente
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()->withErrors([
                    'rol' => 'El rol seleccionado no corresponde a esta cuenta de usuario.',
                ])->onlyInput('email');
            }

            // Si el rol es correcto, regeneramos la sesión por seguridad
            $request->session()->regenerate();

            /**
             * 4. Lógica de redirección por rol
             */
            switch ($user->id_rol) {
                case 1: // Administrador
                    // Nota: Asegúrate de que 'n' sea una URL válida o usa route('admin.admin')
                    return redirect()->to('app.back.admin.admin'); 
                
                case 2: // Empleado / Estilista
                    return redirect()->to('CitasEstilistaCitas');
                
                case 3: // Cliente
                    return redirect()->intended(route('bienvenida'));
                
                default:
                    return redirect('/');
            }
        }

        // 5. Si la autenticación falla (email o password incorrectos)
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    /**
     * Cerrar sesión.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}