<x-layout>
    <div class="container-fluid px-4">
        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #3498db !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Roles Totales</h6>
                            <h4 class="fw-bold mb-0">{{ $roles->count() }}</h4>
                            <small class="text-primary">Perfiles definidos</small>
                        </div>
                        <div class="rounded-circle bg-primary bg-opacity-10 p-3">
                            <i class="bi bi-shield-lock text-primary fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #2ecc71 !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Activos</h6>
                            <h4 class="fw-bold mb-0">Sincronizados</h4>
                            <small class="text-success">Seguridad activa</small>
                        </div>
                        <div class="rounded-circle bg-success bg-opacity-10 p-3">
                            <i class="bi bi-person-check text-success fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm p-4 bg-white rounded-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold text-secondary m-0">Gestión de Permisos</h4>
                    <p class="text-muted small mb-0">Define los niveles de acceso para el personal</p>
                </div>
                <a href="{{ route('Rol.create') }}" class="btn btn-info text-white shadow-sm fw-bold px-4">
                    <i class="bi bi-key me-2"></i> NUEVO ROL
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success border-0 shadow-sm mb-4">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="bg-light text-secondary">
                        <tr>
                            <th class="border-0 text-center" style="width: 100px;">ID</th>
                            <th class="border-0">Nombre del Rol</th>
                            <th class="border-0 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $rol)
                        <tr>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border">{{ $rol->id }}</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-light p-2 me-3">
                                        <i class="bi bi-person-badge text-secondary"></i>
                                    </div>
                                    <span class="fw-bold">{{ $rol->nombre_rol }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex gap-3 justify-content-center">
                                    <a href="{{ route('Rol.edit', $rol->id) }}" class="text-warning">
                                        <i class="bi bi-pencil-square fs-5"></i>
                                    </a>
                                    <form method="POST" action="{{ route('Rol.destroy', $rol->id) }}" onsubmit="return confirm('¿Eliminar este rol? Esto podría afectar los accesos de los usuarios.')">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn p-0 text-danger border-0">
                                            <i class="bi bi-trash3-fill fs-5"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>