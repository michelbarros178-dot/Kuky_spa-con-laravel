<x-layout>
    <div class="container-fluid px-4">
        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #ffce67 !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Ganancias</h6>
                            <h4 class="fw-bold mb-0">$30,200</h4>
                            <small class="text-warning">10% cambios</small>
                        </div>
                        <div class="rounded-circle bg-warning bg-opacity-10 p-3">
                            <i class="bi bi-currency-dollar text-warning fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #ff5252 !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Tareas</h6>
                            <h4 class="fw-bold mb-0">145</h4>
                            <small class="text-danger">28% performance</small>
                        </div>
                        <div class="rounded-circle bg-danger bg-opacity-10 p-3">
                            <i class="bi bi-calendar-check text-danger fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #2ecc71 !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Visitas</h6>
                            <h4 class="fw-bold mb-0">290+</h4>
                            <small class="text-success">10k diarias</small>
                        </div>
                        <div class="rounded-circle bg-success bg-opacity-10 p-3">
                            <i class="bi bi-eye text-success fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #3498db !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Descargas</h6>
                            <h4 class="fw-bold mb-0">500</h4>
                            <small class="text-primary">App Store</small>
                        </div>
                        <div class="rounded-circle bg-primary bg-opacity-10 p-3">
                            <i class="bi bi-hand-thumbs-up text-primary fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm p-4 bg-white">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold text-secondary m-0">Confirmaciones de Citas</h4>
                <a href="{{ route('ConfirmacionCitas.create') }}" class="btn btn-info text-white shadow-sm fw-bold">
                    <i class="bi bi-check-circle-fill me-2"></i> NUEVA CONFIRMACIÓN
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success border-0 shadow-sm mb-3">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="bg-light text-secondary">
                        <tr>
                            <th class="border-0 text-center">ID</th>
                            <th class="border-0">ID Cita</th>
                            <th class="border-0">Fecha Confirmación</th>
                            <th class="border-0">Estado</th>
                            <th class="border-0 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($confirmacion_citas as $confirmacion)
                        <tr>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border">{{ $confirmacion->id }}</span>
                            </td>
                            <td class="fw-bold text-dark">#{{ $confirmacion->id_cita }}</td>
                            <td>{{ $confirmacion->fecha_confirmacion ?? 'No registrada' }}</td>
                            <td>
                                {{-- Ejemplo de badge dinámico para el estado --}}
                                <span class="badge bg-success bg-opacity-10 text-success border border-success">
                                    Confirmada
                                </span>
                            </td>
                            <td>
                                <div class="d-flex gap-3 justify-content-center">
                                    {{-- Editar --}}
                                    <a href="{{ route('ConfirmacionCitas.edit', $confirmacion->id) }}" class="text-warning">
                                        <i class="bi bi-pencil-square fs-5"></i>
                                    </a>

                                    {{-- Eliminar --}}
                                    <form method="POST" action="{{ route('ConfirmacionCitas.destroy', $confirmacion->id) }}" onsubmit="return confirm('¿Eliminar esta confirmación?')">
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

            {{-- Paginación --}}
            <div class="mt-4">
                @if(method_exists($confirmacion_citas, 'links'))
                    {{ $confirmacion_citas->links() }}
                @endif
            </div>
        </div>
    </div>
</x-layout>