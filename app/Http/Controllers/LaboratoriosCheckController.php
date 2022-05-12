<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Creditos;
use App\Debitos;
use App\Analisis;
use App\Atenciones;
use App\LaboratoriosCheck;
use App\Sedes;
use DB;

class LaboratoriosCheckController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {


        $labs = DB::table('laboratorios_check as  a')
        ->select('a.*','a.id as lab','b.*','c.*')
        ->join('analisis as b','b.id','a.analisis')
        ->join('pacientes as c','c.id','a.paciente')
        ->where('a.estatus', '=', 0)
        ->whereDate('a.created_at', date('Y-m-d 00:00:00', strtotime(date('Y-m-d'))))
        ->get();

        $f1 = date('Y-m-d');
        $f2 = date('Y-m-d');

        return view('labs-check.index',compact('labs','f1','f2'));
    }

    public function index1(Request $request)
    {


        $labs = DB::table('laboratorios_check as  a')
        ->select('a.*','a.id as lab','b.*','c.*')
        ->join('analisis as b','b.id','a.analisis')
        ->join('pacientes as c','c.id','a.paciente')
        ->where('a.estatus', '=', 1)
        ->whereDate('a.created_at', date('Y-m-d 00:00:00', strtotime(date('Y-m-d'))))
        ->get();

        $f1 = date('Y-m-d');
        $f2 = date('Y-m-d');

        return view('labs-check.index1',compact('labs','f1','f2'));
    }

    public function index2(Request $request)
    {


      if ($request->inicio) {
        $f1 = $request->inicio;
        $f2 = $request->fin;

        $labs = DB::table('laboratorios_check as  a')
        ->select('a.*','a.id as lab','b.*','c.*')
        ->join('analisis as b','b.id','a.analisis')
        ->join('pacientes as c','c.id','a.paciente')
        ->where('a.estatus', '=', 2)
        ->whereBetween('a.fecha_pago', [$f1,$f2])
        ->get();


      } else {

        $labs = DB::table('laboratorios_check as  a')
        ->select('a.*','a.id as lab','b.*','c.*')
        ->join('analisis as b','b.id','a.analisis')
        ->join('pacientes as c','c.id','a.paciente')
        ->where('a.estatus', '=', 2)
        ->whereDate('a.fecha_pago', date('Y-m-d 00:00:00', strtotime(date('Y-m-d'))))
        ->get();

        $f1 = date('Y-m-d');
        $f2 = date('Y-m-d');

      }


     

        return view('labs-check.index2',compact('labs','f1','f2'));
    }

    public function reporte_pagadas(Request $request){

      $f1 = $request->f1;
      $f2 = $request->f2;


       $labs = DB::table('laboratorios_check as  a')
        ->select('a.*','a.id as lab','b.*','c.*')
        ->join('analisis as b','b.id','a.analisis')
        ->join('pacientes as c','c.id','a.paciente')
        ->where('a.estatus', '=', 2)
        ->whereBetween('a.fecha_pago', [$f1,$f2])
        ->get();


     /* $total_sobres = DB::table('comisiones as a')
      ->select('a.id', 'a.estatus','a.recibo', 'a.id_atencion','a.fecha_pago','a.created_at','a.detalle','a.usuario', 'a.porcentaje', 'a.monto', 'a.estatus', 'at.id_paciente', 'at.tipo_atencion', 'at.sede', 'at.tipo_origen', 'at.id_origen', 'at.monto as total', 'b.nombres', 'b.apellidos', 'c.name as nameo', 'c.lastname as lasto', 'd.name as nameu', 'd.lastname as lastu',DB::raw('SUM(a.monto) as totalrecibo'), DB::raw('COUNT(DISTINCT a.recibo) as total'))
      ->join('atenciones as at', 'at.id', 'a.id_atencion')
      ->join('pacientes as b', 'b.id', 'at.id_paciente')
      ->join('users as c', 'c.id', 'at.id_origen')
      ->join('users as d', 'd.id', 'a.usuario')
      ->where('a.estatus', '=', 2)
      ->where('at.tipo_origen', '=', 1)
      ->where('at.sede', '=', $request->session()->get('sede'))
     // ->where('at.id_origen','=',$request->origen)
      ->whereBetween('a.fecha_pago', [$request->f1, $request->f2])
      //->groupBy('a.recibo')      
      ->first();*/

      $total_sobres = DB::table('laboratorios_check as a')
      ->select('a.*','a.id as lab','b.*','c.*',DB::raw('SUM(b.costo) as totalrecibo'), DB::raw('COUNT(DISTINCT a.id) as total'))
      ->join('analisis as b','b.id','a.analisis')
      ->join('pacientes as c','c.id','a.paciente')
      ->where('a.estatus', '=', 2)
      ->whereBetween('a.fecha_pago', [$f1,$f2])
      ->first();

  
 
 
         $view = \View::make('labs-check.reporte')->with('pagadas', $labs)->with('total_sobres', $total_sobres);
         $pdf = \App::make('dompdf.wrapper');
         $pdf->loadHTML($view);
         return $pdf->stream('laboratorios_pagados');
 
   }




    public function checkmultiple(Request $request)
    {


        foreach ($request->com as $atencion) {

        
            LaboratoriosCheck::where('id', $atencion)
                    ->update([
                        'fecha_check' => date('Y-m-d'),
                        'estatus' => 1,
                    ]);
        }

        return back();


    }

    public function pagarmultiplelab(Request $request)
    {


      if(isset($request->com)){
        $last = LaboratoriosCheck::select('recibo')->where('estatus','=',2)->orderby('recibo', 'desc')->max('recibo');
        if ($last != NULL) {
          $last1 = $last;
          //$last = array_pop($last);
        } else {
          $last1 = 0;
        }
  
        $recibo = $last1 + 1;
        
        foreach ($request->com as $atencion) {

         
          LaboratoriosCheck::where('id', $atencion)
                    ->update([
                        'fecha_pago' => date('Y-m-d'),
                        'estatus' => 2,
                        'recibo' => $recibo
                    ]);
        }
  
      } 
  
      return back();
    }



    public function chequear($id)
    {

      
      $p = LaboratoriosCheck::find($id);
      $p->estatus =1;
      $p->fecha_check = date('Y-m-d');
      $res = $p->update();
    
      return back();

        //
    }

    
    public function reversar_check($id)
    {

      
      $p = LaboratoriosCheck::find($id);
      $p->estatus =0;
      $p->fecha_check = NULL;
      $res = $p->update();
    
      return back();

        //
    }

    public function reversar_pago($id)
    {


      $p = LaboratoriosCheck::find($id);
      $p->estatus =1;
      $p->fecha_pago = NULL;
      $res = $p->update();

      return back();

        //
    }
  
  
  
    




}
