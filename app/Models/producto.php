<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    protected $fillable = [
        'nombre_producto',
        'descripcion',
        'precio',
        'stock',
    ];

    public function inventario_movimientos()
    {
        return $this->hasMany(inventario_movimientos::class, 'id_producto');
    }

    public function cita_productos()
    {
        return $this->hasMany(cita_producto::class, 'id_producto');
    }
    public const PAGINATE = 10;
}
