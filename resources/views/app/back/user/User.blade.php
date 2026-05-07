<x-layout>
    <div class="container-fluid px-4">
        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #3498db !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Usuarios Totales</h6>
                            <h4 class="fw-bold mb-0">{{ $users->count() }}</h4>
                            <small class="text-primary">Acceso al sistema</small>
                        </div>
                        <div class="rounded-circle bg-primary bg-opacity-10 p-3">
                            <i class="bi bi-people text-primary fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #2ecc71 !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Verificados</h6>
                            <h4 class="fw-bold mb-0">Activos</h4>
                            <small class="text-success">Cuentas seguras</small>
                        </div>
                        <div class="rounded-circle bg-success bg-opacity-10 p-3">
                            <i class="bi bi-shield-check text-success fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm p-4 bg-white rounded-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold text-secondary m-0">Control de Usuarios</h4>
                    <p class="text-muted small mb-0">Administra quiénes tienen acceso al panel administrativo</p>
                </div>
                <a href="{{ route('User.create') }}" class="btn btn-info text-white shadow-sm fw-bold px-4">
                    <i class="bi bi-person-plus-fill me-2"></i> NUEVO USUARIO
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
                            <th class="border-0 text-center">ID</th>
                            <th class="border-0">Nombre de Usuario</th>
                            <th class="border-0">Correo Electrónico</th>
                            <th class="border-0 text-center">ID Rol</th>
                            <th class="border-0 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $u)
                        <tr>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border">{{ $u->id }}</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-info bg-opacity-10 p-2 me-3">
                                        <i class="bi bi-person text-info"></i>
                                    </div>
                                    <span class="fw-bold text-dark">{{ $u->name }}</span>
                                </div>
                            </td>
                            <td>
                                <span class="text-muted"><i class="bi bi-envelope me-2"></i>{{ $u->email }}</span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-primary border border-primary bg-opacity-10 px-3">
                                    Rol #{{ $u->id_rol }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex gap-3 justify-content-center">
                                    <a href="{{ route('User.edit', $u->id) }}" class="text-warning">
                                        <i class="bi bi-pencil-square fs-5"></i>
                                    </a>
                                    <form method="POST" action="{{ route('User.destroy', $u->id) }}" onsubmit="return confirm('¿Seguro que deseas eliminar este usuario?')">
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