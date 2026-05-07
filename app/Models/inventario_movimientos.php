<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class inventario_movimientos extends Model
{
    protected $fillable = [
        'id_producto',
        'tipo_movimiento',
        'cantidad',
        'fecha_movimiento',
    ];

    public function producto()
    {
        return $this->belongsTo(producto::class, 'id_producto');
    }
    public const PAGINATE = 10;
}
