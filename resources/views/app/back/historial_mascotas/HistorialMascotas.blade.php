<x-layout>
    <div class="container-fluid px-4">
        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #ffce67 !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Total Historias</h6>
                            <h4 class="fw-bold mb-0">{{ $historial_mascotas->count() }}</h4>
                            <small class="text-warning">Registros globales</small>
                        </div>
                        <div class="rounded-circle bg-warning bg-opacity-10 p-3">
                            <i class="bi bi-folder2-open text-warning fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #ff5252 !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Críticos</h6>
                            <h4 class="fw-bold mb-0">5</h4>
                            <small class="text-danger">Atención urgente</small>
                        </div>
                        <div class="rounded-circle bg-danger bg-opacity-10 p-3">
                            <i class="bi bi-heart-pulse text-danger fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #2ecc71 !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Mascotas Saludables</h6>
                            <h4 class="fw-bold mb-0">92%</h4>
                            <small class="text-success">Estado óptimo</small>
                        </div>
                        <div class="rounded-circle bg-success bg-opacity-10 p-3">
                            <i class="bi bi-check2-circle text-success fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #3498db !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Nuevos Hoy</h6>
                            <h4 class="fw-bold mb-0">12</h4>
                            <small class="text-primary">Ingresos recientes</small>
                        </div>
                        <div class="rounded-circle bg-primary bg-opacity-10 p-3">
                            <i class="bi bi-plus-square text-primary fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm p-4 bg-white rounded-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold text-secondary m-0">Historial Clínico de Mascotas</h4>
                    <p class="text-muted small mb-0">Seguimiento médico y observaciones de Kuky Pets</p>
                </div>
                <a href="{{ route('HistorialMascotas.create') }}" class="btn btn-info text-white shadow-sm fw-bold px-4">
                    <i class="bi bi-plus-lg me-2"></i> NUEVO HISTORIAL
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success border-0 shadow-sm mb-4">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="bg-light text-secondary">
                        <tr>
                            <th class="border-0 text-center">#</th>
                            <th class="border-0">Mascota (ID)</th>
                            <th class="border-0">Descripción del Caso</th>
                            <th class="border-0">Fecha de Registro</th>
                            <th class="border-0 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($historial_mascotas as $historial)
                        <tr>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border">{{ $historial->id }}</span>
                            </td>
                            <td class="fw-bold text-primary">#{{ $historial->id_mascota }}</td>
                            <td>
                                <div class="text-truncate" style="max-width: 300px;" title="{{ $historial->descripcion }}">
                                    {{ $historial->descripcion }}
                                </div>
                            </td>
                            <td class="text-muted">{{ $historial->created_at ?? 'N/A' }}</td>
                            <td>
                                <div class="d-flex gap-3 justify-content-center">
                                    <a href="{{ route('HistorialMascotas.edit', $historial->id) }}" class="text-warning">
                                        <i class="bi bi-pencil-square fs-5"></i>
                                    </a>
                                    <form method="POST" action="{{ route('HistorialMascotas.destroy', $historial->id) }}" onsubmit="return confirm('¿Eliminar este registro de salud?')">
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