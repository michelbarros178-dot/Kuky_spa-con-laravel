<x-layout>
    <div class="container-fluid px-4">
        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #ffce67 !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Total Mascotas</h6>
                            <h4 class="fw-bold mb-0">850</h4>
                            <small class="text-warning">En el sistema</small>
                        </div>
                        <div class="rounded-circle bg-warning bg-opacity-10 p-3">
                            <i class="bi bi-paw-fill text-warning fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #ff5252 !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Citas Pendientes</h6>
                            <h4 class="fw-bold mb-0">24</h4>
                            <small class="text-danger">Para hoy</small>
                        </div>
                        <div class="rounded-circle bg-danger bg-opacity-10 p-3">
                            <i class="bi bi-calendar-event text-danger fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #2ecc71 !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Nuevos Dueños</h6>
                            <h4 class="fw-bold mb-0">15</h4>
                            <small class="text-success">Este mes</small>
                        </div>
                        <div class="rounded-circle bg-success bg-opacity-10 p-3">
                            <i class="bi bi-people-fill text-success fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #3498db !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Servicios Top</h6>
                            <h4 class="fw-bold mb-0">Peluquería</h4>
                            <small class="text-primary">El más pedido</small>
                        </div>
                        <div class="rounded-circle bg-primary bg-opacity-10 p-3">
                            <i class="bi bi-scissors text-primary fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm p-4 bg-white rounded-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold text-secondary m-0">Nuestros Pacientes</h4>
                    <p class="text-muted small mb-0">Listado de mascotas registradas en Kuky Pets</p>
                </div>
                <a href="{{ route('Mascotas.create') }}" class="btn btn-info text-white shadow-sm fw-bold px-4">
                    <i class="bi bi-plus-lg me-2"></i> REGISTRAR MASCOTA
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success border-0 shadow-sm mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="bg-light text-secondary">
                        <tr>
                            <th class="border-0 text-center">#</th>
                            <th class="border-0">Nombre Mascota</th>
                            <th class="border-0">Especie / Raza</th>
                            <th class="border-0 text-center">ID Cliente</th>
                            <th class="border-0 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mascotas as $mascota)
                        <tr>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border">{{ $mascota->id }}</span>
                            </td>
                            <td class="fw-bold text-dark">
                                <i class="bi bi-gender-ambiguous text-muted me-2"></i>{{ $mascota->nombre }}
                            </td>
                            <td>{{ $mascota->especie }} / <span class="text-muted">{{ $mascota->raza }}</span></td>
                            <td class="text-center">
                                <span class="badge bg-light text-primary border border-primary bg-opacity-10">DUEÑO #{{ $mascota->id_cliente }}</span>
                            </td>
                            <td>
                                <div class="d-flex gap-3 justify-content-center">
                                    <a href="{{ route('Mascotas.edit', $mascota->id) }}" class="text-warning">
                                        <i class="bi bi-pencil-square fs-5"></i>
                                    </a>
                                    <form method="POST" action="{{ route('Mascotas.destroy', $mascota->id) }}" onsubmit="return confirm('¿Eliminar a esta mascota del registro?')">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn p-0 text-danger border-0">
                                            <i class="bi bi-trash3-fill fs-5"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>