@extends('layouts.app')

@section('title', 'Inicio - Kukypets')

@section('content')

<!--  LOADER -->
<div id="loader">
    <img src="{{ asset('images/perritos.gif') }}" alt="Cargando...">
</div>

<!-- HERO -->
<section class="hero reveal">
    <div class="hero-text">
        <h1>Calidez para tu canino con <span>KukyPets</span></h1>
        <h2 style="font-family: 'Playfair Display', serif; color: var(--accent); font-size: 1.8rem; margin-bottom: 1rem;">
            Mimos con Estilo
        </h2>
        <p>
            Donde el bienestar de tu mejor amigo es nuestra prioridad
        </p>
        <a href="#productos" class="btn-primary">¡Agenda tu cita aquí!</a>
    </div>

    <div class="hero-image">
        <img src="{{ asset('images/paseo1.jpg') }}" class="img-arc" alt="Hero Cat">
    </div>
</section>

<!-- STATS -->
<section class="stats-bar">
    <div class="stat">
        <i class="fas fa-paw"></i>
        <h2 class="counter" data-target="5000" data-suffix="+">0</h2>
        <p>Clientes atendidos</p>
    </div>
    <div class="stat">
        <i class="fas fa-dog"></i>
        <h2 class="counter" data-target="2000" data-suffix="+">0</h2>
        <p>Caninos felices</p>
    </div>
    <div class="stat">
        <i class="fas fa-heart"></i>
        <h2 class="counter" data-target="100" data-suffix="%">0</h2>
        <p>Ambiente acogedor</p>
    </div>
    <div class="stat">
        <i class="fas fa-users"></i>
        <h2 class="counter" data-target="300" data-suffix="+">0</h2>
        <p>Clientes frecuentes</p>
    </div>
</section>

<!-- ABOUT -->
<section class="about-detailed reveal">
    <div class="about-container">
        <div class="about-text">
            <span class="subtitle">Conoce un poco sobre nosotros</span>
            <h2>¿Por qué elegirnos?</h2>
            <p> Realizamos estilismo canino adaptado a las necesidades de cada raza e implementamos técnicas antiestrés para que tu mascota se sienta segura y tranquila.</p>
            <button class="btn-outline">Conoce más aquí ↘</button>
        </div>
        <div class="about-images">
            <div class="img-leaf leaf-1"><img src="{{ asset('images/g1.jpeg') }}" alt="Prep"></div>
            <div class="img-leaf leaf-2"><img src="{{ asset('images/g2.jpeg') }}" alt="Beans"></div>
        </div>
    </div>
</section>

<!-- Servicios CON FILTRO -->
<section class="products-section reveal" id="productos">
    <span class="subtitle">Nuestros servicios</span>

    <!--  BOTONES -->
<div class="categorias">
    <button class="btn-cat active" data-cat="bebidas"> Cortes</button>
    <button class="btn-cat" data-cat="salado"> Baños y salud</button>

</div>

    <!--  Servicios -->
    <div class="product-grid">

        <!-- Cortes -->
        <div class="product-card floating bebidas">
            <img src="{{ asset('images/corte-estetico7.jpg') }}" alt="Coffee">
            <h3>Corte Estetico</h3>
        </div>

        <div class="product-card floating-delayed bebidas">
            <img src="{{ asset('images/corte-higienico22.jpg') }}" alt="Coffee">
            <h3>Corte Higiénico</h3>
        </div>

        <div class="product-card floating bebidas">
            <img src="{{ asset('images/corte-unas5.jpg') }}" alt="Coffee">
            <h3>Corte de Uñas</h3>
        </div>

        <!-- Baños -->
        <div class="product-card floating salado oculto">
            <img src="{{ asset('images/bano-especial1.jpg') }}" alt="Food">
            <h3>Baño Especial</h3>
        </div>

        <div class="product-card floating-delayed salado oculto">
            <img src="{{ asset('images/antipulgas.jpeg') }}" alt="Food">
            <h3>Baño Antipulgas</h3>
        </div>

        <div class="product-card floating salado oculto">
            <img src="{{ asset('images/antiestres.jpeg') }}" alt="Food">
            <h3> Baño Antiestrés</h3>
        </div>

    </div>
