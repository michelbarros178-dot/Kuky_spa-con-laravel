<?php
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KukyspaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CancelarCitaController;
use App\Http\Controllers\CategoriaServicioController;
use App\Http\Controllers\CitaProductoController;
use App\Http\Controllers\CitaServicioController;
use App\Http\Controllers\CitassController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ConfirmacionCitaController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\HistorialMascotaController;
use App\Http\Controllers\InventarioMovimientosController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\ServicioProductoController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CalendarioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

use App\Http\Controllers\Auth\LoginController;


Route::get('/', [KukyspaController::class, 'welcome'])->name('welcome');
Route::get('/recomendaciones', [KukyspaController::class, 'recomendaciones'])->name('recomendaciones');

Route::get('/bienvenida', function () {return view('app.back.vista_clientes.bienvenida');})->name('bienvenida');
Route::get('/bano-antipulgas', function () {return view('app.back.vista_clientes.servicios.bano-antipulgas');})->name('bano-antipulgas');
Route::get('/bano-especial', function () {return view('app.back.vista_clientes.servicios.bano-especial');})->name('bano-especial');
Route::get('/bano-sencillo', function () {return view('app.back.vista_clientes.servicios.bano-sencillo');})->name('bano-sencillo');
Route::get('/corte-estetico', function () {return view('app.back.vista_clientes.servicios.corte-estetico');})->name('corte-estetico');
Route::get('/corte-higienico', function () {return view('app.back.vista_clientes.servicios.corte-higienico');})->name('corte-higienico');
Route::get('/corte-unas', function () {return view('app.back.vista_clientes.servicios.corte-unas');})->name('corte-unas');
Route::get('/limpieza-oidos', function () {return view('app.back.vista_clientes.servicios.limpieza-oidos');})->name('limpieza-oidos');
Route::get('/masaje-antiestres', function () {return view('app.back.vista_clientes.servicios.masaje-antiestres');})->name('masaje-antiestres');

Route::get('/servicios', [KukyspaController::class, 'servicios'])->name('servicios');
Route::get('/terminos', [KukyspaController::class, 'terminos'])->name('terminos');

Route::get('/contactanos', [KukyspaController::class, 'contactanos'])->name('contactanos');

// Ruta corregida para la descarga del PDF
Route::get('/descargar-pdf-terminos', function () {
    // 1. Ruta exacta al archivo
    $path = public_path('pdf/terminos.pdf');

    // 2. Verificación de existencia
    if (!File::exists($path)) {
        return "El archivo no existe en: " . $path;
    }

    // 3. LIMPIEZA CRÍTICA: Borra cualquier residuo de texto que dañe el PDF
    if (ob_get_level()) {
        ob_end_clean();
    }

    // 4. Retorno del archivo con cabeceras de limpieza profunda
    return Response::download($path, 'terminos_kuky_pets.pdf', [
        'Content-Type' => 'application/pdf',
        'Content-Length' => File::size($path),
        'Cache-Control' => 'no-cache, no-store, must-revalidate',
        'Pragma' => 'no-cache',
        'Expires' => '0',
    ]);
});

Route::get('/desarrolladores', [KukyspaController::class, 'desarrolladores'])->name('desarrolladores');
Route::get('/ceo', [KukyspaController::class, 'ceo'])->name('ceo');

