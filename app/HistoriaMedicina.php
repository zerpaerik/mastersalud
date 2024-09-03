<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoriaMedicina extends Model
{

    protected $table="historia_medicina";

    protected $fillable = [
        'id_paciente', 'id_consulta','usuario'
    ];
    //
}
