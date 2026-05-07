<x-layout>
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card shadow-sm" style="border: 2px solid #180785;">
                <div class="card-header text-center" style="background-color: #4df2f2; border-bottom: 2px solid #041068;">
                    <h4 class="mb-0 fw-bold text-dark">
                        {{ $cliente->exists ? 'Editar Cliente' : 'Registrar Nuevo Cliente' }}
                    </h4>
                </div>
                
                <div class="card-body p-4">
                    <form method="POST" action="{{ $cliente->exists ? route('Clientes.update', $cliente) : route('Clientes.store') }}">
                        @csrf
                        @if($cliente->exists) @method('PUT') @endif

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nombre Completo</label>
                            <input name="nombre_completo" class="form-control border-info" value="{{ old('nombre_completo', $cliente->nombre_completo) }}" placeholder="Ej: Juan Pérez">
                            @error('nombre_completo') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Email</label>
                            <input name="email" class="form-control border-info" value="{{ old('email', $cliente->email) }}" placeholder="Ej: juan.perez@example.com">
                            @error('email') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Teléfono</label>
                                <input name="telefono" class="form-control border-info" value="{{ old('telefono', $cliente->telefono) }}" placeholder="Ej: 123-456-7890">
                                @error('telefono') 
                                    <div class="text-danger small mt-1">{{ $message }}</div> 
                                @enderror
                            </div>

                            <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">ID Rol</label>
                                <input name="id_rol" class="form-control border-info" value="{{ old('id_rol', $cliente->id_rol) }}" placeholder="Ej: 1">
                                @error('id_rol') 
                                    <div class="text-danger small mt-1">{{ $message }}</div> 
                                @enderror
                            </div>

                            <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">ID usuario</label>
                                <input name="id_usuario" class="form-control border-info" value="{{ old('id_usuario', $cliente->id_usuario) }}" placeholder="Ej: 1">
                                @error('id_usuario') 
                                    <div class="text-danger small mt-1">{{ $message }}</div> 
                                @enderror
                            </div>


                        <hr style="color: #042695;">

                        <div class="d-grid gap-2 mt-4">
                            <button class="btn btn-agregar py-2 shadow-sm">
                                <i class="bi {{ $cliente->exists ? 'bi-arrow-repeat' : 'bi-person-plus-fill' }}"></i>
                                {{ $cliente->exists ? 'ACTUALIZAR DATOS' : 'AGREGAR CLIENTE' }}
                            </button>
                            
                            <a href="{{ route('clientes.Clientes') }}" class="btn btn-sm btn-link text-secondary text-decoration-none text-center">
                                Cancelar y volver
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>