@extends('layouts.app')

@section('content')
<section class="hero reveal">
    <div class="hero-text">
        <h1>Nuestra fundadora <span>Doralba Muños</span></h1>
        <p>
            "Fundadora de KukyPets. Apasionada por el bienestar animal y comprometida con ofrecer experiencias únicas de salud y estética para tus mascotas. Lidero este espacio con la visión de elevar los estándares de cuidado canino, garantizando seguridad, amor y profesionalismo en cada visita."
        </p>
    </div>

    <div class="hero-image">
        <img src="{{ asset('images/g3.jpeg') }}" class="img-arc" alt="Hero Cat">
    </div>
</section>

   <!-- Sección Equipo con Tarjetas -->
<section class="team-section">
    <h2 class="title-blue">El Equipo Detrás del Código</h2>
    <p style="text-align: center; color: #888; margin-bottom: 40px;">Expertos apasionados por la tecnología y los animales.</p>
    
    <div class="team-grid">
        @php
            $team = [
                ['name' => 'Valentina Blandón', 'role' => 'Frontend Developer', 'image' => 'valentina.jpg'],
                ['name' => 'Michelle Betancurt', 'role' => 'Backend Developer', 'image' => '01.jpg'],
                ['name' => 'Sarita Salazar', 'role' => 'UI/UX Designer', 'image' => 'sarita.jpg'],
                ['name' => 'Eduardo Gimenez', 'role' => 'Project Manager', 'image' => 'eduar.jpg'],
            ];
        @endphp

        @foreach($team as $member)
        <div class="dev-card">
            <div class="dev-img-container">
                <img src="{{ asset('images/' . $member['image']) }}" alt="{{ $member['name'] }}">
                <div class="dev-info-overlay">
                    <h3>{{ $member['name'] }}</h3>
                    <span class="role-badge">{{ $member['role'] }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<div class="gallery-container">
  <div class="cards-wrapper" id="gallery">
    <!-- IMAGEN 1 -->
    <div class="card-item">
      <img src="{{ asset('images/g1.jpeg') }}" alt="Perrito Spa 1">
    </div>
    <!-- IMAGEN 2 -->
    <div class="card-item">
      <img src="{{ asset('images/g2.jpeg') }}" alt="Perrito Spa 2">
    </div>
    <!-- IMAGEN 3 -->
    <div class="card-item">
      <img src="{{ asset('images/g3.jpeg') }}" alt="Perrito Spa 3">
    </div>
    <!-- IMAGEN 4 (¡AGREGA MÁS AQUÍ!) -->
    <div class="card-item">
      <img src="{{ asset('images/g4.jpeg') }}" alt="Perrito Spa 4">
    </div>
    <!-- IMAGEN 5 -->
     <div class="card-item">
      <img src="{{ asset('images/g5.jpeg') }}" alt="Perrito Spa 5">
    </div>
  </div>

  <!-- Controles (Flechas de image_4.png) -->
  <div class="nav-controls">
    <button class="arrow prev-arrow" id="prevBtn">
      <span class="icon">&#10094;</span> <!-- Icono < -->
    </button>
    <button class="arrow next-arrow" id="nextBtn">
      <span class="icon">&#10095;</span> <!-- Icono > -->
    </button>
  </div>
</div>

</div>
@endsection