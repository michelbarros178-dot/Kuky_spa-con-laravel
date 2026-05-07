@extends('layouts.app')

@section('title', 'Inicio - Kukypets')

@section('content')

<!-- PRODUCTOS CON FILTRO -->
<section class="products-section reveal" id="productos">
    <span class="subtitle">Nuestros servicios</span>
    <h2>¡Ven y disfrutalos!</h2>

    <!--  SERVICIOS -->
    <div class="product-grid">


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

        <div class="product-card floating bebidas">
            <img src="{{ asset('images/bano-especial1.jpg') }}" alt="Food">
            <h3>Baño Especial</h3>
        </div>

        <div class="product-card floating bebidas">
            <img src="{{ asset('images/antipulgas.jpeg') }}" alt="Food">
            <h3>Baño Antipulgas</h3>
        </div>

        <div class="product-card floating bebidas">
            <img src="{{ asset('images/antiestres.jpeg') }}" alt="Food">
            <h3> Baño Antiestrés</h3>
        </div>
        

    </div>
</section>