Route::get('/dashboard', [AdminController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.index'); 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Esto define las rutas para el CRUD de admin
Route::resource('app/back/admin/admin', AdminController::class)->names([
    'index' => 'admin.admin', // Esto hace que route('admin.admin') funcione
]);
Route::resource('app/back/cancelar_cita/cancelarCita', CancelarCitaController::class)->names([
    'index' => 'cancelar_cita.cancelarCita', // Esto hace que route('cancelar_cita.cancelarCita') funcione
]);
Route::resource('app/back/categoria_servicio/categoriaServicio', CategoriaServicioController::class)->names([
    'index' => 'categoria_servicio.categoriaServicio', // Esto hace que route('categoria_servicio.categoriaServicio') funcione
]);
Route::resource('app/back/cita_producto/CitaProducto', CitaProductoController::class)->names([
    'index' => 'cita_producto.CitaProducto', // Esto hace que route('categoria_servicio.categoriaServicio') funcione
]);
Route::resource('app/back/cita_servicio/CitaServicio', CitaServicioController::class)->names([
    'index' => 'cita_servicio.CitaServicio', // Esto hace que route('categoria_servicio.categoriaServicio') funcione
]);
Route::resource('app/back/citas/Citas', CitassController::class)->names([
    'index' => 'citas.Citas', // Esto hace que route('categoria_servicio.categoriaServicio') funcione
]);
Route::resource('app/back/clientes/Clientes', ClientesController::class)->names([
    'index' => 'clientes.Clientes', // Esto hace que route('categoria_servicio.categoriaServicio') funcione
]);
Route::resource('app/back/confirmacion_citas/ConfirmacionCitas', ConfirmacionCitaController::class)->names([
    'index' => 'confirmacion_citas.ConfirmacionCitas', // Esto hace que route('categoria_servicio.categoriaServicio') funcione
]);
Route::resource('app/back/facturas/Facturas', FacturaController::class)->names([
    'index' => 'facturas.Facturas', // Esto hace que route('categoria_servicio.categoriaServicio') funcione
]);
Route::resource('app/back/historial_mascotas/HistorialMascotas', HistorialMascotaController::class)->names([
    'index' => 'historial_mascotas.HistorialMascotas', // Esto hace que route('categoria_servicio.categoriaServicio') funcione
]);
Route::resource('app/back/inventario_movimiento/InventarioMovimiento', InventarioMovimientosController::class)->names([
    'index' => 'inventario_movimiento.InventarioMovimiento', // Esto hace que route('categoria_servicio.categoriaServicio') funcione
]);
Route::resource('app/back/mascotas/Mascotas', MascotaController::class)->names([
    'index' => 'mascotas.Mascotas', // Esto hace que route('categoria_servicio.categoriaServicio') funcione
]);
Route::resource('app/back/productos/Productos', ProductoController::class)->names([
    'index' => 'productos.Productos', // Esto hace que route('categoria_servicio.categoriaServicio') funcione
]);
Route::resource('app/back/rol/Rol', RolController::class)->names([
    'index' => 'rol.Rol', // Esto hace que route('categoria_servicio.categoriaServicio') funcione
]);
Route::resource('app/back/empleado/Empleado', EmpleadoController::class)->names([
    'index' => 'empleado.Empleado', // Esto hace que route('categoria_servicio.categoriaServicio') funcione
]);
Route::resource('app/back/pagos/Pagos', PagoController::class)->names([
    'index' => 'pagos.Pagos', // Esto hace que route('categoria_servicio.categoriaServicio') funcione
]);
Route::resource('app/back/servicio_producto/ServicioProducto', ServicioProductoController::class)->names([
    'index' => 'servicio_producto.ServicioProducto', // Esto hace que route('categoria_servicio.categoriaServicio') funcione
]);
Route::resource('app/back/servicio/Servicio', ServicioController::class)->names([
    'index' => 'servicio.Servicio', // Esto hace que route('categoria_servicio.categoriaServicio') funcione
]);
Route::resource('app/back/user/User', UserController::class)->names([
    'index' => 'user.User', // Esto hace que route('user.User') funcione
]);
Route::resource('app/back/CitasEstilista/Citas', CitassController::class)->names([
    'index' => 'CitasEstilista.Citas', // Esto hace que route('categoria_servicio.categoriaServicio') funcione
]);



// Ruta para MOSTRAR la página del calendario
Route::get('/agendar-cita', function () {
    return view('app.back.vista_clientes.calendario'); // Asegúrate que tu archivo se llame calendario.blade.php
})->middleware(['auth'])->name('citas.index');
// ESTA ES LA QUE TE FALTA PARA GUARDAR LOS DATOS
Route::post('/agendar-cita', [CalendarioController::class, 'store'])->name('citasses.store');

// Ruta para ver disponibilidad (usada por el calendario y el select)
// Agregamos ->name() para que el Blade las encuentre
Route::get('/api/disponibilidad', [CalendarioController::class, 'checkAvailability']);
Route::post('/api/citas/guardar', [CalendarioController::class, 'store'])->name('citasses.store');




Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');