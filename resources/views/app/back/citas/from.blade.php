<x-layout>
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card shadow-sm" style="border: 2px solid #180785;">
                <div class="card-header text-center" style="background-color: #4df2f2; border-bottom: 2px solid #041068;">
                    <h4 class="mb-0 fw-bold text-dark">
                        {{ $cita->exists ? 'Editar Cita' : 'Registrar Cita' }}
                    </h4>
                </div>
                
                <div class="card-body p-4">
                    <form method="POST" action="{{ $cita->exists ? route('Citas.update', $cita) : route('Citas.store') }}">
                        @csrf
                        @if($cita->exists) @method('PUT') @endif

                        <div class="mb-3">
                            <label class="form-label fw-bold">Fecha</label>
                            <input name="fecha_hora" type="date" class="form-control border-info" value="{{ old('fecha_hora', $cita->fecha_hora) }}" placeholder="2023-10-15 10:00">
                            @error('fecha_hora') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Hora</label>
                            <input name="hora" class="form-control border-info" value="{{ old('hora', $cita->hora) }}" placeholder="2023-10-15 10:00">
                            @error('hora') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label class="form-label fw-bold">Nombre de la mascota</label>
                            <input name="nombre_mascota" class="form-control border-info" value="{{ old('nombre', $cita->nombre) }}" placeholder="Ej: Fido">
                            @error('nombre') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Servicio</label>
                                <input name="servicio" class="form-control border-info" value="{{ old('servicio', $cita->servicio) }}">
                                @error('servicio') 
                                    <div class="text-danger small mt-1">{{ $message }}</div> 
                                @enderror
                            </div>

                            <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Email</label>
                                <input name="email" class="form-control border-info" value="{{ old('email', $cita->email) }}">
                                @error('email') 
                                    <div class="text-danger small mt-1">{{ $message }}</div> 
                                @enderror
                            </div>

                            <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Teléfono</label>
                                <input name="telefono" class="form-control border-info" value="{{ old('telefono', $cita->telefono) }}">
                                @error('telefono') 
                                    <div class="text-danger small mt-1">{{ $message }}</div> 
                                @enderror
                            </div>

                            <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Notas</label>
                                <input name="notas" class="form-control border-info" value="{{ old('notas', $cita->notas) }}">
                                @error('notas') 
                                    <div class="text-danger small mt-1">{{ $message }}</div> 
                                @enderror
                            </div>

                            <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Estado</label>
                                <select name="estado" class="form-control border-info">
                                    <option value="pendiente" {{ old('estado', $cita->estado) === 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                    <option value="completada" {{ old('estado', $cita->estado) === 'completada' ? 'selected' : '' }}>Completada</option>
                                    <option value="cancelada" {{ old('estado', $cita->estado) === 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                                </select>
                                @error('estado') 
                                    <div class="text-danger small mt-1">{{ $message }}</div> 
                                @enderror
                            </div>


                        <hr style="color: #042695;">

                        <div class="d-grid gap-2 mt-4">
                            <button class="btn btn-agregar py-2 shadow-sm">
                                <i class="bi {{ $cita->exists ? 'bi-arrow-repeat' : 'bi-person-plus-fill' }}"></i>
                                {{ $cita->exists ? 'ACTUALIZAR DATOS' : 'CREAR CITA' }}
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