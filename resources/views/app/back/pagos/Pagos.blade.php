<x-layout>
    <div class="container-fluid px-4">
        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #ffce67 !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Caja Hoy</h6>
                            <h4 class="fw-bold mb-0">$12,450</h4>
                            <small class="text-warning">Ingresos del día</small>
                        </div>
                        <div class="rounded-circle bg-warning bg-opacity-10 p-3">
                            <i class="bi bi-cash-stack text-warning fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #ff5252 !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Pendientes</h6>
                            <h4 class="fw-bold mb-0">8</h4>
                            <small class="text-danger">Pagos por validar</small>
                        </div>
                        <div class="rounded-circle bg-danger bg-opacity-10 p-3">
                            <i class="bi bi-clock-history text-danger fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #2ecc71 !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Efectivo</h6>
                            <h4 class="fw-bold mb-0">65%</h4>
                            <small class="text-success">Método preferido</small>
                        </div>
                        <div class="rounded-circle bg-success bg-opacity-10 p-3">
                            <i class="bi bi-wallet2 text-success fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #3498db !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Transferencias</h6>
                            <h4 class="fw-bold mb-0">35%</h4>
                            <small class="text-primary">Bancos digitales</small>
                        </div>
                        <div class="rounded-circle bg-primary bg-opacity-10 p-3">
                            <i class="bi bi-bank text-primary fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm p-4 bg-white rounded-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold text-secondary m-0">Registro de Pagos</h4>
                    <p class="text-muted small mb-0">Control de transacciones de Kuky Pets</p>
                </div>
                <a href="{{ route('Pagos.create') }}" class="btn btn-info text-white shadow-sm fw-bold px-4">
                    <i class="bi bi-plus-circle me-2"></i> REGISTRAR PAGO
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
                            <th class="border-0 text-center">ID</th>
                            <th class="border-0">Fecha de Pago</th>
                            <th class="border-0">Monto</th>
                            <th class="border-0 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pago as $pago)
                        <tr>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border">{{ $pago->id }}</span>
                            </td>
                            <td><i class="bi bi-calendar-check me-2 text-muted"></i>{{ $pago->fecha_pago }}</td>
                            <td class="fw-bold text-success">
                                ${{ number_format($pago->monto, 0, ',', '.') }}
                            </td>
                            <td>
                                <div class="d-flex gap-3 justify-content-center">
                                    <a href="{{ route('Pagos.edit', $pago->id) }}" class="text-warning">
                                        <i class="bi bi-pencil-square fs-5"></i>
                                    </a>
                                    <form method="POST" action="{{ route('Pagos.destroy', $pago->id) }}" onsubmit="return confirm('¿Eliminar este registro de pago?')">
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