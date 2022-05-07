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


        $labs = DB::table('laboratorios_check as  a')
        ->select('a.*','a.id as lab','b.*','c.*')
        ->join('analisis as b','b.id','a.analisis')
        ->join('pacientes as c','c.id','a.paciente')
        ->where('a.estatus', '=', 2)
        ->groupBy('a.recibo')      
        ->get();

        $f1 = date('Y-m-d');
        $f2 = date('Y-m-d');

        return view('labs-check.index2',compact('labs','f1','f2'));
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



     
      $at = LaboratoriosCheck::where('recibo','=',$id)->get();
      if ($at != null) {
          foreach ($at as $rs) {
              $id_at = $rs->id;
              if (!is_null($id_at)) {
                $p = LaboratoriosCheck::find($id_at);
                $p->estatus =1;
                $p->fecha_pago = NULL;
                $res = $p->update();
                 /* $rsf = Sesiones::where('id', '=', $id_rs)->first();
                  $rsf->delete();*/
              }
          }
      }
     




    
      return back();

        //
    }
  
  
  
    




}
