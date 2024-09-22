<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchivosPaciente extends Model
{

    protected $table="paciente_archivos";

    protected $fillable = [
        'id', 'id_paciente', 'nombre', 'archivo'
    ];
    //
}
