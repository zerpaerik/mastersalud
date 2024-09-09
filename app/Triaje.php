<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Triaje extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table="triaje";

    protected $fillable = [
        'id', 'id_consulta', 'peso', 'talla', 'p', 'ta', 'sat'
    ];

    //
}
