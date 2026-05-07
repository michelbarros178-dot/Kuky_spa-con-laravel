<x-layout>
    <div class="container-fluid px-4">
        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #ffce67 !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Ganancias</h6>
                            <h4 class="fw-bold mb-0">$30,200</h4>
                        </div>
                        <div class="rounded-circle bg-warning bg-opacity-10 p-3">
                            <i class="bi bi-currency-dollar text-warning fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
            </div>

        <div class="row m-4">
            <div class="col-12">
                @if(session('success'))
                    <div class="alert alert-success my-2 border-0 shadow-sm">{{ session('success') }}</div>
                @endif

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold text-secondary">Productos en Citas</h2>
                    <a href="{{ route('CitaProducto.create') }}" class="btn btn-primary shadow-sm">
                        <i class="bi bi-plus-lg"></i> NUEVO REGISTRO
                    </a>
                </div>
            </div>

            <div class="col-12 mt-2">
                <div class="table-responsive shadow-sm bg-white rounded">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>ID Cita</th>
                                <th>ID Producto</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($cita_producto as $item)
                            <tr>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border">{{ $item->id }}</span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border">{{ $item->id_cita }}</span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border">{{ $item->id_producto }}</span>
                            </td>
                                <td>
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="{{ route('CitaProducto.edit', $item->id) }}" class="btn btn-sm btn-outline-warning border-0">
                                            <i class="bi bi-pencil-square fs-5"></i>
                                        </a>

                                        <form action="{{ route('CitaProducto.destroy', $item->id) }}" method="POST" onsubmit="return confirm('¿Eliminar?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger border-0">
                                                <i class="bi bi-trash3-fill fs-5"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">No hay registros disponibles.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 d-flex justify-content-center">
                    {{ $cita_productos->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout>