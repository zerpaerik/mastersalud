<?php

namespace App\Http\Controllers;
use App\Equipos;
use App\Analisis;
use App\Debitos;
use App\Creditos;
use App\DebitosB;
use App\CreditosB;
use App\Tiempo;
use App\Material;
use App\User;
use Auth;
use Illuminate\Http\Request;
use DB;

class GastosController extends Controller
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


        $gastos = DB::table('debitos as a')
        ->select('a.id','a.descripcion','a.monto','a.recibido','a.usuario','a.sede','a.tipo','a.created_at','b.name')
        ->join('users as b','b.id','a.usuario')
        ->whereBetween('a.created_at', [date('Y-m-d 00:00:00', strtotime($f1)), date('Y-m-d 23:59:59', strtotime($f2))])
        ->where('a.sede','=',$request->session()->get('sede'))
        ->get(); 

        

        $deb = Debitos::whereBetween('created_at', [date('Y-m-d 00:00:00', strtotime($f1)), date('Y-m-d 23:59:59', strtotime($f2))])
        ->where('sede','=',$request->session()->get('sede'))
        ->select(DB::raw('COUNT(*) as cantidad, SUM(monto) as monto'))
        ->first();

        if ($deb->cantidad == 0) {
        $deb->monto = 0;
        }
            


        } else {
            $f1 =date('Y-m-d');
            $f2 = date('Y-m-d');

            $gastos = DB::table('debitos as a')
            ->select('a.id','a.descripcion','a.monto','a.recibido','a.sede','a.usuario','a.sede','a.tipo','a.created_at','b.name')
            ->join('users as b','b.id','a.usuario')
            ->where('a.sede','=',$request->session()->get('sede'))
            ->whereDate('a.created_at', date('Y-m-d 00:00:00', strtotime($f1)))
            ->get(); 

          
            
        $deb = Debitos::whereDate('created_at', date('Y-m-d 00:00:00', strtotime($f1)))
        ->where('sede','=',$request->session()->get('sede'))
        ->select(DB::raw('COUNT(*) as cantidad, SUM(monto) as monto'))
        ->first();

        if ($deb->cantidad == 0) {
        $deb->monto = 0;
        }
            
        }

        return view('gastos.index', compact('gastos','f1','f2','deb'));
        //
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gastos.create');
    }

    public function createb()
    {
        return view('gastos.createb');
    }

    public function createc()
    {
        return view('gastos.createc');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $gastos = new Debitos();
        $gastos->descripcion =$request->descripcion;
        $gastos->tipo =$request->tipo;
        $gastos->monto =$request->monto;
        $gastos->origen ='GASTOS';
        $gastos->recibido =$request->recibido;
        $gastos->usuario =Auth::user()->id;
        $gastos->sede =$request->session()->get('sede');
        $gastos->save();

        $gastosb = new DebitosB();
        $gastosb->descripcion =$request->descripcion;
        $gastosb->tipo =$request->tipo;
        $gastosb->monto =$request->monto;
        $gastosb->origen ='GASTOS';
        $gastosb->recibido =$request->recibido;
        $gastosb->usuario =Auth::user()->id;
        $gastosb->sede =$request->session()->get('sede');
        $gastosb->id_gastoa =$gastos->id;
        $gastosb->save();

        if ($request->tipo != 'RETIRO DE EFECTIVO') {
            $cre = new Creditos();
            $cre->origen = 'EGRESO';
            $cre->descripcion = 'EGRESO';
            $cre->id_egreso =  $gastos->id;
            $cre->egreso = $request->monto;
            $cre->usuario = Auth::user()->id;
            $cre->tipopago = 'EG';
            $cre->sede = $request->session()->get('sede');
            $cre->fecha = date('Y-m-d');
            $cre->save();

            $cre = new CreditosB();
            $cre->origen = 'EGRESO';
            $cre->descripcion = 'EGRESO';
            $cre->id_egreso =  $gastosb->id;
            $cre->id_gastoa =$gastos->id;
            $cre->egreso = $request->monto;
            $cre->usuario = Auth::user()->id;
            $cre->tipopago = 'EG';
            $cre->sede = $request->session()->get('sede');
            $cre->fecha = date('Y-m-d');
            $cre->save();
        }

        

        return redirect()->action('GastosController@index', ["created" => true, "gastos" => Debitos::all()]);

    }

    public function storeb(Request $request)
    {


        $gastos = new DebitosB();
        $gastos->descripcion =$request->descripcion;
        $gastos->tipo =$request->tipo;
        $gastos->monto =$request->monto;
        $gastos->origen ='GASTOS';
        $gastos->migrado =0;
        $gastos->recibido =$request->recibido;
        $gastos->usuario =Auth::user()->id;
        $gastos->sede =$request->session()->get('sede');
        $gastos->save();

        if ($request->tipo != 'RETIRO DE EFECTIVO') {
          
            $cre = new CreditosB();
            $cre->origen = 'EGRESO';
            $cre->descripcion = 'EGRESO';
            $cre->id_egreso =  $gastos->id;
            $cre->egreso = $request->monto;
            $cre->usuario = Auth::user()->id;
            $cre->tipopago = 'EG';
            $cre->sede = $request->session()->get('sede');
            $cre->fecha = date('Y-m-d');
            $cre->save();
        }

        
        return redirect()->action('CreditosController@gastosb');

    }

    public function storec(Request $request)
    {


        $gastos = new DebitosB();
        $gastos->descripcion =$request->descripcion;
        $gastos->tipo =$request->tipo;
        $gastos->monto =$request->monto;
        $gastos->origen ='GASTOS';
        $gastos->migrado =1;
        $gastos->tipo_deb =1;
        $gastos->recibido =$request->recibido;
        $gastos->usuario =Auth::user()->id;
        $gastos->sede =$request->session()->get('sede');
        $gastos->save();

        if ($request->tipo != 'RETIRO DE EFECTIVO') {
         
            $cre = new CreditosB();
            $cre->origen = 'EGRESO';
            $cre->descripcion = 'EGRESO';
            $cre->id_egreso =  $gastos->id;
            $cre->egreso = $request->monto;
            $cre->usuario = Auth::user()->id;
            $cre->tipopago = 'EG';
            $cre->migrado = 1;
            $cre->sede = $request->session()->get('sede');
            $cre->fecha = date('Y-m-d');
            $cre->save();
        }

        
        return redirect()->action('CreditosController@gastosc');

    }

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Analisis  $Clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $gastos = Debitos::where('id','=',$id)->first();

        return view('gastos.edit', compact('gastos')); //
    }

    public function ticket($id)
    {
        

        $gastos = DB::table('debitos as a')
        ->select('a.id','a.descripcion','a.monto','a.recibido','a.usuario','a.sede','a.tipo','a.created_at','b.name')
        ->join('users as b','b.id','a.usuario')
        ->where('a.id','=',$id)
        ->first(); 

        $view = \View::make('gastos.ticket')->with('gasto', $gastos);;
        $customPaper = array(0,0,1000.00,200.00);

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper($customPaper, 'landscape');
        return $pdf->stream('ticket_ver');    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Creditos  $Clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

      $p = Debitos::find($request->id);
      $p->fill($request->all());
      $p->created_at = $p->getOriginal('created_at'); 
      $p->save();

      $deb = Creditos::where('id_egreso','=',$request->id)->first();
      $deb->egreso =$request->monto;
      $res1 = $deb->update();

      /*$deb = CreditosB::where('id_egreso','=',$request->id)->first();
      $deb->egreso =$request->monto;
      $res1 = $deb->update();*/

      $da = Debitos::where('id','=',$request->id)->first();


      if ($da->migrado == 0) {
          return redirect()->action('GastosController@index');
      } else {
        return redirect()->action('CreditosController@gastosc');


      }

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Debitos  $Clientes
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        $deb = Debitos::where('id','=',$id)->first();


        $ingresos = Debitos::where('id','=',$id);
        $ingresos->delete();

        $debito = Creditos::where('id_egreso','=',$id)->first();
        $debito->delete();

      /*  $debb = DebitosB::where('id_gastoa','=',$id);
        $debb->delete();

        $creditosb = CreditosB::where('id_gastoa','=',$id)->first();
        $creditosb->delete();*/


        return redirect()->action('GastosController@index');

        //
    }

    public function deleteb($id)
    {

        $deb = Debitos::where('id','=',$id)->first();


        $ingresos = DebitosB::where('id','=',$id);
        $ingresos->delete();

        $debito = CreditosB::where('id_egreso','=',$id)->first();
        $debito->delete();

        return back();

        //
    }
}
