<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    protected $fillable = [
        'nombre_completo',
        'email',
        'telefono',
        'id_rol',
        'password',

    ];

    public function citas()
    {
        return $this->hasMany(citass::class, 'id_cliente');
    }
    public const PAGINATE = 10;
}
