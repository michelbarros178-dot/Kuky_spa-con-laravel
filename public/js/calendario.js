
document.addEventListener('DOMContentLoaded', function() {

    const calendarEl = document.getElementById('calendar');
    const appointmentForm = document.getElementById('appointmentForm');
    const fechaInput = document.getElementById('fecha');
    const horaSelect = document.getElementById('hora');
    const messageDisplay = document.getElementById('message');

    // Función para mostrar mensajes de éxito o error
    function showMessage(msg, type = 'success') {
        messageDisplay.textContent = msg;
        messageDisplay.className = ''; 
        messageDisplay.classList.add(type === 'success' ? 'message-success' : 'message-error');
        messageDisplay.classList.remove('hidden');
        setTimeout(() => {
            messageDisplay.classList.add('hidden');
        }, 5000);
    }

    // Cargar horas disponibles para una fecha seleccionada
    function loadHours(selectedDate) {
        horaSelect.innerHTML = '<option value="">-- Selecciona una hora --</option>';
        fechaInput.value = selectedDate;

        // URL corregida para la API de Laravel
        fetch(`/api/disponibilidad?date=${selectedDate}`)
            .then(response => {
                if (!response.ok) throw new Error('Error en la respuesta del servidor');
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    const occupiedHours = data.data.occupied;
                    const allSlots = data.data.all_slots;

                    if (occupiedHours.length === allSlots.length) {
                        const option = document.createElement('option');
                        option.textContent = "Día Completo (Sin cupos)";
                        option.disabled = true;
                        horaSelect.appendChild(option);
                        return;
                    }

                    allSlots.forEach(hour => {
                        const option = document.createElement('option');
                        option.value = hour;
                        option.textContent = hour;

                        if (occupiedHours.includes(hour)) {
                            option.disabled = true;
                            option.textContent += " (Ocupada)";
                            option.style.color = 'red';
                        }
                        horaSelect.appendChild(option);
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showMessage('Error al cargar disponibilidad.', 'error');
            });
    }

    // Inicializar FullCalendar
    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'es',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth'
        },
        // Obtener eventos de disponibilidad para pintar el calendario
        events: function(fetchInfo, successCallback, failureCallback) {
            fetch('/api/disponibilidad')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const formattedEvents = data.data.map(item => ({
                            title: item.title,
                            start: item.date,
                            display: 'background',
                            color: item.color
                        }));
                        successCallback(formattedEvents);
                    }
                })
                .catch(error => failureCallback(error));
        },
        dateClick: function(info) {
            loadHours(info.dateStr);
            document.querySelector('.form-section').scrollIntoView({ behavior: 'smooth' });
        }
    });

    calendar.render();

    // Enviar el formulario vía AJAX
    appointmentForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(appointmentForm);
        
        fetch('/agendar-cita', {
            method: 'POST',
            body: formData,
            headers: {
                // Se agrega el token CSRF para que Laravel no bloquee la petición
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showMessage(data.message, 'success');
                appointmentForm.reset();
                fechaInput.value = ''; 
                horaSelect.innerHTML = '<option value="">-- Selecciona una hora --</option>';
                calendar.refetchEvents(); // Recarga los colores en el calendario
            } else {
                showMessage(data.message || 'Error al guardar.', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showMessage('Error de conexión.', 'error');
        });
    });
});