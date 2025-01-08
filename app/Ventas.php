<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Ventas extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table="ventas";


    public function selectProductos($id)
    {

        $array='';
        $data = \DB::table('ventas_detalle')
        ->select('*')
                   // ->where('estatus','=','1')
        ->where('id_venta', $id)
        ->get();
        $descripcion='';
        
        
        foreach ($data as $key => $value) {

          $dataproductos = \DB::table('productos')
          ->select('*')
          ->where('id', $value->id_producto)
          ->get();
          foreach ($dataproductos as $key => $valueproducto) {
            $descripcion.= $valueproducto->nombre.'-Cant:'.$value->cantidad.', ';
                          # code...
        }
    }

    return substr($descripcion, 0, -1);
              //  return $id;
}


public function detallePago($id)
{

    $array='';
    $data = \DB::table('creditos')
    ->select('*')
               // ->where('estatus','=','1')
    ->where('id_venta_detalle', $id)
    ->get();
    $descripcion='';
    
    
    foreach ($data as $key => $value) {
      $descripcion.= $value->monto.'-'.$value->tipopago.', ';
   }

return substr($descripcion, 0, -1);
          //  return $id;
}




  

    
    //
}
