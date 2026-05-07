<x-layout>
    <div class="container-fluid px-4">
        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #3498db !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Asignaciones</h6>
                            <h4 class="fw-bold mb-0">{{ $servicio_productos->count() }}</h4>
                            <small class="text-primary">Productos vinculados</small>
                        </div>
                        <div class="rounded-circle bg-primary bg-opacity-10 p-3">
                            <i class="bi bi-link-45deg text-primary fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #2ecc71 !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Eficiencia</h6>
                            <h4 class="fw-bold mb-0">Controlado</h4>
                            <small class="text-success">Uso de insumos</small>
                        </div>
                        <div class="rounded-circle bg-success bg-opacity-10 p-3">
                            <i class="bi bi-clipboard-data text-success fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm p-4 bg-white rounded-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold text-secondary m-0">Insumos de Servicios</h4>
                    <p class="text-muted small mb-0">Asociación de productos necesarios para cada servicio</p>
                </div>
                <a href="{{ route('ServicioProducto.create') }}" class="btn btn-info text-white shadow-sm fw-bold px-4">
                    <i class="bi bi-plus-circle me-2"></i> ASIGNAR PRODUCTO
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
                            <th class="border-0 text-center">ID</th>
                            <th class="border-0">ID Servicio</th>
                            <th class="border-0">ID Producto</th>
                            <th class="border-0 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($servicio_productos as $item)
                        <tr>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border">{{ $item->id }}</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="badge bg-info bg-opacity-10 text-info border border-info px-3">
                                        Servicio #{{ $item->id_servicio }}
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="badge bg-warning bg-opacity-10 text-warning border border-warning px-3">
                                        Producto #{{ $item->id_producto }}
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex gap-3 justify-content-center">
                                    <a href="{{ route('ServicioProducto.edit', $item->id) }}" class="text-warning">
                                        <i class="bi bi-pencil-square fs-5"></i>
                                    </a>
                                    <form method="POST" action="{{ route('ServicioProducto.destroy', $item->id) }}" onsubmit="return confirm('¿Eliminar esta asociación?')">
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