<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Creditos;
use App\Debitos;
use App\Analisis;
use App\Atenciones;
use App\Laboratorio;
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

      
      if ($request->inicio) {
        $f1 = $request->inicio;
        $f2 = $request->fin;

        $labs = DB::table('laboratorios_check as  a')
        ->select('a.*','a.created_at as fecha','a.id as lab','b.*','c.*')
        ->join('analisis as b','b.id','a.analisis')
        ->join('pacientes as c','c.id','a.paciente')
        ->where('a.estatus', '=', 0)
        ->whereBetween('a.created_at', [$f1,$f2])
        ->get();


      } else {
        $labs = DB::table('laboratorios_check as  a')
        ->select('a.*','a.created_at as fecha','a.id as lab','b.*','c.*')
        ->join('analisis as b','b.id','a.analisis')
        ->join('pacientes as c','c.id','a.paciente')
        ->where('a.estatus', '=', 0)
        ->whereDate('a.created_at', date('Y-m-d 00:00:00', strtotime(date('Y-m-d'))))
        ->get();

        $f1 = date('Y-m-d');
        $f2 = date('Y-m-d');

      }


      

        return view('labs-check.index',compact('labs','f1','f2'));
    }

    public function index1(Request $request)
    {

      if ($request->inicio) {
        $f1 = $request->inicio;
        $f2 = $request->fin;

        $labs = DB::table('laboratorios_check as  a')
        ->select('a.*','a.created_at as creacion','a.id as lab','b.*','c.*')
        ->join('analisis as b','b.id','a.analisis')
        ->join('pacientes as c','c.id','a.paciente')
        ->where('a.estatus', '=', 1)
        ->whereBetween('a.created_at', [$f1,$f2])
        ->get();

        $total = DB::table('laboratorios_check as a')
        ->select('a.*','a.id as lab','b.*','c.*',DB::raw('SUM(b.costo) as costo'), DB::raw('COUNT(DISTINCT a.id) as items'))
        ->join('analisis as b','b.id','a.analisis')
        ->join('pacientes as c','c.id','a.paciente')
        ->where('a.estatus', '=', 1)
        ->whereBetween('a.created_at', [$f1,$f2])
        ->first();
  




      } else {


        $labs = DB::table('laboratorios_check as  a')
        ->select('a.*','a.id as lab','a.created_at as creacion','b.*','c.*')
        ->join('analisis as b','b.id','a.analisis')
        ->join('pacientes as c','c.id','a.paciente')
        ->where('a.estatus', '=', 1)
        ->whereDate('a.created_at', date('Y-m-d 00:00:00', strtotime(date('Y-m-d'))))
        ->get();

        $f1 = date('Y-m-d');
        $f2 = date('Y-m-d');

        $total = DB::table('laboratorios_check as a')
        ->select('a.*','a.id as lab','b.*','c.*',DB::raw('SUM(b.costo) as costo'), DB::raw('COUNT(DISTINCT a.id) as items'))
        ->join('analisis as b','b.id','a.analisis')
        ->join('pacientes as c','c.id','a.paciente')
        ->where('a.estatus', '=', 1)
        ->whereBetween('a.created_at', [$f1,$f2])
        ->first();

      }

        return view('labs-check.index1',compact('labs','f1','f2','total'));
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
        ->select('a.*','a.id as lab','b.*','c.*','at.created_at as fecha_atencion')
        ->join('analisis as b','b.id','a.analisis')
        ->join('pacientes as c','c.id','a.paciente')
        ->join('atenciones as at','at.id','a.atencion')
        ->where('a.estatus', '=', 2)
        ->whereBetween('a.fecha_pago', [$f1,$f2])
        ->get();


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
    
    public function enviar($id){

      $labs = LaboratoriosCheck::where('id','=',$id)->first();


      $centros = Laboratorio::where('estatus', '=', 1)->get();

      
      return view('labs-check.enviar',compact('centros','labs'));
    }



    public function enviarPost(Request $request)
    {

      
      $p = LaboratoriosCheck::find($request->id);
      $p->centro = $request->laboratorio;
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

    public function delete($id){

      $rsf = LaboratoriosCheck::where('id', '=', $id)->first();
      $rsf->delete();

      return back();



    }
  
  
  
    




}
