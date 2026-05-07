<x-layout>
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card shadow-sm" style="border: 2px solid #180785;">
                <div class="card-header text-center" style="background-color: #4df2f2; border-bottom: 2px solid #041068;">
                    <h4 class="mb-0 fw-bold text-dark">
                        {{ $cita_servicio->exists ? 'Editar Cita Servicio' : 'Registrar Nueva Cita Servicio' }}
                    </h4>
                </div>
                
                <div class="card-body p-4">
                    <form method="POST" action="{{ $cita_servicio->exists ? route('CitaServicio.update', $cita_servicio) : route('CitaServicio.store') }}">
                        @csrf
                        @if($cita_servicio->exists) @method('PUT') @endif

                        <div class="mb-3">
                            <label class="form-label fw-bold">#</label>
                            <input name="id" class="form-control border-info" value="{{ old('id', $cita_servicio->id) }}" placeholder="Ej: 1">
                            @error('id') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">ID cita</label>
                                <input name="id_cita" class="form-control border-info" value="{{ old('id_cita', $cita_servicio->id_cita) }}">
                                @error('id_cita') 
                                    <div class="text-danger small mt-1">{{ $message }}</div> 
                                @enderror
                            </div>

                            <div class="mb-3">
                            <label class="form-label fw-bold">ID servicio</label>
                            <input name="id_servicio" class="form-control border-info" value="{{ old('id_servicio', $cita_servicio->id_servicio) }}" placeholder="Ej: 1">
                            @error('id_servicio') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>


                        <hr style="color: #042695;">

                        <div class="d-grid gap-2 mt-4">
                            <button class="btn btn-agregar py-2 shadow-sm">
                                <i class="bi {{ $cita_servicio->exists ? 'bi-arrow-repeat' : 'bi-person-plus-fill' }}"></i>
                                {{ $cita_servicio->exists ? 'ACTUALIZAR DATOS' : 'CREAR CITA PRODUCTO' }}
                            </button>
                            
                            <a href="{{ route('cita_servicio.CitaServicio') }}" class="btn btn-sm btn-link text-secondary text-decoration-none text-center">
                                Cancelar y volver
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>