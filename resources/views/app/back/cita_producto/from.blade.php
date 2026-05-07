<x-layout>
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card shadow-sm" style="border: 2px solid #180785;">
                <div class="card-header text-center" style="background-color: #4df2f2; border-bottom: 2px solid #041068;">
                    <h4 class="mb-0 fw-bold text-dark">
                        {{ $cita_producto->exists ? 'Editar Cita Producto' : 'Registrar Nueva Cita Producto' }}
                    </h4>
                </div>
                
                <div class="card-body p-4">
                    <form method="POST" action="{{ $cita_producto->exists ? route('CitaProducto.update', $cita_producto) : route('CitaProducto.store') }}">
                        @csrf
                        @if($cita_producto->exists) @method('PUT') @endif

                        <div class="mb-3">
                            <label class="form-label fw-bold">#</label>
                            <input name="id" class="form-control border-info" value="{{ old('id', $cita_producto->id) }}" placeholder="Ej: 1">
                            @error('id') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">ID Cita</label>
                            <input name="id_cita" class="form-control border-info" value="{{ old('id_cita', $cita_producto->id_cita) }}" placeholder="Ej: 1">
                            @error('id_cita') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">ID Producto</label>
                            <input name="id_producto" class="form-control border-info" value="{{ old('id_producto', $cita_producto->id_producto) }}" placeholder="Ej: 1">
                            @error('id_producto') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>


                        <hr style="color: #042695;">

                        <div class="d-grid gap-2 mt-4">
                            <button class="btn btn-agregar py-2 shadow-sm">
                                <i class="bi {{ $cita_producto->exists ? 'bi-arrow-repeat' : 'bi-person-plus-fill' }}"></i>
                                {{ $cita_producto->exists ? 'ACTUALIZAR DATOS' : 'CREAR CITA PRODUCTO' }}
                            </button>
                            
                            <a href="{{ route('cita_producto.CitaProducto') }}" class="btn btn-sm btn-link text-secondary text-decoration-none text-center">
                                Cancelar y volver
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>