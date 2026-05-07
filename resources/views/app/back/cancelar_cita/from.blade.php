<x-layout>
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card shadow-sm" style="border: 2px solid #180785;">
                <div class="card-header text-center" style="background-color: #4df2f2; border-bottom: 2px solid #041068;">
                    <h4 class="mb-0 fw-bold text-dark">
                        {{ $cancelar_cita->exists ? 'Editar Cancelar Cita' : 'Registrar Nueva Cancelar Cita' }}
                    </h4>
                </div>
                
                <div class="card-body p-4">
                    <form method="POST" action="{{ $cancelar_cita->exists ? route('cancelarCita.update', $cancelar_cita) : route('cancelarCita.store') }}">
                        @csrf
                        @if($cancelar_cita->exists) @method('PUT') @endif

                        <div class="mb-3">
                            <label class="form-label fw-bold">#</label>
                            <input name="id" class="form-control border-info" value="{{ old('id', $cancelar_cita->id) }}" placeholder="Ej: 1">
                            @error('id') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Motivo</label>
                            <input name="motivo" class="form-control border-info" value="{{ old('motivo', $cancelar_cita->motivo) }}" placeholder="Ej: Cambio de horario">
                            @error('motivo') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Fecha de la cancelación</label>
                            <input name="fecha_cancelacion" class="form-control border-info" value="{{ old('fecha_cancelacion', $cancelar_cita->fecha_cancelacion) }}" placeholder="2023-10-15">
                            @error('fecha_cancelacion') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">ID cita</label>
                                <input name="id_cita" class="form-control border-info" value="{{ old('id_cita', $cancelar_cita->id_cita) }}">
                                @error('id_cita') 
                                    <div class="text-danger small mt-1">{{ $message }}</div> 
                                @enderror
                            </div>


                        <hr style="color: #042695;">

                        <div class="d-grid gap-2 mt-4">
                            <button class="btn btn-agregar py-2 shadow-sm">
                                <i class="bi {{ $cancelar_cita->exists ? 'bi-arrow-repeat' : 'bi-person-plus-fill' }}"></i>
                                {{ $cancelar_cita->exists ? 'ACTUALIZAR DATOS' : 'CREAR CANCELAR CITA' }}
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