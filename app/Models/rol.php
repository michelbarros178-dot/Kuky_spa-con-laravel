<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rol extends Model
{
    protected $fillable = [
        'nombre_rol',
        'descripcion',
    ];

    public function admins()
    {
        return $this->hasMany(admin::class, 'id_rol');
    }
    public const PAGINATE = 10;
}
