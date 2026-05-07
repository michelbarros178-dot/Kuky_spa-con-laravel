<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kukypets')</title>

    <!-- Fuentes y Iconos -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS Assets (Asegúrate de que estén en public/css/) -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/loader.css') }}">
</head>

<body>



<!-- CONTENIDO DINÁMICO -->
<div id="contenido">

    <header class="header">
        <nav class="navbar">
            <div class="nav-container">
                <div class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="Kuky Logo" class="nav-logo-img">
                    Kuky
                </div>

                <ul class="nav-menu">
                    {{-- Lógica de clase activa en Laravel --}}
                    <li><a href="{{ route('welcome') }}" class="{{ Route::is('welcome') ? 'active' : '' }}">Inicio</a></li>
                    <li><a href="{{ route('ceo') }}" class="{{ Route::is('ceo') ? 'active' : '' }}">Fundadora</a></li>
                    <li><a href="{{ route('servicios') }}" class="{{ Route::is('servicios') ? 'active' : '' }}">Servicios</a></li>
                    <li><a href="{{ route('terminos') }}" class="{{ Route::is('terminos') ? 'active' : '' }}">Términos y Condiciones</a></li>
                    <li><a href="{{ route('contactanos') }}" class="{{ Route::is('contactanos') ? 'active' : '' }}">Contáctanos</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Kukypets</h3>
                <p>El lugar perfecto para disfrutar de café excelente y la compañía de adorables gatos.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
            <div class="footer-section">
                <h4>Contacto</h4>
                <p><i class="fas fa-map-marker-alt"></i> Bello, Antioquia</p>
                <p><i class="fas fa-phone"></i> +57 300 123 4567</p>
            </div>
            <div class="footer-section">
                <h4>Horarios</h4>
                <p>Lun-Vie: 8:00 - 22:00</p>
                <p>Sáb-Dom: 9:00 - 23:00</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Kukypets. Todos los derechos reservados.</p>
        </div>
    </footer>

</div>

<!-- JS Assets -->
<script src="{{ asset('js/JavaScript.js') }}"></script>
<script src="{{ asset('js/loader.js') }}"></script> 
<script src="{{ asset('js/huellas.js') }}"></script> 
<script src="{{ asset('js/galeria.js') }}"></script> 

</body>
</html>