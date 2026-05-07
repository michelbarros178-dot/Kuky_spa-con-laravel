<x-layout>
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card shadow-sm" style="border: 2px solid #180785;">
                <div class="card-header text-center" style="background-color: #4df2f2; border-bottom: 2px solid #041068;">
                    <h4 class="mb-0 fw-bold text-dark">
                        {{ $citas->exists ? 'Editar Cita' : 'Registrar Cita' }}
                    </h4>
                </div>
                
                <div class="card-body p-4">
                    <form method="POST" action="{{ $citas->exists ? route('Citas.update', $citas) : route('Citas.store') }}">
                        @csrf
                        @if($citas->exists) @method('PUT') @endif

                        <div class="mb-3">
                            <label class="form-label fw-bold">#</label>
                            <input name="id" class="form-control border-info" value="{{ old('id', $citas->id) }}" placeholder="Ej: 1">
                            @error('id') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Fecha y hora</label>
                            <input name="fecha_hora" class="form-control border-info" value="{{ old('fecha_hora', $citas->fecha_hora) }}" placeholder="2023-10-15 10:00">
                            @error('fecha_hora') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Estado</label>
                            <input name="estado" class="form-control border-info" value="{{ old('estado', $citas->estado) }}" placeholder="Ej: Cancelada">
                            @error('estado') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">ID Cliente</label>
                                <input name="id_cliente" class="form-control border-info" value="{{ old('id_cliente', $citas->id_cliente) }}">
                                @error('id_cliente') 
                                    <div class="text-danger small mt-1">{{ $message }}</div> 
                                @enderror
                            </div>

                            <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">ID Mascota</label>
                                <input name="id_mascota" class="form-control border-info" value="{{ old('id_mascota', $citas->id_mascota) }}">
                                @error('id_mascota') 
                                    <div class="text-danger small mt-1">{{ $message }}</div> 
                                @enderror
                            </div>

                            <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">ID Empleado</label>
                                <input name="id_empleado" class="form-control border-info" value="{{ old('id_empleado', $citas->id_empleado) }}">
                                @error('id_empleado') 
                                    <div class="text-danger small mt-1">{{ $message }}</div> 
                                @enderror
                            </div>


                        <hr style="color: #042695;">

                        <div class="d-grid gap-2 mt-4">
                            <button class="btn btn-agregar py-2 shadow-sm">
                                <i class="bi {{ $citas->exists ? 'bi-arrow-repeat' : 'bi-person-plus-fill' }}"></i>
                                {{ $citas->exists ? 'ACTUALIZAR DATOS' : 'CREAR CITA' }}
                            </button>
                            
                            <a href="{{ route('citas.Citas') }}" class="btn btn-sm btn-link text-secondary text-decoration-none text-center">
                                Cancelar y volver
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>