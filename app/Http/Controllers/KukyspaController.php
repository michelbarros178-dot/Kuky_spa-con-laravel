<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\services\AdminService;
use Carbon\Carbon; // <--- ESTA LÍNEA CORRIGE EL ERROR DE LA PRIMERA IMAGEN

class KukyspaController extends Controller
{
    // MÉTODOS DE VISTA (Asegúrate de que los archivos .blade.php existan)
    public function welcome() { return view('app.front.welcome'); }

    public function ceo() { return view('app.front.ceo'); }
    public function servicios() { return view('app.front.servicios'); }
    public function terminos() { return view('app.front.terminos'); }
    public function contactanos() { return view('app.front.contactanos'); }
    public function banoAntipulgas() { return view('app.back.vista_clientes.servicios.bano-antipulgas'); }
    public function banoEspecial() { return view('app.back.vista_clientes.servicios.bano-especial'); }
    public function banoSencillo() { return view('app.back.vista_clientes.servicios.bano-sencillo'); }
    public function corteEstetico() { return view('app.back.vista_clientes.servicios.corte-estetico'); }
    public function corteHigienico() { return view('app.back.vista_clientes.servicios.corte-higienico'); }
    public function corteUnas() { return view('app.back.vista_clientes.servicios.corte-unas'); }
    public function limpiezaOidos() { return view('app.back.vista_clientes.servicios.limpieza-oidos'); }

    public function masajeAntiestres() { return view('app.back.vista_clientes.servicios.masaje-antiestres'); }

    



    public function dashboard() 
{
    // 1. Buscas los datos (igual que en el index)
    $admin = $this->Service->getAll(); 

    // 2. Los pasas a la vista con compact
    return view('app.back.admin.admin', compact('admin'));
}
}