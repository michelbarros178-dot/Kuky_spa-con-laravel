<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pago extends Model
{
    protected $fillable = [
        'id_cita',
        'monto',
        'fecha_pago',
    ];

    public function cita()
    {
        return $this->belongsTo(citass::class, 'id_cita');
    }
    public const PAGINATE = 10;
}
