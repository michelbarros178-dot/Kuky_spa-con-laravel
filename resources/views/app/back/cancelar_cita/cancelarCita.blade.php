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
                    @if(session('message'))
                        <div class="alert alert-secondary my-2 border-info shadow-sm">{{ session('message') }}</div>
                    @endif

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="fw-bold text-secondary m-0">Cancelaciones de Citas</h4>
                        <a href="{{ route('cancelarCita.create') }}" class="btn btn-info text-white shadow-sm fw-bold">
                            <i class="bi bi-calendar-x-fill me-2"></i> NUEVA CANCELACIÓN
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="bg-light text-secondary">
                                <tr>
                                    <th class="border-0">#ID</th>
                                    <th class="border-0">Motivo</th>
                                    <th class="border-0">Fecha de Cancelación</th>
                                    <th class="border-0 text-center">ID Cita</th>
                                    <th class="border-0 text-center">ID Usuario</th>
                                    <th class="border-0 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cancelar_citas as $cancelar_cita)
                                <tr>
                                    <td class="fw-bold">{{ $cancelar_cita->id }}</td>
                                    <td>{{ $cancelar_cita->motivo }}</td>
                                    <td>{{ $cancelar_cita->fecha_cancelacion }}</td>
                                    <td class="text-center">
                                        <span class="badge bg-light text-dark border">{{ $cancelar_cita->id_cita }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-light text-dark border">{{ $cancelar_cita->id_usuario }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2 justify-content-center">
                                            <a href="{{ route('cancelarCita.edit', $cancelar_cita) }}" class="text-warning">
                                                <i class="bi bi-pencil-square fs-5"></i>
                                            </a>
                                            <form method="POST" action="{{ route('cancelarCita.destroy', $cancelar_cita) }}" onsubmit="return confirm('¿Desea eliminar este registro?')">
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
</x-layout>