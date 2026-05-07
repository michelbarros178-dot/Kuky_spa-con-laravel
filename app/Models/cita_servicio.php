<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cita_servicio extends Model
{
    protected $fillable = [
        'id_cita',
        'id_servicio',
        'cantidad',
    ];

    public function cita()
    {
        return $this->belongsTo(citass::class, 'id_cita');
    }

    public function servicio()
    {
        return $this->belongsTo(servicio::class, 'id_servicio');
    }
    public const PAGINATE = 10;
}
