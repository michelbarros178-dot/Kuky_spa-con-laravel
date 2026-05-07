<x-layout>
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card shadow-sm" style="border: 2px solid #180785;">
                <div class="card-header text-center" style="background-color: #4df2f2; border-bottom: 2px solid #041068;">
                    <h4 class="mb-0 fw-bold text-dark">
                        {{ $categoria_servicio->exists ? 'Editar Categoría de Servicio' : 'Registrar Nueva Categoría de Servicio' }}
                    </h4>
                </div>
                
                <div class="card-body p-4">
                    <form method="POST" action="{{ $categoria_servicio->exists ? route('categoriaServicio.update', $categoria_servicio) : route('categoriaServicio.store') }}">
                        @csrf
                        @if($categoria_servicio->exists) @method('PUT') @endif

                        <div class="mb-3">
                            <label class="form-label fw-bold">Categoria</label>
                            <input name="categoria" class="form-control border-info" value="{{ old('categoria', $categoria_servicio->categoria) }}" placeholder="Ej: Cambio de horario">
                            @error('categoria') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Descripción</label>
                            <input name="descripcion" class="form-control border-info" value="{{ old('descripcion', $categoria_servicio->descripcion) }}" placeholder="Ej: Motivo del cambio">
                            @error('descripcion') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>



                        <hr style="color: #042695;">

                        <div class="d-grid gap-2 mt-4">
                            <button class="btn btn-agregar py-2 shadow-sm">
                                <i class="bi {{ $categoria_servicio->exists ? 'bi-arrow-repeat' : 'bi-person-plus-fill' }}"></i>
                                {{ $categoria_servicio->exists ? 'ACTUALIZAR DATOS' : 'CREAR CATEGORIA DE SERVICIO' }}
                            </button>
                            
                            <a href="{{ route('cancelar_cita.cancelarCita') }}" class="btn btn-sm btn-link text-secondary text-decoration-none text-center">
                                Cancelar y volver
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>