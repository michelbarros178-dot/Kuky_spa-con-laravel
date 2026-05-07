<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Citas y Reservas | Kuky Pets</title>
    
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />
    
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
    
    <link rel="stylesheet" href="{{ asset('css/cal.css') }}">
</head>
<body>

    <header class="header">
        <h1>Agenda tu cita</h1>
        <p>Gracias por iniciar sesión, {{ Auth::user()->name }}. Ahora puedes agendar la cita para tu mascota.</p>
    </header>

    <div class="container">
        <div class="calendar-section">
            <h2 class="section-title">🗓️ Calendario de Disponibilidad</h2>
            <div id="calendar"></div>
        </div>
        
        <div class="form-section">
            <h2 class="section-title">📝 Agendar Cita</h2>
            
            <form id="appointmentForm" action="{{ route('citasses.store') }}" method="POST">
                
                @csrf <div class="form-group">
                    <label for="fecha">Fecha Seleccionada:</label>
                    <input type="text" id="fecha" name="fecha" readonly required value="{{ old('fecha') }}">
                </div>
                
                <div class="form-group">
                    <label for="hora">Hora:</label>
                    <select id="hora" name="hora" required>
                        <option value="">-- Selecciona una hora --</option>
                        </select>
                </div>
                
                <hr>
                
                <div class="form-group">
                    <label for="nombre">Nombre de la mascota</label>
                    <input type="text" id="nombre" name="nombre" required value="{{ old('nombre') }}">
                </div>
                
                <div class="form-group">
    <label class="main-label">Servicio(s) Requerido:</label>
    <div class="servicios-box">
        <div class="checkbox-grid">
            @php
                $servicios = [
                    'Bano_sencillo' => 'Baño sencillo',
                    'Bano_especial' => 'Baño especial',
                    'Bano_antipulgas' => 'Baño antipulgas',
                    'Limpieza_de_oidos' => 'Limpieza oídos',
                    'Corte_de_unas' => 'Corte uñas',
                    'Corte_higienico' => 'Corte higiénico',
                    'Corte_estetico' => 'Corte estético',
                    'Masaje_antiestres' => 'Masaje'
                ];
            @endphp

            @foreach($servicios as $value => $label)
                <label class="checkbox-item">
                    <input type="checkbox" name="servicio[]" value="{{ $value }}">
                    <span class="check-text">{{ $label }}</span>
                </label>
            @endforeach
        </div>
    </div>
</div>
                
                <div class="form-group">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" value="{{ Auth::user()->email }}">
                </div>
                
                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" id="telefono" name="telefono" value="{{ old('telefono') }}">
                </div>
                
                <div class="form-group">
                    <label for="notas">Recomendaciones/alergias del animal</label>
                    <textarea id="notas" name="notas" rows="3">{{ old('notas') }}</textarea>
                </div>
                
                <div class="button-group">
                    <button type="submit" class="btn btn-primary">Guardar Cita</button>
                    <button type="reset" class="btn btn-secondary">Limpiar Formulario</button>
                </div><br>

            </form>
            
            <a href="{{ url('/bienvenida') }}" class="btn btn-secondary">Volver</a>
            
            <p id="message" class="hidden"></p>
        </div>
    </div>
    
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
    <script src="{{ asset('js/calendario.js') }}"></script>
</body>
</html>