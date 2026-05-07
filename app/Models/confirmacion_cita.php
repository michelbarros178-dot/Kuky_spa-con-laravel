<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class confirmacion_cita extends Model
{
    protected $fillable = [
        'id_cita',
        'fecha_confirmacion',
    ];

    public function cita()
    {
        return $this->belongsTo(citass::class, 'id_cita');
}
public const PAGINATE = 10;
}