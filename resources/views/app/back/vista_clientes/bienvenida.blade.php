<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bienvenido – Kuky Pets</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />
    
    <link rel="stylesheet" href="{{ asset('css/bienvenida.css') }}?v={{ time() }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body>

    <main class="internal-page-wrapper">
        <div class="central-management-panel">
            <h2 id="saludo">
                <i class="fas fa-paw"></i> 
                ¡Hola, {{ Auth::user()->name ?? 'Visitante' }}! 🐶
            </h2>
            <p class="panel-subtitle">Gracias por iniciar sesión. Aquí puedes gestionar todos los servicios para tu mascota.</p>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <section class="servicio-grid">
                <a href="{{ route('bano-antipulgas') }}" class="btn-servicio btn-accent-blue"><i class="fas fa-shower"></i> Baño sencillo</a>
                <a href="{{ route('bano-especial') }}" class="btn-servicio btn-accent-blue"><i class="fas fa-spa"></i> Baño especial</a>
                <a href="{{ route('bano-antipulgas') }}" class="btn-servicio btn-accent-blue"><i class="fas fa-bug"></i> Baño antipulgas</a>
                <a href="{{ route('limpieza-oidos') }}" class="btn-servicio btn-accent-blue"><i class="fas fa-ear-listen"></i> Limpieza de oídos</a>
                <a href="{{ route('corte-unas') }}" class="btn-servicio btn-accent-blue"><i class="fas fa-cut"></i> Corte de uñas</a>
                <a href="{{ route('corte-higienico') }}" class="btn-servicio btn-accent-blue"><i class="fas fa-scissors"></i> Corte higiénico</a>
                <a href="{{ route('corte-estetico') }}" class="btn-servicio btn-accent-blue"><i class="fas fa-paw"></i> Corte estético</a>
                <a href="{{ route('masaje-antiestres') }}" class="btn-servicio btn-accent-blue"><i class="fas fa-heart"></i> Masaje antiestrés</a>
            </section>

            <section class="central-actions-container">
                <div class="booking-cta">
                    <a href="{{ route('citas.index') }}" class="btn-booking btn-accent-blue">
                        <i class="fas fa-calendar-check"></i> Haz click para agendar tu cita
                    </a>
                </div>
                
                <div class="pet-cta">
                    <p>¿Tienes nueva mascota? <a href="#" id="openModalBtn">Haz clic aquí para agregar mascota +</a></p>
                </div>
            </section>

            <section class="cancelation-panel">
                <h3 class="panel-section-title"><i class="fas fa-calendar-times"></i> ¿Deseas cancelar tu cita?</h3>
                
                <div class="cancelation-box">
                    <form id="cancelar-form">
                        <div class="form-group">
                            <label for="codigo">Código de cita</label>
                            <input type="text" id="codigo" placeholder="Ej: CITA1234" required />
                        </div>
                        <button type="submit" class="btn-cancel btn-accent-blue">Cancelar cita</button>
                    </form>
                    <p id="mensaje-cancelacion" class="status-message"></p>
                </div>
            </section>
        </div>

        <div id="modal" class="pet-modal">
            <div class="modal-content">
                <span id="closeModalBtn" class="close-modal">&times;</span>
                <h2 style="text-align:center">✨ Registrar Mascota ✨</h2>
                
                <form id="pet-registration-form" action="{{ route('Mascotas.store') }}" method="POST">
                    @csrf 
                    <input type="hidden" name="id_cliente" value="{{ Auth::user()->id_cliente ?? '' }}">

                    <div class="form-group"><label>Nombre</label><input type="text" name="nombre_mascota" required></div>
                    <div class="form-group"><label>Especie</label><input type="text" name="especie" required></div>
                    <div class="form-group"><label>Raza</label><input type="text" name="raza"></div>
                    <div class="form-group"><label>Edad</label><input type="number" name="edad"></div>
                    
                    <button type="submit" class="btn-modal btn-accent-blue">REGISTRAR MASCOTA</button>
                </form>
            </div>
        </div>
    </main>

    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const modal = document.getElementById('modal');
        const openBtn = document.getElementById('openModalBtn');
        const closeBtn = document.getElementById('closeModalBtn');

        openBtn.onclick = (e) => { e.preventDefault(); modal.style.display = 'flex'; }
        closeBtn.onclick = () => modal.style.display = 'none';
        window.onclick = (e) => { if(e.target == modal) modal.style.display = 'none'; }

        document.getElementById("cancelar-form").onsubmit = function(e) {
            e.preventDefault();
            const codigo = document.getElementById("codigo").value;
            const mensaje = document.getElementById("mensaje-cancelacion");
            mensaje.textContent = `✅ Cita ${codigo} cancelada correctamente.`;
            mensaje.style.color = "green";
            this.reset();
        };
    </script>

</body>
</html>