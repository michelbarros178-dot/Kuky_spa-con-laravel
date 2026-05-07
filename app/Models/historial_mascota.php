<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class historial_mascota extends Model
{
    protected $fillable = [
        'id_mascota',
        'descripcion',
        'fecha_registro',
    ];

    public function mascota()
    {
        return $this->belongsTo(mascota::class, 'id_mascota');
    }
    public const PAGINATE = 10;
}
