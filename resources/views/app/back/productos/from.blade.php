<x-layout>
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card shadow-sm" style="border: 2px solid #180785;">
                <div class="card-header text-center" style="background-color: #4df2f2; border-bottom: 2px solid #041068;">
                    <h4 class="mb-0 fw-bold text-dark">
                        {{ $producto->exists ? 'Editar Producto' : 'Registrar Nuevo Producto' }}
                    </h4>
                </div>
                
                <div class="card-body p-4">
                    <form method="POST" action="{{ $producto->exists ? route('Productos.update', $producto) : route('Productos.store') }}">
                        @csrf
                        @if($producto->exists) @method('PUT') @endif

                        <div class="mb-3">
                            <label class="form-label fw-bold">#</label>
                            <input name="id" class="form-control border-info" value="{{ old('id', $producto->id) }}" placeholder="Ej: 1">
                            @error('id') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nombre del producto</label>
                            <input name="nombre_producto" class="form-control border-info" value="{{ old('nombre_producto', $producto->nombre_producto) }}" placeholder="Ej: Producto 1">
                            @error('nombre_producto') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Precio</label>
                            <input name="precio" class="form-control border-info" value="{{ old('precio', $producto->precio) }}" placeholder="Ej: 100.00">
                            @error('precio') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Stock</label>
                                <input name="stock" class="form-control border-info" value="{{ old('stock', $producto->stock) }}" placeholder="Ej: 10">
                                @error('stock') 
                                    <div class="text-danger small mt-1">{{ $message }}</div> 
                                @enderror
                            </div>


                        <hr style="color: #042695;">

                        <div class="d-grid gap-2 mt-4">
                            <button class="btn btn-agregar py-2 shadow-sm">
                                <i class="bi {{ $producto->exists ? 'bi-arrow-repeat' : 'bi-person-plus-fill' }}"></i>
                                {{ $producto->exists ? 'ACTUALIZAR DATOS' : 'CREAR PRODUCTO' }}
                            </button>
                            
                            <a href="{{ route('productos.Productos') }}" class="btn btn-sm btn-link text-secondary text-decoration-none text-center">
                                Cancelar y volver
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>