<x-layout>
    <div class="container-fluid px-4">
        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #ffce67 !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Stock Total</h6>
                            <h4 class="fw-bold mb-0">1,240</h4>
                            <small class="text-warning">Productos en bodega</small>
                        </div>
                        <div class="rounded-circle bg-warning bg-opacity-10 p-3">
                            <i class="bi bi-box-seam text-warning fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #ff5252 !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Salidas Hoy</h6>
                            <h4 class="fw-bold mb-0">14</h4>
                            <small class="text-danger">Stock despachado</small>
                        </div>
                        <div class="rounded-circle bg-danger bg-opacity-10 p-3">
                            <i class="bi bi-arrow-down-right text-danger fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #2ecc71 !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Entradas Hoy</h6>
                            <h4 class="fw-bold mb-0">32</h4>
                            <small class="text-success">Nuevas cargas</small>
                        </div>
                        <div class="rounded-circle bg-success bg-opacity-10 p-3">
                            <i class="bi bi-arrow-up-left text-success fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #3498db !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Valor Inventario</h6>
                            <h4 class="fw-bold mb-0">$8.5M</h4>
                            <small class="text-primary">Avalúo total</small>
                        </div>
                        <div class="rounded-circle bg-primary bg-opacity-10 p-3">
                            <i class="bi bi-currency-exchange text-primary fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm p-4 bg-white rounded-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold text-secondary m-0">Movimientos de Inventario</h4>
                    <p class="text-muted small mb-0">Historial de entradas y salidas de productos</p>
                </div>
                <a href="{{ route('InventarioMovimiento.create') }}" class="btn btn-info text-white shadow-sm fw-bold px-4">
                    <i class="bi bi-arrow-left-right me-2"></i> REGISTRAR MOVIMIENTO
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
                            <th class="border-0">Tipo</th>
                            <th class="border-0">Cantidad</th>
                            <th class="border-0">ID Producto</th>
                            <th class="border-0">Fecha</th>
                            <th class="border-0 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inventario_movimientos as $movimiento)
                        <tr>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border">{{ $movimiento->id }}</span>
                            </td>
                            <td>
                                {{-- Ejemplo de lógica visual para el tipo de movimiento --}}
                                @if(strtolower($movimiento->tipo) == 'entrada')
                                    <span class="badge bg-success bg-opacity-10 text-success border border-success px-3">Entrada</span>
                                @else
                                    <span class="badge bg-danger bg-opacity-10 text-danger border border-danger px-3">Salida</span>
                                @endif
                            </td>
                            <td class="fw-bold">{{ $movimiento->cantidad }} uds.</td>
                            <td class="text-muted">#{{ $movimiento->id_producto }}</td>
                            <td><i class="bi bi-clock-history me-1"></i> {{ $movimiento->fecha }}</td>
                            <td>
                                <div class="d-flex gap-3 justify-content-center">
                                    <a href="{{ route('InventarioMovimiento.edit', $movimiento->id) }}" class="text-warning">
                                        <i class="bi bi-pencil-square fs-5"></i>
                                    </a>
                                    <form method="POST" action="{{ route('InventarioMovimiento.destroy', $movimiento->id) }}" onsubmit="return confirm('¿Eliminar este registro?')">
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