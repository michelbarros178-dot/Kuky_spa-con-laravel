// --- CONTROL DE SCROLL CON LOADER ---
if ('scrollRestoration' in history) {
    history.scrollRestoration = 'manual';
}

document.addEventListener('DOMContentLoaded', () => {

    // --- 1. VARIABLES ---
    const counters = document.querySelectorAll('.counter');
    const statsSection = document.querySelector('.stats-bar');
    let started = false;

    // --- 2. CONTADORES PRO (SUAVES Y LENTOS) ---
    const startCount = (el) => {
        const target = parseInt(el.getAttribute('data-target'));
        const suffix = el.getAttribute('data-suffix') || '';

        let startTime = null;
        const duration = 3000; // ⏱️ 3 segundos (puedes subir a 4000 si quieres más lento)

        const animate = (timestamp) => {
            if (!startTime) startTime = timestamp;

            const progress = timestamp - startTime;
            const percentage = Math.min(progress / duration, 1);

            // 🔥 easing suave (pro)
            const easeOut = 1 - Math.pow(1 - percentage, 3);

            const current = Math.floor(easeOut * target);

            // 🔥 formato con separador de miles
            el.innerText = current.toLocaleString() + suffix;

            if (percentage < 1) {
                requestAnimationFrame(animate);
            } else {
                el.innerText = target.toLocaleString() + suffix;
            }
        };

        requestAnimationFrame(animate);
    };

    // --- 3. REVEAL ON SCROLL ---
    const revealSections = () => {
        const reveals = document.querySelectorAll('.reveal');

        reveals.forEach(section => {
            const windowHeight = window.innerHeight;
            const elementTop = section.getBoundingClientRect().top;
            const elementVisible = 150;

            if (elementTop < windowHeight - elementVisible) {
                section.classList.add('active');
            }
        });
    };

    // --- 4. INTERSECTION OBSERVER (CONTADORES) ---
    if (statsSection) {
        const statsObserver = new IntersectionObserver((entries) => {
            if (entries[0].isIntersecting && !started) {
                counters.forEach(counter => startCount(counter));
                started = true;
            }
        }, { threshold: 0.5 });

        statsObserver.observe(statsSection);
    }

    // --- 5. HEADER SCROLL ---
    const headerScroll = () => {
        const header = document.querySelector('.header');
        if (!header) return;

        if (window.scrollY > 50) {
            header.style.background = 'rgba(231, 231, 231, 0.95)';
            header.style.padding = '5px 0';
            header.style.boxShadow = '0 5px 20px rgb(255, 255, 255)';
        } else {
            header.style.background = 'transparent';
            header.style.padding = '20px 0';
            header.style.boxShadow = 'none';
        }
    };

    // --- 6. EVENTOS ---
    window.addEventListener('scroll', () => {
        revealSections();
        headerScroll();
    });

    revealSections();
    headerScroll();

    // --- 7. FILTRO DE PRODUCTOS ---
    const botonesFiltro = document.querySelectorAll('.btn-cat');
    const cards = document.querySelectorAll('.product-card');

    botonesFiltro.forEach(boton => {
        boton.addEventListener('click', () => {
            const categoria = boton.getAttribute('data-cat');

            botonesFiltro.forEach(btn => btn.classList.remove('active'));
            boton.classList.add('active');

            cards.forEach((card, index) => {
                if (card.classList.contains(categoria)) {

                    card.classList.remove('oculto');

                    setTimeout(() => {
                        card.classList.add('mostrar');
                    }, index * 120);

                } else {
                    card.classList.remove('mostrar');
                    card.classList.add('oculto');
                }
            });
        });
    });

});

document.addEventListener('DOMContentLoaded', () => {
  const gallery = document.getElementById('gallery');
  const items = gallery.querySelectorAll('.card-item');
  const nextBtn = document.getElementById('nextBtn');
  const prevBtn = document.getElementById('prevBtn');
  let currentIndex = 0;
  const numItems = items.length;

  // Si hay menos de 3 imágenes, esta lógica de carrusel infinito no funcionará.
  if (numItems < 3) {
    console.error("La galería necesita al menos 3 imágenes para funcionar infinitamente.");
    // Opcional: Ocultar controles o mostrar un mensaje
    return;
  }

  function updateGallery() {
    // 1. Limpiamos todas las clases de posición
    items.forEach(item => {
      item.classList.remove('active', 'prev', 'next', 'far-prev', 'far-next');
      // Aseguramos que la opacidad sea 0 por defecto para que no se "desvanezcan" en el centro
      item.style.opacity = '0'; 
    });

    // 2. Calculamos los índices de forma circular
    const activeIndex = currentIndex;
    const prevIndex = (currentIndex - 1 + numItems) % numItems;
    const nextIndex = (currentIndex + 1) % numItems;
    
    // Para la transición suave, necesitamos saber qué viene después
    const farPrevIndex = (currentIndex - 2 + numItems) % numItems;
    const farNextIndex = (currentIndex + 2) % numItems;

    // 3. Asignamos clases y estilos para el movimiento
    items[activeIndex].classList.add('active');
    items[activeIndex].style.opacity = '1';

    items[prevIndex].classList.add('prev');
    items[prevIndex].style.opacity = '0.6';

    items[nextIndex].classList.add('next');
    items[nextIndex].style.opacity = '0.6';
    
    items[farPrevIndex].classList.add('far-prev');
    items[farNextIndex].classList.add('far-next');
  }

  // Evento para el botón 'Siguiente'
  nextBtn.addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % numItems; // Siguiente circular
    updateGallery();
  });

  // Evento para el botón 'Anterior'
  prevBtn.addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + numItems) % numItems; // Anterior circular
    updateGallery();
  });

  // Evento para hacer clic directamente en las imágenes laterales
  items.forEach((item, index) => {
    item.addEventListener('click', () => {
        // Solo reaccionamos si no es la imagen central
        if (index !== currentIndex) {
            currentIndex = index;
            updateGallery();
        }
    });
  });

  // Iniciar la galería
  updateGallery();
});