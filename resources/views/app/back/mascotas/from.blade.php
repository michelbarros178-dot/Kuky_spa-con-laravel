<x-layout>
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card shadow-sm" style="border: 2px solid #180785;">
                <div class="card-header text-center" style="background-color: #4df2f2; border-bottom: 2px solid #041068;">
                    <h4 class="mb-0 fw-bold text-dark">
                        {{ $mascota->exists ? 'Editar Mascota' : 'Registrar Nueva Mascota' }}
                    </h4>
                </div>
                
                <div class="card-body p-4">
                    <form method="POST" action="{{ $mascota->exists ? route('Mascotas.update', $mascota) : route('Mascotas.store') }}">
                        @csrf
                        @if($mascota->exists) @method('PUT') @endif

                        <div class="mb-3">
                            <label class="form-label fw-bold">#</label>
                            <input name="id" class="form-control border-info" value="{{ old('id', $mascota->id) }}" placeholder="Ej: 1">
                            @error('id') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nombre de la mascota</label>
                            <input name="nombre_mascota" class="form-control border-info" value="{{ old('nombre_mascota', $mascota->nombre_mascota) }}" placeholder="Ej: Fido">
                            @error('nombre_mascota') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Especie</label>
                            <input name="especie" class="form-control border-info" value="{{ old('especie', $mascota->especie) }}" placeholder="Ej: Canino">
                            @error('especie') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Raza</label>
                                <input name="raza" class="form-control border-info" value="{{ old('raza', $mascota->raza) }}" placeholder="Ej: Labrador">
                                @error('raza') 
                                    <div class="text-danger small mt-1">{{ $message }}</div> 
                                @enderror
                            </div>

                            <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Edad</label>
                                <input name="edad" class="form-control border-info" value="{{ old('edad', $mascota->edad) }}" placeholder="Ej: 3">
                                @error('edad') 
                                    <div class="text-danger small mt-1">{{ $message }}</div> 
                                @enderror
                            </div>

                            <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">ID Cliente</label>
                                <input name="id_cliente" class="form-control border-info" value="{{ old('id_cliente', $mascota->id_cliente) }}" placeholder="Ej: 1">
                                @error('id_cliente') 
                                    <div class="text-danger small mt-1">{{ $message }}</div> 
                                @enderror
                            </div>


                        <hr style="color: #042695;">

                        <div class="d-grid gap-2 mt-4">
                            <button class="btn btn-agregar py-2 shadow-sm">
                                <i class="bi {{ $mascota->exists ? 'bi-arrow-repeat' : 'bi-person-plus-fill' }}"></i>
                                {{ $mascota->exists ? 'ACTUALIZAR DATOS' : 'CREAR MASCOTA' }}
                            </button>

                            <a href="{{ route('mascotas.Mascotas') }}" class="btn btn-sm btn-link text-secondary text-decoration-none text-center">
                                Cancelar y volver
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>