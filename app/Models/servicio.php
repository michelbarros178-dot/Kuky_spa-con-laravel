<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class servicio extends Model
{
    protected $fillable = [
        'nombre_servicio',
        'descripcion',
        'precio',
        'id_categoria',
    ];

    public function categoria()
    {
        return $this->belongsTo(categoria_servicio::class, 'id_categoria');
    }

    public function citas()
    {
        return $this->belongsToMany(citass::class, 'cita_servicios', 'id_servicio', 'id_cita')
                    ->withPivot('cantidad')
                    ->withTimestamps();
    }

    public function productos()
    {
        return $this->belongsToMany(producto::class, 'servicio_productos', 'id_servicio', 'id_producto')
                    ->withPivot('cantidad')
                    ->withTimestamps();
    }
    public const PAGINATE = 10;
}
