<x-layout>
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card shadow-sm" style="border: 2px solid #180785;">
                <div class="card-header text-center" style="background-color: #4df2f2; border-bottom: 2px solid #041068;">
                    <h4 class="mb-0 fw-bold text-dark">
                        {{ $pago->exists ? 'Editar Pago' : 'Registrar Nuevo Pago' }}
                    </h4>
                </div>
                
                <div class="card-body p-4">
                    <form method="POST" action="{{ $pago->exists ? route('Pagos.update', $pago) : route('Pagos.store') }}">
                        @csrf
                        @if($pago->exists) @method('PUT') @endif


                        <div class="mb-3">
                            <label class="form-label fw-bold">Fecha del pago</label>
                            <input name="fecha_pago" type="date" class="form-control border-info" value="{{ old('fecha_pago', $pago->fecha_pago) }}" placeholder="2023-10-15">
                            @error('fecha_pago') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Monto</label>
                            <input name="monto" class="form-control border-info" value="{{ old('monto', $pago->monto) }}" placeholder="Ej: 100.00">
                            @error('monto') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>


                        <hr style="color: #042695;">

                        <div class="d-grid gap-2 mt-4">
                            <button class="btn btn-agregar py-2 shadow-sm">
                                <i class="bi {{ $pago->exists ? 'bi-arrow-repeat' : 'bi-person-plus-fill' }}"></i>
                                {{ $pago->exists ? 'ACTUALIZAR DATOS' : 'CREAR PAGO' }}
                            </button>
                            
                            <a href="{{ route('pagos.Pagos') }}" class="btn btn-sm btn-link text-secondary text-decoration-none text-center">
                                Cancelar y volver
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>