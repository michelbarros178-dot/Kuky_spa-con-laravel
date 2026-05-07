<x-layout>
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card shadow-sm" style="border: 2px solid #180785;">
                <div class="card-header text-center" style="background-color: #4df2f2; border-bottom: 2px solid #041068;">
                    <h4 class="mb-0 fw-bold text-dark">
                        {{ $factura->exists ? 'Editar Factura' : 'Registrar Nueva Factura' }}
                    </h4>
                </div>
                
                <div class="card-body p-4">
                    <form method="POST" action="{{ $factura->exists ? route('Facturas.update', $factura) : route('Facturas.store') }}">
                        @csrf
                        @if($factura->exists) @method('PUT') @endif

                        <div class="mb-3">
                            <label class="form-label fw-bold">#</label>
                            <input name="id" class="form-control border-info" value="{{ old('id', $factura->id) }}" placeholder="Ej: 1">
                            @error('id') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Fecha de Emisión</label>
                            <input name="fecha_emision" class="form-control border-info" value="{{ old('fecha_emision', $factura->fecha_emision) }}" placeholder="2023-10-15">
                            @error('fecha_emision') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Total</label>
                            <input name="total" class="form-control border-info" value="{{ old('total', $factura->total) }}" placeholder="0.00">
                            @error('total') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">ID cita</label>
                                <input name="id_cita" class="form-control border-info" value="{{ old('id_cita', $factura->id_cita) }}">
                                @error('id_cita') 
                                    <div class="text-danger small mt-1">{{ $message }}</div> 
                                @enderror
                            </div>


                        <hr style="color: #042695;">

                        <div class="d-grid gap-2 mt-4">
                            <button class="btn btn-agregar py-2 shadow-sm">
                                <i class="bi {{ $factura->exists ? 'bi-arrow-repeat' : 'bi-person-plus-fill' }}"></i>
                                {{ $factura->exists ? 'ACTUALIZAR DATOS' : 'CREAR FACTURA' }}
                            </button>
                            
                            <a href="{{ route('facturas.Facturas') }}" class="btn btn-sm btn-link text-secondary text-decoration-none text-center">
                                Cancelar y volver
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>