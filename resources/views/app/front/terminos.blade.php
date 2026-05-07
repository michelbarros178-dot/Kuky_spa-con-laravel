<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KUKY PETS – Servicios</title>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header class="hero">
        <nav class="navbar">
            <div class="nav-links">
                <a href="{{ url('/') }}">INICIO</a>
                <a href="{{ url('/servicios') }}">SERVICIOS</a>
                <a href="{{ url('/ceo') }}">NOSOTROS</a>
                <a href="{{ url('/galeria') }}">GALERÍA</a>
            </div>

            <div class="nav-links">
                <a href="{{ url('/terminos') }}">TÉRMINOS Y CONDICIONES</a>
                <a href="{{ route('login') }}">INICIAR SESIÓN</a>
            </div>
        </nav>

        <div class="hero-content">
            <h1>SERVICIOS</h1>
            <p>Descubre nuestros consejos y noticias para el cuidado de tus peludos.</p>
            <button class="btn-enquire">Agendar Cita</button>
        </div>

        <div class="wave-bottom">
            <svg viewBox="0 0 1440 320">
                <path fill="#ffffff" fill-opacity="1" d="M0,160L60,176C120,192,240,224,360,213.3C480,203,600,149,720,149.3C840,149,960,203,1080,213.3C1200,224,1320,192,1380,176L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
            </svg>
        </div>
    </header>

    <main class="info-page" style="padding: 40px 20px; max-width: 900px; margin: 0 auto;">
        <h2><i class="fas fa-file-contract"></i> Términos y condiciones</h2>
        <p>Los datos publicados tienen propósitos exclusivamente informativos. El Departamento Administrativo de la Función Pública no se hace responsable de la vigencia de la presente norma. Nos encontramos en un proceso permanente de actualización de los contenidos.</p>
        <p>Al utilizar los servicios de Kuky Pets, aceptas los siguientes términos:</p>
        <ul style="line-height: 2; list-style: none; padding-left: 0;">
            <li>✔ Las citas deben ser confirmadas con al menos 24 horas de anticipación.</li>
            <li>✔ Los servicios están sujetos a disponibilidad y evaluación del estado de la mascota.</li>
            <li>✔ Kuky Pets no se responsabiliza por condiciones médicas no informadas previamente.</li>
            <li>✔ El pago se realiza al finalizar el servicio, en efectivo o por transferencia.</li>
            <li>✔ El cliente acepta el uso de productos certificados y técnicas seguras.</li>
        </ul>

        <div style="text-align: center; margin-top: 20px;">
            <a href="{{ asset('pdf/terminos.pdf') }}" download class="boton-descarga-mini">
                <i class="fas fa-file-pdf" style="margin-right: 5px;"></i> Descargar
            </a>
        </div>
    </main>

    <footer class="main-footer">
        <div class="footer-grid">
            <div class="footer-col">
                <h3>Sobre Kuky Pets</h3>
                <p>Amor y cuidado para tus mascotas en Bello, Antioquia. Brindamos experiencias únicas de relajación.</p>
                <div class="footer-social">
                    <a href="https://instagram.com/kukypets3984" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                </div>
            </div>

            <div class="footer-col">
                <h3>Servicios Populares</h3>
                <ul>
                    <li><a href="#">Baño Especial</a></li>
                    <li><a href="#">Masaje Antiestrés</a></li>
                    <li><a href="#">Corte Higiénico</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h3>Contacto</h3>
                <p><i class="fas fa-phone"></i> 321 532 9431</p>
                <p><i class="fas fa-envelope"></i> Kukyspa@gmail.com</p>
                <p><i class="fas fa-map-marker-alt"></i> Bello, Antioquia</p>
            </div>
        </div>

        <div class="footer-copy">
            <p>&copy; 2026 Kuky Pets. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>