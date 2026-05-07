<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class servicio_producto extends Model
{
    protected $fillable = [
        'id_servicio',
        'id_producto',
        'cantidad',
    ];

    public function servicio()
    {
        return $this->belongsTo(servicio::class, 'id_servicio');
    }

    public function producto()
    {
        return $this->belongsTo(producto::class, 'id_producto');
    }
    public const PAGINATE = 10;
}
