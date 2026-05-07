<x-layout>
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card shadow-sm" style="border: 2px solid #180785;">
                <div class="card-header text-center" style="background-color: #4df2f2; border-bottom: 2px solid #041068;">
                    <h4 class="mb-0 fw-bold text-dark">
                        {{ $rol->exists ? 'Editar Rol' : 'Registrar Nuevo Rol' }}
                    </h4>
                </div>
                
                <div class="card-body p-4">
                    <form method="POST" action="{{ $rol->exists ? route('Rol.update', $rol) : route('Rol.store') }}">
                        @csrf
                        @if($rol->exists) @method('PUT') @endif

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nombre del rol</label>
                            <input name="nombre_rol" class="form-control border-info" value="{{ old('nombre_rol', $rol->nombre_rol) }}" placeholder="Ej: Administrador">
                            @error('nombre_rol') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>


                        <hr style="color: #042695;">

                        <div class="d-grid gap-2 mt-4">
                            <button class="btn btn-agregar py-2 shadow-sm">
                                <i class="bi {{ $rol->exists ? 'bi-arrow-repeat' : 'bi-person-plus-fill' }}"></i>
                                {{ $rol->exists ? 'ACTUALIZAR DATOS' : 'CREAR ROL' }}
                            </button>
                            
                            <a href="{{ route('rol.Rol') }}" class="btn btn-sm btn-link text-secondary text-decoration-none text-center">
                                Cancelar y volver
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>