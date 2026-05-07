<x-layout>
    <div class="container-fluid">
        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #ffce67 !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Ganancias</h6>
                            <h4 class="fw-bold mb-0">$30,200</h4>
                            <small class="text-warning">10% cambios</small>
                        </div>
                        <div class="rounded-circle bg-warning bg-opacity-10 p-3">
                            <i class="bi bi-currency-dollar text-warning fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #ff5252 !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Tareas</h6>
                            <h4 class="fw-bold mb-0">145</h4>
                            <small class="text-danger">28% performance</small>
                        </div>
                        <div class="rounded-circle bg-danger bg-opacity-10 p-3">
                            <i class="bi bi-calendar-check text-danger fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #2ecc71 !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Visitas</h6>
                            <h4 class="fw-bold mb-0">290+</h4>
                            <small class="text-success">10k diarias</small>
                        </div>
                        <div class="rounded-circle bg-success bg-opacity-10 p-3">
                            <i class="bi bi-eye text-success fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3" style="border-left: 5px solid #3498db !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Descargas</h6>
                            <h4 class="fw-bold mb-0">500</h4>
                            <small class="text-primary">App Store</small>
                        </div>
                        <div class="rounded-circle bg-primary bg-opacity-10 p-3">
                            <i class="bi bi-hand-thumbs-up text-primary fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm p-4 bg-white">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold text-secondary m-0">Administradores Registrados</h4>
                <a href="{{ route('admin.create') }}" class="btn btn-info text-white shadow-sm fw-bold">
                    <i class="bi bi-person-plus-fill me-2"></i> NUEVO ADMIN
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="bg-light text-secondary">
                        <tr>
                            <th class="border-0 text-center">ID</th>
                            <th class="border-0">Nombre</th>
                            <th class="border-0">Email</th>
                            <th class="border-0">Teléfono</th>
                            <th class="border-0 text-center">Rol</th>
                            <th class="border-0">Contraseña</th>
                            <th class="border-0 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admins as $admin)
                        <tr>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border">{{ $admin->id }}</span>
                            </td>
                            <td class="fw-bold">{{ $admin->nombre_completo }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>{{ $admin->telefono }}</td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border">{{ $admin->id_rol }}</span>
                            </td>
                            <td>{{ $admin->password }}</td>
                            
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <a href="{{ route('admin.edit', $admin->id) }}" class="text-warning">
                                        <i class="bi bi-pencil-square fs-5"></i>
                                    </a>
                                    <form method="POST" action="{{ route('admin.destroy', $admin->id) }}" onsubmit="return confirm('¿Desea eliminar este administrador?')">
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