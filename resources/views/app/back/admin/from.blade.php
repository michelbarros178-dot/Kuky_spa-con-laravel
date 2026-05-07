<x-layout>
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card shadow-sm" style="border: 2px solid #ff99f0;">
                <div class="card-header text-center" style="background-color: #4df2f2; border-bottom: 2px solid #ff99f0;">
                    <h4 class="mb-0 fw-bold text-dark">
                        {{ $admin->exists ? 'Editar Administrador' : 'Registrar Nuevo Admin' }}
                    </h4>
                </div>
                
                <div class="card-body p-4">
                    <form method="POST" action="{{ $admin->exists ? route('admin.update', $admin) : route('admin.store') }}">
                        @csrf
                        @if($admin->exists) @method('PUT') @endif

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nombre Completo</label>
                            <input name="nombre_completo" class="form-control border-info" value="{{ old('nombre_completo', $admin->nombre_completo) }}" placeholder="Ej: Valentina">
                            @error('nombre_completo') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Email</label>
                            <input name="email" type="email" class="form-control border-info" value="{{ old('email', $admin->email) }}" placeholder="correo@ejemplo.com">
                            @error('email') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Teléfono</label>
                            <input name="telefono" class="form-control border-info" value="{{ old('telefono', $admin->telefono) }}" placeholder="300 000 0000">
                            @error('telefono') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">ID Rol</label>
                                <input name="id_rol" class="form-control border-info" value="{{ old('id_rol', $admin->id_rol) }}">
                                @error('id_rol') 
                                    <div class="text-danger small mt-1">{{ $message }}</div> 
                                @enderror
                            </div>

                            <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Contraseña</label>
                                <input name="password" type="password" class="form-control border-info" placeholder="Ingrese la contraseña">
                                @error('password') 
                                    <div class="text-danger small mt-1">{{ $message }}</div> 
                                @enderror
                            </div>


                        <hr style="color: #ff99f0;">

                        <div class="d-grid gap-2 mt-4">
                            <button class="btn btn-agregar py-2 shadow-sm">
                                <i class="bi {{ $admin->exists ? 'bi-arrow-repeat' : 'bi-person-plus-fill' }}"></i>
                                {{ $admin->exists ? 'ACTUALIZAR DATOS' : 'CREAR ADMINISTRADOR' }}
                            </button>
                            
                            <a href="{{ route('admin.admin') }}" class="btn btn-sm btn-link text-secondary text-decoration-none text-center">
                                Cancelar y volver
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>