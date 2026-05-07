<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $fillable = [
        'nombre_completo',
        'email',
        'telefono',
        'id_rol',
        'password',
    ];



    public function rol()
    {
        return $this->belongsTo(rol::class, 'id_rol');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public const PAGINATE = 10;
}