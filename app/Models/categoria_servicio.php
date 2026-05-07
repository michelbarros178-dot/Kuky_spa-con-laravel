<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categoria_servicio extends Model
{
    protected $fillable = [
        'categoria',
        'descripcion',
    ];

    public function servicios()
    {
        return $this->hasMany(servicio::class, 'id_categoria');
    }
    public const PAGINATE = 10;
}
