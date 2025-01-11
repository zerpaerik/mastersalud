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
  
  $ef = DB::table('creditos as a')
  ->select('a.id_venta','a.tipopago',DB::raw('SUM(a.monto) as efectivo'))
  ->where('a.tipopago', '=', 'EF')
  ->where('a.id_venta', '=', $id)
  ->get(); 


  $tj = DB::table('creditos as a')
  ->select('a.id_venta','a.tipopago',DB::raw('SUM(a.monto) as tj'))
  ->where('a.tipopago', '=', 'TJ')
  ->where('a.id_venta', '=', $id)
  ->get(); 

  $dp = DB::table('creditos as a')
  ->select('a.id_venta','a.tipopago',DB::raw('SUM(a.monto) as dp'))
  ->where('a.tipopago', '=', 'DP')
  ->where('a.id_venta', '=', $id)
  ->get(); 

  $yp = DB::table('creditos as a')
  ->select('a.id_venta','a.tipopago',DB::raw('SUM(a.monto) as yp'))
  ->where('a.tipopago', '=', 'YP')
  ->where('a.id_venta', '=', $id)
  ->get(); 

  $descripcion='';

  foreach ($ef as $key => $value) {
    $descripcion.= $value->efectivo.'-'.$value->tipopago.' ';
 }

 foreach ($tj as $key => $value) {
  $descripcion.= $value->tj.'-'.$value->tipopago.' ';
}

foreach ($dp as $key => $value) {
  $descripcion.= $value->dp.'-'.$value->tipopago.' ';
}

foreach ($yp as $key => $value) {
  $descripcion.= $value->yp.'-'.$value->tipopago.' ';
}

return substr($descripcion, 0, -1);



  /*  $array='';
    $data = \DB::table('ventas_detalle')
    ->select('*')
               // ->where('estatus','=','1')
    ->where('id_venta', $id)
    ->get();

    $descripcion='';
    
    
    foreach ($data as $key => $value) {
      $descripcion.= $value->monto.'-'.$value->tipop.','.$value->monto1.'-'.$value->tipop1.' ';
   }

return substr($descripcion, 0, -1);*/
          //  return $id;
}




  

    
    //
}
