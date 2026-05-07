<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Kuky Pets</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/log.css') }}">
</head>
<body>

    <div class="glass-card p-10 rounded-[2.5rem] w-full max-w-[400px] shadow-2xl mx-4">
        <h2 class="text-3xl text-accent text-center mb-10 font-light tracking-wide">Iniciar sesión</h2>

        <form method="POST" action="{{ route('login') }}" id="formulario">
            @csrf
            
            <div class="mb-6 relative" id="grupo__email">
                <span class="absolute inset-y-0 left-5 flex items-center text-gray-400">
                    <i class="fas fa-user text-xs"></i>
                </span>
                <input type="email" name="email" id="email" placeholder="Correo Electrónico" value="{{ old('email') }}" required
                    class="w-full custom-input border-2 {{ $errors->has('email') ? 'border-red-500' : 'border-transparent' }} rounded-full py-3.5 px-12 outline-none">
                
                @if ($errors->has('email'))
                    <div class="alert alert-danger mt-2 text-xs text-red-500 ml-5">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <div class="mb-4 relative" id="grupo__password">
                <span class="absolute inset-y-0 left-5 flex items-center text-gray-400">
                    <i class="fas fa-lock text-xs"></i>
                </span>
                <input type="password" id="password-login" name="password" placeholder="Contraseña" required
                    class="w-full custom-input border-2 {{ $errors->has('password') ? 'border-red-500' : 'border-transparent' }} rounded-full py-3.5 px-12 outline-none">
                
                <button type="button" onclick="togglePassword('password-login', 'eye-icon-login')" class="absolute inset-y-0 right-5 flex items-center text-gray-500">
                    <i id="eye-icon-login" class="far fa-eye-slash text-xs"></i>
                </button>

                @if ($errors->has('password'))
                    <div class="alert alert-danger mt-2 text-xs text-red-500 ml-5">{{ $errors->first('password') }}</div>
                @endif
            </div>

            <div class="flex items-center justify-between text-[11px] text-gray-400 mb-8 px-2">
                <label class="flex items-center cursor-pointer">
                    <input type="checkbox" name="remember" class="rounded-sm border-gray-700 bg-transparent mr-2 text-purple-600 focus:ring-0">
                    Recordar
                </label>
                <a href="{{ route('password.request') }}" class="text-gray-400 italic hover:text-accent transition-colors">¿Olvidaste tu contraseña?</a>
            </div>

            <div class="mb-8" id="grupo__rol">
                <label class="text-accent text-xs ml-1 mb-2 block uppercase tracking-wider">Tipo de Usuario</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-5 flex items-center text-gray-400">
                        <i class="fas fa-users-cog text-xs"></i>
                    </span>
                    <select name="rol" id="rol" required 
                        class="w-full custom-input border-2 {{ $errors->has('rol') ? 'border-red-500' : 'border-transparent' }} rounded-full py-3.5 px-12 outline-none appearance-none cursor-pointer bg-transparent">
                        <option value="" disabled selected>Selecciona tu rol</option>
                        <option value="1">Administrador</option>
                        <option value="2">Empleado</option>
                        <option value="3">Cliente</option>
                    </select>
                    <span class="absolute inset-y-0 right-5 flex items-center pointer-events-none text-gray-400">
                        <i class="fas fa-chevron-down text-[10px]"></i>
                    </span>
                </div>
                @if ($errors->has('rol'))
                    <div class="alert alert-danger mt-2 text-xs text-red-500 ml-5">{{ $errors->first('rol') }}</div>
                @endif
            </div>

            <button type="submit" class="w-full btn-gradient text-white rounded-full py-3.5 font-semibold shadow-lg">
                Iniciar sesión
            </button>

            <p class="text-center text-gray-400 text-sm mt-8">
             <a href="{{ route('register') }}" class="text-accent transition-colors underline-offset-4 hover:underline">¿No tienes una cuenta? Regístrate</a>
            </p>
        </form>
    </div>

    <script>
        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const eyeIcon = document.getElementById(iconId);
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            }
        }
    </script>
</body>
</html>