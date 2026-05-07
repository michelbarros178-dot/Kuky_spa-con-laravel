<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class empleado extends Model
{
    protected $fillable = [
        'nombre',
        'apellido',
        'correo_electronico',
        'telefono',
        'direccion',
        'fecha_contratacion',
        'id_usuario',
    ];

    public function citas()
    {
        return $this->hasMany(citass::class, 'id_empleado');
    }
    public const PAGINATE = 10;
}
