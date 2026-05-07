<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Kuky Pets</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/log.css') }}">
</head>
<body>

    <div class="glass-card p-10 rounded-[2.5rem] w-full max-w-[480px] shadow-2xl mx-4">
        <h2 class="text-3xl text-accent text-center mb-8 font-light tracking-wide">Registrarse</h2>

        <form method="POST" id="formulario" action="{{ route('register') }}">
            @csrf
            
            <div class="mb-5" id="grupo__name">
                <label class="text-accent text-xs ml-5 mb-2 block uppercase tracking-wider">Nombre Completo</label>
                <input type="text" name="name" placeholder="Daniel Gallego" required 
                    class="w-full custom-input border-none rounded-full py-3 px-6 placeholder-gray-600 italic">
                 
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>

            <div class="mb-5" id="grupo__email">
                <label class="text-accent text-xs ml-5 mb-2 block uppercase tracking-wider">Correo Electrónico</label>
                <input type="email" name="email" placeholder="hello@reallygreatsite.com" value="{{ old('email') }}" required 
                    class="w-full custom-input border-none rounded-full py-3 px-6 placeholder-gray-600 italic">

                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                
                @if ($errors->has('email'))
                    <div class="alert alert-danger mt-2 text-xs text-red-500 ml-5">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <div class="mb-5" id="grupo__telefono">
                <label class="text-accent text-xs ml-5 mb-2 block uppercase tracking-wider">Número de Teléfono</label>
                <input type="text" name="telefono" placeholder="123-456-7890" value="{{ old('telefono') }}" required 
                    class="w-full custom-input border-none rounded-full py-3 px-6 placeholder-gray-600 italic">

                <i class="formulario__validacion-estado fas fa-times-circle"></i>

                @if ($errors->has('telefono'))
                    <div class="alert alert-danger mt-2 text-xs text-red-500 ml-5">{{ $errors->first('telefono') }}</div>
                @endif
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-10" id="grupo__password">
                <div>
                    <label class="text-accent text-xs ml-5 mb-2 block uppercase tracking-wider">Contraseña</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" placeholder="**********" value="{{ old('password') }}" required 
                            class="w-full custom-input border-none rounded-full py-3 px-6">
                        
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        
                        <button type="button" onclick="togglePassword('password', 'eye-pass')" class="absolute right-5 top-3.5 text-gray-500">
                            <i id="eye-pass" class="far fa-eye-slash text-xs"></i>
                        </button>
                    </div>
                    @if ($errors->has('password'))
                        <div class="alert alert-danger mt-2 text-xs text-red-500 ml-5">{{ $errors->first('password') }}</div>
                    @endif
                </div>

                <div>
                    <label class="text-accent text-xs ml-5 mb-2 block uppercase tracking-wider">Confirmar Contraseña</label>
                    <div class="relative">
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="**********" value="{{ old('password_confirmation') }}" required
                            class="w-full custom-input border-none rounded-full py-3 px-6">
                        
                        <button type="button" onclick="togglePassword('password_confirmation', 'eye-conf')" class="absolute right-5 top-3.5 text-gray-500">
                            <i id="eye-conf" class="far fa-eye-slash text-xs"></i>
                        </button>
                    </div>
                    @if ($errors->has('password_confirmation'))
                        <div class="alert alert-danger mt-2 text-xs text-red-500 ml-5">{{ $errors->first('password_confirmation') }}</div>
                    @endif
                </div>
            </div>


            <button type="submit" class="w-full btn-gradient text-white rounded-full py-3.5 font-semibold shadow-lg">
                Crear cuenta
            </button>

            <p class="text-center text-gray-400 text-sm mt-8">
                <a href="{{ route('login') }}" class="text-accent transition-colors underline-offset-4 hover:underline">¿Ya tienes una cuenta? Inicia sesión</a>
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
    <script src="{{ asset('js/registrarse_validaciones.js') }}"></script>
</body>
</html>