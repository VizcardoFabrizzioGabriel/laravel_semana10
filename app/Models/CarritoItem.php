<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarritoItem extends Model
{
    protected $fillable = [
        'carrito_id',
        'producto_id',
        'cantidad'
    ];

    public function producto()
    {
        return $this->belongsTo(
            Producto::class,
            'producto_id',
            'id_producto'
        );
    }

    public function carrito()
    {
        return $this->belongsTo(Carrito::class);
    }
}