<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cita_producto extends Model
{
    protected $fillable = [
        'id_cita',
        'id_producto',
        'cantidad',
    ];

    public function cita()
    {
        return $this->belongsTo(citass::class, 'id_cita');
    }

    public function producto()
    {
        return $this->belongsTo(producto::class, 'id_producto');
    }
    public const PAGINATE = 10;
}