</section>


    <section class="blog-section" id="blog">
        <div class=" container reveal">
            <center> <h2 class="about-title">Recomendaciones </h2></center> <br>
            <p class="section-subtitle">Consejos y noticias para el cuidado de tus peludos.</p>
            
            <div class=" blog-grid">
                <article class=" blog-card">
                    <div class="blog-image">
                        <img src="images/paseo2.jpg" alt="Noticia 1">
                    </div>
                    <div class=" blog-content">
                        <h3>Preparación para el Spa</h3>
                        <p> <b>Antes de la cita:</b> Te recomendamos dar un paseo corto con tu peludo antes de venir al spa. Esto le ayudará a liberar energía y a estar más relajado durante su sesión de belleza. <br><br>
                        <b>Alimentación:</b> "Evita darle una comida pesada justo antes de su baño. Un estómago ligero previene mareos o incomodidades mientras lo consienten."
                        </p>
                    </div>
                </article>

                <article class=" blog-card">
                    <div class="blog-image">
                        <img src="images/cepillado2.jpg" alt="Noticia 2">
                    </div>
                    <div class=" blog-content">
                        <h3>Cuidados en Casa</h3>
                        <p> <b>El cepillado es clave:</b> Cepillar a tu mascota 2 o 3 veces por semana evita nudos difíciles y ayuda a mantener su pelaje brillante entre cada visita al spa. <br><br>
                        <b>Limpieza de huellitas:</b> Después de cada paseo, limpia sus patitas con una toallita húmeda sin alcohol. Así eliminas suciedad y posibles alérgenos del camino.</p>
                    </div>
                </article>

                <article class=" blog-card">
                    <div class="blog-image">
                        <img src="images/agua1.jpg" alt="Noticia 3">
                    </div>
                    <div class=" blog-content">
                        <h3>Salud y Bienestar</h3>
                        <p> <b>Hidratación:</b> Mantener siempre agua fresca disponible es vital para la salud de su piel y pelo. Un peludo hidratado es un peludo feliz. <br><br>
                       <b> Socialización temprana:</b> Acostumbrar a los cachorros al contacto con el agua y el secador desde pequeños hace que sus futuras visitas al spa sean una experiencia divertida y sin estrés.</p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <div class="container_gallery reveal">
        <div class="card">
            <img src="https://i.pinimg.com/736x/ad/de/34/adde3464ad4b150501dc7a23bbe92ff3.jpg">
            <div class="card__head">!Me encanta Kuky pets!</div>
        </div>
        <div class="card">
            <img src="https://i.pinimg.com/736x/75/0e/54/750e54b3ba4b7a3b323d74d02928e36a.jpg">
            <div class="card__head">¡Quiero spa!</div>
        </div>
        <div class="card">
            <img src="https://i.pinimg.com/736x/53/1c/18/531c18ccb86d255d1ab2bf19325bbb73.jpg">
            <div class="card__head">!Soy feliz después del spa!</div>
        </div>
        <div class="card">
            <img src="https://i.pinimg.com/1200x/39/28/71/392871fc722e1a10da0e3147becdf8e9.jpg">
            <div class="card__head">¡En kuky pets me tratan con amor!</div>
        </div>
        <div class="card">
            <img src="https://i.pinimg.com/736x/f8/2c/ed/f82cedfbc0acbef38809215c3c1d3631.jpg">
            <div class="card__head">¡Quiero mi masaje anti estrés!</div>
        </div>
    </div>

    <!-- SECCIÓN DE CONTACTO (Se mantiene en el base porque suele ser global) -->
    <section class="contact-section">
        <div class="contact-container">
            <div class="map-box">
                <iframe src="https://www.google.com/maps?q=Bello,Antioquia&output=embed" loading="lazy"></iframe>
            </div>

            <div class="contact-form">
                <h2>Contáctanos</h2>
                <form action="#" method="POST">
                    @csrf {{-- Token de seguridad obligatorio en Laravel --}}
                    <div class="input-group">
                        <input type="text" name="nombre" required>
                        <label>Nombre</label>
                    </div>
                    <div class="input-group">
                        <input type="text" name="apellido" required>
                        <label>Apellido</label>
                    </div>
                    <div class="input-group">
                        <textarea name="mensaje" required></textarea>
                        <label>Mensaje</label>
                    </div>
                    <button type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </section>

