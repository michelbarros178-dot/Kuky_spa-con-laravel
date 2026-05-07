<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuky Pets - Panel Administrativo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --sidebar-width: 260px;
            --bg-light: #f8f9fa;
            --info-kuky: #00bcd4; /* Turquesa profesional */
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-light);
            margin: 0;
            overflow-x: hidden;
        }

        /* Estructura Flexbox para Sidebar + Contenido */
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR CON SCROLL HABILITADO */
        .sidebar {
            width: var(--sidebar-width);
            background: #fff;
            border-right: 1px solid #ebedef;
            position: fixed;
            height: 100vh;
            padding: 1.5rem;
            z-index: 1000;
            
            /* Habilitar desplazamiento vertical */
            overflow-y: auto;
        }

        /* Estilo elegante para la barra de scroll en Chrome/Safari */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }
        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }
        .sidebar::-webkit-scrollbar-thumb {
            background: #d1d5db;
            border-radius: 10px;
        }
        .sidebar::-webkit-scrollbar-thumb:hover {
            background: #9ca3af;
        }

        .sidebar-brand {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--info-kuky);
            text-decoration: none;
            display: block;
            margin-bottom: 2.5rem;
        }

        .nav-link-custom {
            display: flex;
            align-items: center;
            padding: 0.8rem 1rem;
            color: #5b6b79;
            text-decoration: none;
            border-radius: 8px;
            margin-bottom: 0.5rem;
            transition: all 0.2s;
        }

        .nav-link-custom:hover, .nav-link-custom.active {
            background-color: #f0f4f8;
            color: #121926;
            font-weight: 600;
        }

        .nav-link-custom i {
            margin-right: 12px;
            font-size: 1.2rem;
        }

        /* CONTENIDO PRINCIPAL */
        .main-wrapper {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 0;
            display: flex;
            flex-direction: column;
        }

        /* Header Superior */
        .top-navbar {
            background: #fff;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ebedef;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        /* Estilo de la tabla */
        .table-container {
            background: #fff;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.03);
            margin-top: 1rem;
        }

        .custom-table thead th {
            background-color: #fff !important;
            color: #121926;
            font-weight: 600;
            border-bottom: 2px solid #f0f2f5;
            padding: 1rem;
        }

        .custom-table tbody td {
            padding: 1rem;
            vertical-align: middle;
            color: #5b6b79;
            border-bottom: 1px solid #f0f2f5;
        }
    </style>
</head>
<body>

    <div class="dashboard-container">
        <aside class="sidebar shadow-sm">
            <a href="#" class="sidebar-brand">
                <i class="bi bi-paw-fill"></i> Kuky Pets
            </a>
            
            <nav>
                <a href="/dashboard" class="nav-link-custom active">
                    <i class="bi bi-grid-fill"></i> Dashboard
                </a>
                <a href="{{ route('cancelar_cita.cancelarCita') }}" class="nav-link-custom">
                    <i class="bi bi-x-circle-fill"></i> Cancelar Citas
                </a>
                <a href="{{ route('categoria_servicio.categoriaServicio') }}" class="nav-link-custom">
                    <i class="bi bi-tags-fill"></i> Categoría Servicio
                </a>
                <a href="{{ route('cita_producto.CitaProducto') }}" class="nav-link-custom">
                    <i class="bi bi-bag-plus-fill"></i> Cita Producto
                </a>
                <a href="{{ route('cita_servicio.CitaServicio') }}" class="nav-link-custom">
                    <i class="bi bi-scissors"></i> Cita Servicio
                </a>
                <a href="{{ route('citas.Citas') }}" class="nav-link-custom">
                    <i class="bi bi-calendar-event-fill"></i> Citas
                </a>
                <a href="{{ route('clientes.Clientes') }}" class="nav-link-custom">
                    <i class="bi bi-person-heart"></i> Clientes
                </a>
                <a href="{{ route('confirmacion_citas.ConfirmacionCitas') }}" class="nav-link-custom">
                    <i class="bi bi-check-circle-fill"></i> Confirmación Citas
                </a>
                <a href="{{ route('facturas.Facturas') }}" class="nav-link-custom">
                    <i class="bi bi-file-earmark-text-fill"></i> Facturas
                </a>
                <a href="{{ route('historial_mascotas.HistorialMascotas') }}" class="nav-link-custom">
                    <i class="bi bi-clipboard2-pulse-fill"></i> Historial Mascotas
                </a>
                <a href="{{ route('inventario_movimiento.InventarioMovimiento') }}" class="nav-link-custom">
                    <i class="bi bi-box-seam-fill"></i> Inventario
                </a>
                <a href="{{ route('mascotas.Mascotas') }}" class="nav-link-custom">
                    <i class="bi bi-dog"></i> Mascotas
                </a>
                <a href="{{ route('productos.Productos') }}" class="nav-link-custom">
                    <i class="bi bi-cart-fill"></i> Productos
                </a>
                <a href="{{ route('rol.Rol') }}" class="nav-link-custom">
                    <i class="bi bi-shield-lock-fill"></i> Roles
                </a>
                <a href="{{ route('empleado.Empleado') }}" class="nav-link-custom">
                    <i class="bi bi-briefcase-fill"></i> Empleados
                </a>
                <a href="{{ route('pagos.Pagos') }}" class="nav-link-custom">
                    <i class="bi bi-cash-coin"></i> Pagos
                </a>
                <a href="{{ route('servicio_producto.ServicioProducto') }}" class="nav-link-custom">
                    <i class="bi bi-link-45deg"></i> Servicio Producto
                </a>
                <a href="{{ route('servicio.Servicio') }}" class="nav-link-custom">
                    <i class="bi bi-stars"></i> Servicios
                </a>
                <a href="{{ route('user.User') }}" class="nav-link-custom">
                    <i class="bi bi-people-fill"></i> Usuarios
                </a>

                <div class="mt-5 pt-4 border-top">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link-custom text-danger border-0 bg-transparent w-100 text-start">
                            <i class="bi bi-box-arrow-left"></i> Salir
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        <div class="main-wrapper">
            <header class="top-navbar">
                <h5 class="m-0 fw-bold text-secondary">Panel Administrativo</h5>
                <div class="d-flex align-items-center">
                    <i class="bi bi-bell fs-5 me-3 text-muted"></i>
                    <div class="rounded-circle bg-info text-white d-flex align-items-center justify-content-center fw-bold" style="width: 40px; height: 40px;">
                        {{ substr(Auth::user()->name ?? 'V', 0, 1) }}
                    </div>
                </div>
            </header>

            <main class="p-4">
                {{ $slot }}
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>