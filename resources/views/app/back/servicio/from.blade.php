<x-layout>
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card shadow-sm" style="border: 2px solid #180785;">
                <div class="card-header text-center" style="background-color: #4df2f2; border-bottom: 2px solid #041068;">
                    <h4 class="mb-0 fw-bold text-dark">
                        {{ $servicio->exists ? 'Editar Servicio' : 'Registrar Nuevo Servicio' }}
                    </h4>
                </div>
                
                <div class="card-body p-4">
                    <form method="POST" action="{{ $servicio->exists ? route('Servicio.update', $servicio) : route('Servicio.store') }}">
                        @csrf
                        @if($servicio->exists) @method('PUT') @endif


                        <div class="mb-3">
                            <label class="form-label fw-bold">Nombre del servicio</label>
                            <input name="nombre_servicio" class="form-control border-info" value="{{ old('nombre_servicio', $servicio->nombre_servicio) }}" placeholder="Ej: Servicio de baño">
                            @error('nombre_servicio') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Precio</label>
                            <input name="precio" class="form-control border-info" value="{{ old('precio', $servicio->precio) }}" placeholder="Ej: 50.00">
                            @error('precio') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">ID CS</label>
                            <input name="id_cat_serv" class="form-control border-info" value="{{ old('id_cat_serv', $servicio->id_cat_serv) }}" placeholder="Ej: 1">
                            @error('id_cat_serv') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <hr style="color: #042695;">

                        <div class="d-grid gap-2 mt-4">
                            <button class="btn btn-agregar py-2 shadow-sm">
                                <i class="bi {{ $servicio->exists ? 'bi-arrow-repeat' : 'bi-person-plus-fill' }}"></i>
                                {{ $servicio->exists ? 'ACTUALIZAR DATOS' : 'CREAR SERVICIO' }}
                            </button>
                            
                            <a href="{{ route('servicio.Servicio') }}" class="btn btn-sm btn-link text-secondary text-decoration-none text-center">
                                Cancelar y volver
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>