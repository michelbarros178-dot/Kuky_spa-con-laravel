<x-layout>
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card shadow-sm" style="border: 2px solid #180785;">
                <div class="card-header text-center" style="background-color: #4df2f2; border-bottom: 2px solid #041068;">
                    <h4 class="mb-0 fw-bold text-dark">
                        {{ $relacion->exists ? 'Editar Servicio/Producto' : 'Registrar Nuevo Servicio/Producto' }}
                    </h4>
                </div>
                
                <div class="card-body p-4">
                    {{-- Corregido: Usamos $relacion y nombres de ruta consistentes --}}
                    <form method="POST" action="{{ $relacion->exists ? route('ServicioProducto.update', $relacion->id) : route('ServicioProducto.store') }}">
                        @csrf
                        @if($relacion->exists) 
                            @method('PUT') 
                        @endif

                        {{-- ID SERVICIO --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">ID Servicio</label>
                            <input name="id_servicio" type="number" class="form-control border-info @error('id_servicio') is-invalid @enderror" 
                                value="{{ old('id_servicio', $relacion->id_servicio) }}" placeholder="Ej: 1">
                            @error('id_servicio') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        {{-- ID PRODUCTO --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">ID Producto</label>
                            <input name="id_producto" type="number" class="form-control border-info @error('id_producto') is-invalid @enderror" 
                                value="{{ old('id_producto', $relacion->id_producto) }}" placeholder="Ej: 1">
                            @error('id_producto') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        {{-- CANTIDAD --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">Cantidad de Insumo</label>
                            <input name="cantidad" type="number" class="form-control border-info @error('cantidad') is-invalid @enderror" 
                                value="{{ old('cantidad', $relacion->cantidad) }}" placeholder="Ej: 5">
                            @error('cantidad') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <hr style="color: #042695;">

                        <div class="d-grid gap-2 mt-4">
                            {{-- Botón con estilo dinámico --}}
                            <button type="submit" class="btn btn-info text-white py-2 shadow-sm fw-bold">
                                <i class="bi {{ $relacion->exists ? 'bi-arrow-repeat' : 'bi-plus-circle-fill' }} me-2"></i>
                                {{ $relacion->exists ? 'ACTUALIZAR DATOS' : 'CREAR RELACIÓN' }}
                            </button>
                            
                            <a href="{{ route('servicio_producto.ServicioProducto') }}" class="btn btn-sm btn-link text-secondary text-decoration-none text-center">
                                Cancelar y volver
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>