<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class citass extends Model
{

protected $casts = [
    'servicio' => 'array',
];
    // Actualizamos el fillable para que coincida con lo que el Service recibe del Controller
    protected $fillable = [
        'fecha',      // Corresponde a 'fecha' del formulario
        'hora',       // Corresponde a 'hora' del formulario
        'nombre',     // Nombre de la mascota
        'servicio',   // Aquí se guardará el string (ej: "Baño, Corte")
        'email',
        'telefono',
        'notas',
        'estado',     // Por si lo manejas internamente
        'id_cliente', // Si lo sigues asociando
    ];

    /**
     * Relación con el Cliente
     */
    public function cliente()
    {
        return $this->belongsTo(cliente::class, 'id_cliente');
    }

    /**
     * Relación con Servicios (Si decides guardarlos en una tabla aparte en el futuro)
     */
    public function servicios()
    {
        return $this->hasMany(cita_servicio::class, 'id_cita');
    }

    /**
     * Relación con Productos
     */
    public function productos()
    {
        return $this->hasMany(cita_producto::class, 'id_cita');
    }

    /**
     * Relación con Cancelación
     */
    public function cancelacion()
    {
        return $this->hasOne(cancelar_cita::class, 'id_cita');
    }

    public const PAGINATE = 10;
}