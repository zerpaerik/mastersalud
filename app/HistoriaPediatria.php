<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoriaPediatria extends Model
{

    protected $table="historia_pediatrica";

    protected $fillable = [
        'id_paciente', 'id_consulta','usuario'
    ];
    //
}
