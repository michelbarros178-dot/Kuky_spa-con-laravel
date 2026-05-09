<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Mascota
 * Representa la tabla 'mascotas' en la base de datos.
 */
class Mascota extends Model
{
    use HasFactory;

    // Indicamos el nombre de la tabla explícitamente ya que no es el plural en inglés (pets)
    protected $table = 'Mascotas';

    // Campos que Laravel permitirá llenar mediante Mascota::create()
    protected $fillable = [
        'nombre_mascota',
        'especie',
        'raza',
        'edad',        // Ajustado para coincidir con tu migración $table->integer('edad')
        'id_cliente',
    ];

    /**
     * Relación: Una mascota pertenece a un cliente.
     */
    public function cliente()
    {
        // Se especifica 'id_cliente' porque no sigue la convención 'cliente_id'
        return $this->belongsTo(cliente::class, 'id_cliente');
    }

    /**
     * Relación: Una mascota puede tener muchos registros en su historial.
     */
    public function historial()
    {
        return $this->hasMany(historial_mascota::class, 'id_mascota');
    }

    // Constante para paginación (útil para las vistas de listado)
    public const PAGINATE = 10;
}