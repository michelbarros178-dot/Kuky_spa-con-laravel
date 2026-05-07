<x-layout>
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card shadow-sm" style="border: 2px solid #180785;">
                <div class="card-header text-center" style="background-color: #4df2f2; border-bottom: 2px solid #041068;">
                    <h4 class="mb-0 fw-bold text-dark">
                        {{ $user->exists ? 'Editar Usuario' : 'Registrar Nuevo Usuario' }}
                    </h4>
                </div>
                
                <div class="card-body p-4">
                    <form method="POST" action="{{ $user->exists ? route('User.update', $user) : route('User.store') }}">
                        @csrf
                        @if($user->exists) @method('PUT') @endif

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nombre de Usuario</label>
                            <input name="name" class="form-control border-info" value="{{ old('name', $user->name) }}" placeholder="Ej: Charloth Jimenez">
                            @error('name') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Correo Electrónico</label>
                            <input name="email" class="form-control border-info" value="{{ old('email', $user->email) }}" placeholder="Ej: charloth@example.com">
                            @error('email') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">ID Rol</label>
                                <input name="id_rol" class="form-control border-info" value="{{ old('id_rol', $user->id_rol) }}">
                                @error('id_rol') 
                                    <div class="text-danger small mt-1">{{ $message }}</div> 
                                @enderror
                            </div>


                        <hr style="color: #042695;">

                        <div class="d-grid gap-2 mt-4">
                            <button class="btn btn-agregar py-2 shadow-sm">
                                <i class="bi {{ $user->exists ? 'bi-arrow-repeat' : 'bi-person-plus-fill' }}"></i>
                                {{ $user->exists ? 'ACTUALIZAR DATOS' : 'CREAR USUARIO' }}
                            </button>
                            
                            <a href="{{ route('user.User') }}" class="btn btn-sm btn-link text-secondary text-decoration-none text-center">
                                Cancelar y volver
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>