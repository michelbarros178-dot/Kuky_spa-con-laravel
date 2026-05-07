<x-layout>
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card shadow-sm" style="border: 2px solid #180785;">
                <div class="card-header text-center" style="background-color: #4df2f2; border-bottom: 2px solid #041068;">
                    <h4 class="mb-0 fw-bold text-dark">
                        {{ $inventario_movimiento->exists ? 'Editar Inventario de Movimientos' : 'Registrar Nuevo Inventario de Movimientos' }}
                    </h4>
                </div>
                
                <div class="card-body p-4">
                    <form method="POST" action="{{ $inventario_movimiento->exists ? route('InventarioMovimiento.update', $inventario_movimiento) : route('InventarioMovimiento.store') }}">
                        @csrf
                        @if($inventario_movimiento->exists) @method('PUT') @endif

                        <div class="mb-3">
                            <label class="form-label fw-bold">#</label>
                            <input name="id" class="form-control border-info" value="{{ old('id', $inventario_movimiento->id) }}" placeholder="Ej: 1">
                            @error('id') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Tipo de movimiento</label>
                            <input name="tipo_movimiento" class="form-control border-info" value="{{ old('tipo_movimiento', $inventario_movimiento->tipo_movimiento) }}" placeholder="Ej: Entrada">
                            @error('tipo_movimiento') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Cantidad</label>
                            <input name="cantidad" class="form-control border-info" value="{{ old('cantidad', $inventario_movimiento->cantidad) }}" placeholder="Ej: 10">
                            @error('cantidad') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">ID Producto</label>
                                <input name="id_producto" class="form-control border-info" value="{{ old('id_producto', $inventario_movimiento->id_producto) }}">
                                @error('id_producto') 
                                    <div class="text-danger small mt-1">{{ $message }}</div> 
                                @enderror
                            </div>


                        <hr style="color: #042695;">

                        <div class="d-grid gap-2 mt-4">
                            <button class="btn btn-agregar py-2 shadow-sm">
                                <i class="bi {{ $inventario_movimiento->exists ? 'bi-arrow-repeat' : 'bi-person-plus-fill' }}"></i>
                                {{ $inventario_movimiento->exists ? 'ACTUALIZAR DATOS' : 'CREAR INVENTARIO DE MOVIMIENTOS' }}
                            </button>
                            
                            <a href="{{ route('inventario_movimiento.InventarioMovimiento') }}" class="btn btn-sm btn-link text-secondary text-decoration-none text-center">
                                Cancelar y volver
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>