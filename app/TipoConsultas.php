<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoConsultas extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table="tipo_consultas";

    protected $fillable = [
        'detalle','precio'
    ];

    
    //
}
