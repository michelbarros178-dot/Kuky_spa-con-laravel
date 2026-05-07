<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KUKY PETS – Contáctanos</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

    <header class="hero">
        <nav class="navbar">
            <div class="nav-links">
                <a href="{{ url('/') }}">INICIO</a>
                <a href="{{ url('/servicios') }}">SERVICIOS</a>
                <a href="{{ url('/ceo') }}">NOSOTROS</a>
            </div>
            <div class="nav-links">
                <a href="{{ url('/contactanos') }}">CONTACTANOS</a>
                <a href="{{ url('/terminos') }}">TÉRMINOS Y CONDICIONES</a>
                <a href="{{ route('login') }}">INICIAR SESIÓN</a>
            </div>
        </nav>

        <div class="hero-content">
            <h1>Contáctanos</h1>
            <p>Estamos aquí para resolver tus dudas y cuidar de tu mejor amigo.</p>
        </div>

        <div class="wave-bottom">
            <svg viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,160L60,176C120,192,240,224,360,213.3C480,203,600,149,720,149.3C840,149,960,203,1080,213.3C1200,224,1320,192,1380,176L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
        </div>
    </header>

    <main class="container">
        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <section class="top-section">
            <form action="{{ url('/contacto') }}" method="POST" class="contact-form" id="contactForm">
                @csrf
                <div class="input-row">
                    <input type="email" name="email" placeholder="Tu Email" required value="{{ old('email') }}">
                    <input type="text" name="phone" placeholder="Teléfono" value="{{ old('phone') }}">
                </div>
                <input type="text" name="name" placeholder="Nombre completo" required value="{{ old('name') }}">
                <textarea name="message" placeholder="¿En qué podemos ayudarte?" rows="5" required>{{ old('message') }}</textarea>
                <button type="submit" class="btn-submit">Enviar Mensaje</button>
            </form>

            <div class="newsletter-card">
                <h3>Kuky News</h3>
                <p>Suscríbete para recibir tips de cuidado y ofertas especiales para tus peludos.</p>
                <form action="{{ url('/newsletter') }}" method="POST" id="newsletterForm">
                    @csrf
                    <input type="email" name="n_email" placeholder="Tu mejor Email" required>
                    <button type="submit" class="btn-dark">Suscribirme</button>
                </form>
            </div>
        </section>

        <section class="info-grid">
            <div class="info-card dark-green">
                <i class="fas fa-phone-alt"></i>
                <div>
                    <h4>Llámanos</h4>
                    <p>+57 321 532 9431</p>
                </div>
            </div>
            <div class="info-card light-blue">
                <i class="fas fa-envelope"></i>
                <div>
                    <h4>Escríbenos</h4>
                    <p>Kukyspa@gmail.com</p>
                </div>
            </div>
            <div class="info-card white-card">
                <i class="fas fa-map-marker-alt"></i>
                <div>
                    <h4>Ubícanos</h4>
                    <p>Bello, Antioquia</p>
                </div>
            </div>
        </section>

        <div class="map-container">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63451.23306461947!2d-75.59013535!3d6.33123865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e442fa3542283a3%3A0x646927495f2c417!2sBello%2C%20Antioquia!5e0!3m2!1ses!2sco!4v1714150000000" 
                width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
        </div>
    </main>

    <footer class="main-footer">
        <div class="footer-grid">
            <div class="footer-col reveal">
                <h3>Sobre Kuky Pets</h3>
                <p>Amor y cuidado para tus mascotas en Bello, Antioquia. Brindamos experiencias únicas de relajación.</p>
                <div class="footer-social">
                    <a href="https://instagram.com/kukypets3984"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                </div>
            </div>
            <div class="footer-col reveal">
                <h3>Servicios Populares</h3>
                <ul>
                    <li><a href="#">Baño Especial</a></li>
                    <li><a href="#">Masaje Antiestrés</a></li>
                    <li><a href="#">Corte Higiénico</a></li>
                </ul>
            </div>
            <div class="footer-col reveal">
                <h3>Contacto</h3>
                <p><i class="fas fa-phone"></i> 321 532 9431</p>
                <p><i class="fas fa-envelope"></i> Kukyspa@gmail.com</p>
                <p><i class="fas fa-map-marker-alt"></i> Bello, Antioquia</p>
            </div>
        </div>
        <div class="footer-copy">
            <p>© 2026 Kuky Pets. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="{{ asset('js/contact.js') }}"></script>
</body>
</html>