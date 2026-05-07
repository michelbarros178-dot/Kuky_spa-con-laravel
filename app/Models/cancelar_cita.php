<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cancelar_cita extends Model
{
    protected $fillable = [
        'id',
        'motivo',
        'fecha_cancelacion',
        'id_cita',
    ];

    public function cita()
    {
        return $this->belongsTo(citass::class, 'id_cita');
    }
    public const PAGINATE = 10;
}
