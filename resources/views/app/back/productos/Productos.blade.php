<x-layout>
    <div class="container-fluid px-4">
        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #ffce67 !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Items Totales</h6>
                            <h4 class="fw-bold mb-0">120</h4>
                            <small class="text-warning">SKUs activos</small>
                        </div>
                        <div class="rounded-circle bg-warning bg-opacity-10 p-3">
                            <i class="bi bi-tag-fill text-warning fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #ff5252 !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Stock Bajo</h6>
                            <h4 class="fw-bold mb-0">12</h4>
                            <small class="text-danger">Necesitan reponer</small>
                        </div>
                        <div class="rounded-circle bg-danger bg-opacity-10 p-3">
                            <i class="bi bi-graph-down-arrow text-danger fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #2ecc71 !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Categorías</h6>
                            <h4 class="fw-bold mb-0">8</h4>
                            <small class="text-success">Organización</small>
                        </div>
                        <div class="rounded-circle bg-success bg-opacity-10 p-3">
                            <i class="bi bi-grid-fill text-success fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #3498db !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Valor Stock</h6>
                            <h4 class="fw-bold mb-0">$15.2M</h4>
                            <small class="text-primary">Inversión total</small>
                        </div>
                        <div class="rounded-circle bg-primary bg-opacity-10 p-3">
                            <i class="bi bi-cart-check-fill text-primary fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm p-4 bg-white rounded-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold text-secondary m-0">Catálogo de Productos</h4>
                    <p class="text-muted small mb-0">Inventario de suministros y accesorios de Kuky Pets</p>
                </div>
                <a href="{{ route('Productos.create') }}" class="btn btn-info text-white shadow-sm fw-bold px-4">
                    <i class="bi bi-plus-circle me-2"></i> AGREGAR PRODUCTO
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
                            <th class="border-0">Nombre del Producto</th>
                            <th class="border-0">Precio Venta</th>
                            <th class="border-0 text-center">Existencias</th>
                            <th class="border-0 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $producto)
                        <tr>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border">{{ $producto->id }}</span>
                            </td>
                            <td class="fw-bold text-dark">
                                <i class="bi bi-bag-plus text-muted me-2"></i>{{ $producto->nombre_producto }}
                            </td>
                            <td class="fw-bold text-success">
                                ${{ number_format($producto->precio_venta, 0, ',', '.') }}
                            </td>
                            <td class="text-center">
                                <span class="badge {{ $producto->stock <= 5 ? 'bg-danger' : 'bg-light text-primary border-primary' }} px-3 py-2">
                                    {{ $producto->stock }} unidades
                                </span>
                            </td>
                            <td>
                                <div class="d-flex gap-3 justify-content-center">
                                    <a href="{{ route('Productos.edit', $producto->id) }}" class="text-warning">
                                        <i class="bi bi-pencil-square fs-5"></i>
                                    </a>
                                    <form method="POST" action="{{ route('Productos.destroy', $producto->id) }}" onsubmit="return confirm('¿Eliminar este producto permanentemente?')">
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