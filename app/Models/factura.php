<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class factura extends Model
{
    protected $fillable = [
        'id_cita',
        'total',
        'fecha_emision',
    ];

    public function cita()
    {
        return $this->belongsTo(citass::class, 'id_cita');
    }
    public const PAGINATE = 10;
}
