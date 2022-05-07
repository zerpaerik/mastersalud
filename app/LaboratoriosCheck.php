<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaboratoriosCheck extends Model
{

    protected $table="laboratorios_check";

    protected $fillable = [
        'analisis', 'atencion', 'laboratorio','paciente','estatus','fecha_check','fecha_pago','recibo'
    ];
    //
}
