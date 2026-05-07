<x-layout>
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card shadow-sm" style="border: 2px solid #180785;">
                <div class="card-header text-center" style="background-color: #4df2f2; border-bottom: 2px solid #041068;">
                    <h4 class="mb-0 fw-bold text-dark">
                        {{ $confirmacion_cita->exists ? 'Editar Confirmacion de Cita' : 'Registrar Nueva Confirmacion de Cita' }}
                    </h4>
                </div>
                
                <div class="card-body p-4">
                    <form method="POST" action="{{ $confirmacion_cita->exists ? route('ConfirmacionCitas.update', $confirmacion_cita) : route('ConfirmacionCitas.store') }}">
                        @csrf
                        @if($confirmacion_cita->exists) @method('PUT') @endif

                        <div class="mb-3">
                            <label class="form-label fw-bold">#</label>
                            <input name="id" class="form-control border-info" value="{{ old('id', $confirmacion_cita->id) }}" placeholder="Ej: 1">
                            @error('id') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Fecha de la confirmación</label>
                            <input name="fecha_confirmacion" class="form-control border-info" value="{{ old('fecha_confirmacion', $confirmacion_cita->fecha_confirmacion) }}" placeholder="2023-10-15">
                            @error('fecha_confirmacion') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">ID cita</label>
                                <input name="id_cita" class="form-control border-info" value="{{ old('id_cita', $confirmacion_cita->id_cita) }}">
                                @error('id_cita') 
                                    <div class="text-danger small mt-1">{{ $message }}</div> 
                                @enderror
                            </div>


                        <hr style="color: #042695;">

                        <div class="d-grid gap-2 mt-4">
                            <button class="btn btn-agregar py-2 shadow-sm">
                                <i class="bi {{ $confirmacion_cita->exists ? 'bi-arrow-repeat' : 'bi-person-plus-fill' }}"></i>
                                {{ $confirmacion_cita->exists ? 'ACTUALIZAR DATOS' : 'CREAR CONFIRMACION' }}
                            </button>
                            
                            <a href="{{ route('confirmacion_citas.ConfirmacionCitas') }}" class="btn btn-sm btn-link text-secondary text-decoration-none text-center">
                                Cancelar y volver
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>