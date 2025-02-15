<?php

namespace App\Http\Controllers;
use App\Equipos;
use App\Requerimientos;
use App\ActivosRequerimientos;
use App\Clientes;
use App\Creditos;
use App\Debitos;
use App\Pedidos;
use App\Ventas;
use App\VentasDetalle;
use App\Pacientes;
use App\Solicitudes;
use App\Analisis;
use App\User;
use App\Productos;
use Auth;
use Illuminate\Http\Request;
use DB;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        if($request->inicio){

        $f1 = $request->inicio;
        $f2 = $request->fin;

        $ventas = DB::table('ventas as a')
        ->select('a.id','b.id as id_detalle','b.id_producto','b.cantidad','b.cliente','b.tipop','b.sede','b.monto',DB::raw(' SUM(b.total) as total'),'a.created_at','an.nombre as producto')
        ->join('ventas_detalle as b','b.id_venta','a.id')
        ->join('productos as an','an.id','b.id_producto')
        ->where('b.sede', '=', $request->session()->get('sede'))
        ->whereBetween('a.created_at', [$f1, $f2])
        ->groupBy('b.id_venta')
        ->get(); 


        $total = VentasDetalle::whereBetween('created_at', [$f1, $f2])
        ->where('sede', '=', $request->session()->get('sede'))
        ->select(DB::raw('COUNT(*) as cantidad, SUM(total) as monto'))
        ->first();

        
        $total_ef = VentasDetalle::whereBetween('created_at', [$f1, $f2])
        ->where('sede', '=', $request->session()->get('sede'))
        ->where('tipop', '=', 'EF')
        ->select(DB::raw('COUNT(*) as cantidad, SUM(total) as monto'))
        ->first();

        
        $total_tj = VentasDetalle::whereBetween('created_at', [$f1, $f2])
        ->where('sede', '=', $request->session()->get('sede'))
        ->where('tipop', '=', 'TJ')
        ->select(DB::raw('COUNT(*) as cantidad, SUM(total) as monto'))
        ->first();

        
        $total_dp = VentasDetalle::whereBetween('created_at', [$f1, $f2])
        ->where('sede', '=', $request->session()->get('sede'))
        ->where('tipop', '=', 'DP')
        ->select(DB::raw('COUNT(*) as cantidad, SUM(total) as monto'))
        ->first();

        $total_pl = VentasDetalle::whereBetween('created_at', [$f1, $f2])
        ->where('sede', '=', $request->session()->get('sede'))
        ->where('tipop', '=', 'PL')
        ->select(DB::raw('COUNT(*) as cantidad, SUM(total) as monto'))
        ->first();

        
        $total_yp = VentasDetalle::whereBetween('created_at',  [$f1, $f2])
        ->where('sede', '=', $request->session()->get('sede'))
        ->where('tipop', '=', 'YP')
        ->select(DB::raw('COUNT(*) as cantidad, SUM(total) as monto'))
        ->first();


 
    }else {
        $ventas = DB::table('ventas as a')
        ->select('a.id','b.id as id_detalle','b.id_producto','b.cantidad','b.cliente','b.sede','b.tipop','b.monto',DB::raw(' SUM(b.total) as total'),'a.created_at','an.nombre as producto')
        ->join('ventas_detalle as b','b.id_venta','a.id')
        ->join('productos as an','an.id','b.id_producto')
        ->where('a.created_at', '=', date('Y-m-d'))
        ->where('b.sede', '=', $request->session()->get('sede'))
        ->groupBy('b.id_venta')
        ->get(); 

        $f1 =date('Y-m-d');
        $f2 =date('Y-m-d');

        $total = VentasDetalle::where('created_at', '=', date('Y-m-d'))
        ->where('sede', '=', $request->session()->get('sede'))
        ->select(DB::raw('COUNT(*) as cantidad, SUM(total) as monto'))
        ->first();

        
        $total_ef = VentasDetalle::where('created_at', '=', date('Y-m-d'))
        ->where('sede', '=', $request->session()->get('sede'))
        ->where('tipop', '=', 'EF')
        ->select(DB::raw('COUNT(*) as cantidad, SUM(total) as monto'))
        ->first();

        
        $total_tj = VentasDetalle::where('created_at', '=', date('Y-m-d'))
        ->where('sede', '=', $request->session()->get('sede'))
        ->where('tipop', '=', 'TJ')
        ->select(DB::raw('COUNT(*) as cantidad, SUM(total) as monto'))
        ->first();

        
        $total_dp = VentasDetalle::where('created_at', '=', date('Y-m-d'))
        ->where('sede', '=', $request->session()->get('sede'))
        ->where('tipop', '=', 'DP')
        ->select(DB::raw('COUNT(*) as cantidad, SUM(total) as monto'))
        ->first();

          
        $total_pl = VentasDetalle::where('created_at', '=', date('Y-m-d'))
        ->where('sede', '=', $request->session()->get('sede'))
        ->where('tipop', '=', 'PL')
        ->select(DB::raw('COUNT(*) as cantidad, SUM(total) as monto'))
        ->first();

        
        $total_yp = VentasDetalle::where('created_at', '=', date('Y-m-d'))
        ->where('sede', '=', $request->session()->get('sede'))
        ->where('tipop', '=', 'YP')
        ->select(DB::raw('COUNT(*) as cantidad, SUM(total) as monto'))
        ->first();



          
      

    }

    $ventass = new Ventas();


    

        return view('ventas.index', compact('ventas','f1','f2','ventass','total','total_pl','total_ef','total_tj','total_dp','total_yp'));
        //
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
        $productos = Productos::where('estatus','=',1)->get();

        return view('ventas.create', compact('productos'));

    }

   

    public function store(Request $request)
    {   


     

        $venta = new Ventas();
        $venta->save();


        if (isset($request->id_laboratorio)) {
             foreach ($request->id_laboratorio['laboratorios'] as $key => $lab) {
               if (!is_null($lab['laboratorio'])) {

                $totalabono = (float)$request->monto_abol1['laboratorios'][$key]['abo'] + (float)$request->monto_abol2['laboratorios'][$key]['abo1'];

                $monto = $request->monto_l['laboratorios'][$key]['monto'];

                if($totalabono > $request->monto_abol['laboratorios'][$key]['abono'] * $monto){
                  $request->session()->flash('error', 'El monto del abono de pagos mixto es mayor al item de producto.');
                  return back();
                } 

                $pedidos = new VentasDetalle();
                $pedidos->id_venta =$venta->id;
                $pedidos->id_producto =$lab['laboratorio'];
                $pedidos->monto = $request->monto_abol1['laboratorios'][$key]['abo'];
                $pedidos->monto1 = $request->monto_abol2['laboratorios'][$key]['abo1'];
                $pedidos->cantidad =$request->monto_abol['laboratorios'][$key]['abono'];
                $pedidos->total =$request->monto_abol['laboratorios'][$key]['abono'] * $request->monto_abol1['laboratorios'][$key]['abo'];
                $pedidos->cliente =$request->cliente;
                $pedidos->tipop =$request->id_pago['laboratorios'][$key]['tipop'];
                $pedidos->tipop1 =$request->id_pago['laboratorios'][$key]['tipop1'];
                $pedidos->sede = $request->session()->get('sede');
                $pedidos->usuario =Auth::user()->id;
                $pedidos->save();

                $cre = new Creditos();
                $cre->origen = 'VENTAS';
                $cre->descripcion = 'VENTA DE PRODUCTOS';
                $cre->monto =  (float)$request->monto_abol1['laboratorios'][$key]['abo'];
                $cre->usuario = Auth::user()->id;
                $cre->tipopago = $request->id_pago['laboratorios'][$key]['tipop'];
                $cre->id_venta_detalle = $pedidos->id;
                $cre->id_venta = $venta->id;
                if ($request->id_pago['laboratorios'][$key]['tipop'] == 'EF') {
                    $cre->efectivo =  $request->monto_abol1['laboratorios'][$key]['abo'];
                  } elseif($request->id_pago['laboratorios'][$key]['tipop'] == 'TJ') {
                    $cre->tarjeta =  $request->monto_abol1['laboratorios'][$key]['abo'];
                  } elseif($request->id_pago['laboratorios'][$key]['tipop'] == 'DP') {
                    $cre->dep =  $request->monto_abol1['laboratorios'][$key]['abo'];
                  } else {
                    $cre->yap = $request->monto_abol1['laboratorios'][$key]['abo'];
                  }
                $cre->sede = $request->session()->get('sede');
                $cre->fecha = date('Y-m-d');
                $cre->save();

                if($request->monto_abol2['laboratorios'][$key]['abo1'] != null){
                  $cre1 = new Creditos();
                  $cre1->origen = 'VENTAS';
                  $cre1->descripcion = 'VENTA DE PRODUCTOS';
                  $cre1->monto =  (float)$request->monto_abol2['laboratorios'][$key]['abo1'];
                  $cre1->usuario = Auth::user()->id;
                  $cre1->tipopago = $request->id_pago['laboratorios'][$key]['tipop1'];
                  $cre1->id_venta_detalle = $pedidos->id;
                  $cre1->id_venta = $venta->id;
                  if ($request->id_pago['laboratorios'][$key]['tipop1'] == 'EF') {
                      $cre1->efectivo =  $request->monto_abol2['laboratorios'][$key]['abo1'];
                    } elseif($request->id_pago['laboratorios'][$key]['tipop1'] == 'TJ') {
                      $cre1->tarjeta = $request->monto_abol2['laboratorios'][$key]['abo1'];
                    } elseif($request->id_pago['laboratorios'][$key]['tipop1'] == 'DP') {
                      $cre1->dep =  $request->monto_abol2['laboratorios'][$key]['abo1'];
                    } else {
                      $cre1->yap =  $request->monto_abol2['laboratorios'][$key]['abo1'];
                    }
                  $cre1->sede = $request->session()->get('sede');
                  $cre1->fecha = date('Y-m-d');
                  $cre1->save();

                }


                   $produc = Productos::where('id','=',$lab['laboratorio'])->first();

                    $p = Productos::find($produc->id);
                    $p->cantidad =$produc->cantidad - $request->monto_abol['laboratorios'][$key]['abono'];
                    $res = $p->update();

       
               } else {
       
               }
             }
           }

       
        


        return redirect()->action('VentasController@index')
        ->with('success','Registrado Exitosamente!');


    }

   

    public function ticket($id)
    {
        $venta = Ventas::find($id);


        $ventas_detalle = DB::table('ventas as a')
        ->select('a.*','b.id_venta','b.id_producto','b.cantidad','b.cliente','b.tipop','b.monto','p.nombre as producto','p.precio')
        ->join('ventas_detalle as b','b.id_venta','a.id')
        ->join('productos as p','p.id','b.id_producto')
        ->where('b.id_venta','=',$id)
        ->get();

        $ventas_detalled = DB::table('ventas as a')
        ->select('a.*','b.id_venta','b.id_producto','b.cantidad','b.cliente','b.tipop','b.monto','p.nombre as producto','p.precio')
        ->join('ventas_detalle as b','b.id_venta','a.id')
        ->join('productos as p','p.id','b.id_producto')
        ->where('b.id_venta','=',$id)
        ->first();

         
        $total = VentasDetalle::where('id_venta', '=',$id)
        ->select(DB::raw('SUM(monto) as monto'))
        ->first();



        $view = \View::make('ventas.ticket', compact('ventas_detalled','ventas_detalle','total'));
        $customPaper = array(0,0,500.00,190.00);

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper($customPaper, 'landscape');
     
       
        return $pdf->stream('ticket-venta'.'.pdf');    
    
    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clientes  $Clientes
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        $sesio = VentasDetalle::where('id_venta','=',$id)->get();
        if ($sesio != null) {
            foreach ($sesio as $rs) {
                $id_rs = $rs->id;
                if (!is_null($id_rs)) {

                    $rsfp = VentasDetalle::where('id', '=', $id_rs)->first();
                    $produc = VentasDetalle::where('id_producto', '=', $rsfp->id_producto)->first();

                    $p = Productos::find($rsfp->id_producto);
                    $p->cantidad =$produc->cantidad + $rsfp->cantidad;
                    $res = $p->update();

                    $rsf = VentasDetalle::where('id', '=', $id_rs)->first();
                    $rsf->delete();

                    $creditosa = Creditos::where('id_venta_detalle','=',$id_rs)->get();
                    //ELIMINAR CREDITOS
              
                        foreach ($creditosa as $cred) {
                          $id_credito = $cred->id;
                          if (!is_null($id_credito)) {
                              $rsf = Creditos::where('id', '=', $id_credito)->first();
                              $rsf->delete();
                          }
                      }

                }
            }
        }
       

        $creditos = Ventas::where('id','=',$id)->first();
        $creditos->delete();

        return redirect()->action('VentasController@index');

        //
    }


    public function guardar_archivo(Request $request){



        $usuario = DB::table('users')
        ->select('*')
        ->where('id','=', Auth::user()->id)
        ->first();  
  
  
        $rs = Atenciones::where('id','=',$request->id)->first();
        $img = $request->file('informe');
        $nombre_imagen=$img->getClientOriginalName();
        $rs->usuario_archivo=Auth::user()->id;
        $rs->archivo=$nombre_imagen;
        if ($rs->save()) {
            \Storage::disk('public')->put($nombre_imagen, \File::get($img));
        }
        \DB::commit();
  
  
        return redirect()->route('atenciones.index')
        ->with('success','Creado Exitosamente!');
           
      }
  
      public function guardar_archivo_get($id){
  
        return view('ventas.archivo', compact('id'));
  
      }
  
  




}

