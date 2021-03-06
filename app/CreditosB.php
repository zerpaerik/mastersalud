<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditosB extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table="creditosb";

    protected $fillable = [
        'origen','descripcion','tipopago','usuario', 'solicitud','monto','nombre','efectivo','tarjeta','dep','yap','atendido_por','tarjeta','fecha','id_atencion','sede','id_cobro','id_egreso','monto','migrado','id_gastoa'
    ];

    
    //
}
