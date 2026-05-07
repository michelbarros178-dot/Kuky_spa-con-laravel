<x-layout>
<div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card shadow-sm" style="border: 2px solid #180785;">
                <div class="card-header text-center" style="background-color: #4df2f2; border-bottom: 2px solid #041068;">
                    <h4 class="mb-0 fw-bold text-dark">
                        {{ $historial_mascota->exists ? 'Editar Historial' : 'Registrar Nuevo Historial' }}
                    </h4>
                </div>
                
                <div class="card-body p-4">
                    <form method="POST" action="{{ $historial_mascota->exists ? route('HistorialMascotas.update', $historial_mascota) : route('HistorialMascotas.store') }}">
                        @csrf
                        @if($historial_mascota->exists) @method('PUT') @endif

                        <div class="mb-3">
                            <label class="form-label fw-bold">#</label>
                            <input name="id" class="form-control border-info" value="{{ old('id', $historial_mascota->id) }}" placeholder="Ej: 1">
                            @error('id') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Descripción</label>
                            <input name="descripcion" class="form-control border-info" value="{{ old('descripcion', $historial_mascota->descripcion) }}" placeholder="Descripción del historial">
                            @error('descripcion') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Fecha de Registro</label>
                            <input name="fecha_registro" class="form-control border-info" value="{{ old('fecha_registro', $historial_mascota->fecha_registro) }}" placeholder="2023-10-15">
                            @error('fecha_registro') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">ID Mascota</label>
                                <input name="id_mascota" class="form-control border-info" value="{{ old('id_mascota', $historial_mascota->id_mascota) }}">
                                @error('id_mascota') 
                                    <div class="text-danger small mt-1">{{ $message }}</div> 
                                @enderror
                            </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">ID cita</label>
                                <input name="id_cita" class="form-control border-info" value="{{ old('id_cita', $historial_mascota->id_cita) }}">
                                @error('id_cita') 
                                    <div class="text-danger small mt-1">{{ $message }}</div> 
                                @enderror
                            </div>


                        <hr style="color: #042695;">

                        <div class="d-grid gap-2 mt-4">
                            <button class="btn btn-agregar py-2 shadow-sm">
                                <i class="bi {{ $historial_mascota->exists ? 'bi-arrow-repeat' : 'bi-person-plus-fill' }}"></i>
                                {{ $historial_mascota->exists ? 'ACTUALIZAR DATOS' : 'CREAR HISTORIAL' }}
                            </button>
                            
                            <a href="{{ route('historial_mascotas.HistorialMascotas') }}" class="btn btn-sm btn-link text-secondary text-decoration-none text-center">
                                Cancelar y volver
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>