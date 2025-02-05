<?php

namespace App\Http\Controllers;
use App\Equipos;
use App\Analisis;
use App\Clientes;
use App\Tiempo;
use App\Material;
use App\Pacientes;
use App\Servicios;
use App\User;
use App\Atenciones;
use App\Consultas;
use App\Metodos;
use App\Ciexes;
use App\Triaje;
use App\Historia;
use App\HistoriaMedicina;
use App\HistoriaPediatria;
use App\AntecedentesObstetricos;
use App\Control;
use App\HistoriaBase;
use Auth;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;



class ConsultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      
      if ($request->inicio) {
        $f1 = $request->inicio;
        $f2 = $request->fin;

        $consultas = DB::table('consultas as a')
        ->select('a.id','a.id_paciente','a.id_atencion','a.triaje','a.usuario','a.historia','a.tipo_consulta','a.id_especialista','a.tipo','a.sede','a.created_at','a.estatus','a.monto','b.nombres','b.apellidos','c.name as nameo','c.lastname as lasto','e.name as namee','e.lastname as laste','at.created_at as fecha')
        ->join('pacientes as b','b.id','a.id_paciente')
        ->join('users as c','c.id','a.usuario')
        ->join('users as e','e.id','a.id_especialista')
        ->join('atenciones as at','at.id','a.id_atencion')
        ->where('a.estatus', '=', 1)
        ->where('a.sede', '=', $request->session()->get('sede'))
        ->where('a.id_especialista', '=', Auth::user()->id)
        ->whereBetween('a.created_at', [$f1, $f2])
        ->orderBy('a.id','DESC')
        ->get(); 

      } else {

        $f1 = date('Y-m-d');
        $f2 = date('Y-m-d');

        $consultas = DB::table('consultas as a')
        ->select('a.id','a.id_paciente','a.id_atencion','a.triaje','a.tipo_consulta','a.usuario','a.historia','a.id_especialista','a.tipo','a.sede','a.created_at','a.estatus','a.monto','b.nombres','b.apellidos','c.name as nameo','c.lastname as lasto','e.name as namee','e.lastname as laste','at.created_at as fecha')
        ->join('pacientes as b','b.id','a.id_paciente')
        ->join('users as c','c.id','a.usuario')
        ->join('users as e','e.id','a.id_especialista')
        ->join('atenciones as at','at.id','a.id_atencion')
        ->where('a.estatus', '=', 1)
        ->where('a.sede', '=', $request->session()->get('sede'))
        ->where('a.id_especialista', '=', Auth::user()->id)
        ->where('a.created_at', '=', date('Y-m-d'))
        ->orderBy('a.id','DESC')
        ->get(); 

      }

        return view('consultas.index', compact('consultas','f1','f2'));
        //
    }

    public function index1(Request $request)
    {

      
      if ($request->inicio) {
        $f1 = $request->inicio;
        $f2 = $request->fin;

        $consultas = DB::table('consultas as a')
        ->select('a.id','a.id_paciente','a.id_atencion','a.triaje','a.usuario','a.historia','a.tipo_consulta','a.id_especialista','a.tipo','a.sede','a.created_at','a.estatus','a.monto','b.nombres','b.apellidos','c.name as nameo','c.lastname as lasto','e.name as namee','e.lastname as laste','at.created_at as fecha')
        ->join('pacientes as b','b.id','a.id_paciente')
        ->join('users as c','c.id','a.usuario')
        ->join('users as e','e.id','a.id_especialista')
        ->join('atenciones as at','at.id','a.id_atencion')
        ->where('a.estatus', '=', 1)
        ->where('a.sede', '=', $request->session()->get('sede'))
        ->whereBetween('a.created_at', [$f1, $f2])
        ->orderBy('a.id','DESC')
        ->get(); 

      } else {

        $f1 = date('Y-m-d');
        $f2 = date('Y-m-d');

        $consultas = DB::table('consultas as a')
        ->select('a.id','a.id_paciente','a.id_atencion','a.triaje','a.tipo_consulta','a.usuario','a.historia','a.id_especialista','a.tipo','a.sede','a.created_at','a.estatus','a.monto','b.nombres','b.apellidos','c.name as nameo','c.lastname as lasto','e.name as namee','e.lastname as laste','at.created_at as fecha')
        ->join('pacientes as b','b.id','a.id_paciente')
        ->join('users as c','c.id','a.usuario')
        ->join('users as e','e.id','a.id_especialista')
        ->join('atenciones as at','at.id','a.id_atencion')
        ->where('a.estatus', '=', 1)
        ->where('a.sede', '=', $request->session()->get('sede'))
        ->where('a.created_at', '=', date('Y-m-d'))
        ->orderBy('a.id','DESC')
        ->get(); 

      }

        return view('consultas.index1', compact('consultas','f1','f2'));
        //
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $ecografias = Servicios::where('estatus','=',1)->where('tipo','=','ECOGRAFIA')->get();
        $rayos = Servicios::where('estatus','=',1)->where('tipo','=','RAYOS')->get();
        $otros = Servicios::where('estatus','=',1)->where('tipo','=','OTROS')->get();
        $analisis = Analisis::where('estatus','=',1)->get();

        if(!is_null($request->pac)){
            $paciente = Pacientes::where('dni','=',$request->pac)->first();
            $res = 'SI';
            } else {
            $paciente = Pacientes::where('dni','=','LABORATORIO')->first();
            $res = 'NO';
            }

        return view('atenciones.create', compact('ecografias','rayos','otros','analisis','paciente','res'));
    }

    public function historia_crear($id)

    {


      $cie = Ciexes::all();
      $cie1 = Ciexes::all();
      $consulta = Consultas::where('id','=',$id)->first();
      $hist = HistoriaBase::where('id_paciente','=',$consulta->id_paciente)->first();
      $historias = Historia::where('id_paciente','=',$consulta->id_paciente)->get();
      $triaje = Triaje::where('id_consulta','=',$id)->first();


      $paciente = Pacientes::where('id','=',$consulta->id_paciente)->first();

        return view('consultas.historia',compact('cie','cie1','consulta','hist','historias','paciente','triaje'));
    }

    public function historiape_crear($id)

    {

       $cie = Ciexes::all();
       $cie1 = Ciexes::all();
       $consulta = Consultas::where('id','=',$id)->first();


       $triaje = Triaje::where('id_consulta','=',$id)->first();

       $hist = HistoriaBase::where('id_paciente','=',$consulta->id_paciente)->first();
       $historias = HistoriaPediatria::where('id_paciente','=',$consulta->id_paciente)->get();

       $paciente = Pacientes::where('id','=',$consulta->id_paciente)->first();
       $edad = Carbon::parse($paciente->fechanac)->age;


        return view('consultas.historiape',compact('cie','cie1','consulta','hist','historias','paciente','edad','triaje'));
    }

    public function triaje($consulta)

    {


       $consulta = Consultas::where('id','=',$consulta)->first();
       $paciente = Pacientes::where('id','=',$consulta->id_paciente)->first();
       $edad = Carbon::parse($paciente->fechanac)->age;

        return view('consultas.triaje',compact('consulta','paciente','edad'));
    }


    public function ver_historiasp($id)
    {


        // $hist = Historia::where('id','=',$id)->first();

         $hist = DB::table('historia_pediatrica as a')
         ->select('a.*','u.name','u.lastname')
         ->join('users as u','u.id','a.usuario')
         ->where('a.id', '=',$id)
         ->first(); 


         $paciente = Pacientes::where('id','=',$hist->id_paciente)->first();
         $edad = Carbon::parse($paciente->fechanac)->age;


        return view('consultas.historiap_ver', compact('hist','paciente','edad'));


    }

    
    public function editar_historiasp($id)
    {


        // $hist = Historia::where('id','=',$id)->first();

         $hist = DB::table('historia_pediatrica as a')
         ->select('a.*','u.name','u.lastname')
         ->join('users as u','u.id','a.usuario')
         ->where('a.id', '=',$id)
         ->first(); 


         $paciente = Pacientes::where('id','=',$hist->id_paciente)->first();
         $edad = Carbon::parse($paciente->fechanac)->age;


        return view('consultas.historiap_editar', compact('hist','paciente','edad'));


    }


    public function historiam_crear($consulta)

    {


      $cie = Ciexes::all();
      $cie1 = Ciexes::all();
      $consulta = Consultas::where('id','=',$consulta)->first();
      $hist = HistoriaBase::where('id_paciente','=',$consulta->id_paciente)->first();
      $historias = HistoriaMedicina::where('id_paciente','=',$consulta->id_paciente)->get();

      $paciente = Pacientes::where('id','=',$consulta->id_paciente)->first();

        return view('consultas.historiam',compact('cie','cie1','consulta','hist','historias','paciente'));
    }

    
    public function ver_historiasm($consulta)
    {

        $historias = HistoriaMedicina::where('id','=',$consulta)->first();
        $hist = HistoriaBase::where('id_paciente','=',$historias->id_paciente)->first();
        $paciente = Pacientes::where('id','=',$historias->id_paciente)->first();

        return view('consultas.historiam_ver',compact('hist','historias','paciente'));
    }

    public function editar_historiasm($consulta)
    {

        $historias = HistoriaMedicina::where('id','=',$consulta)->first();
        $hist = HistoriaBase::where('id_paciente','=',$historias->id_paciente)->first();
        $paciente = Pacientes::where('id','=',$historias->id_paciente)->first();

        return view('consultas.historiam_editar',compact('hist','historias','paciente'));
    }

    public function historiap_ver($consulta)

    {


      $cie = Ciexes::all();
      $cie1 = Ciexes::all();
      $consulta = Consultas::where('id','=',$consulta)->first();
      $hist = HistoriaBase::where('id_paciente','=',$consulta->id_paciente)->first();
      $historias = HistoriaPediatria::where('id_paciente','=',$consulta->id_paciente)->get();

      $paciente = Pacientes::where('id','=',$consulta->id_paciente)->first();

        return view('consultas.historiap_ver',compact('cie','cie1','consulta','hist','historias','paciente'));
    }


    
    public function control_crear($consulta)

    {


      $consulta = Consultas::where('id','=',$consulta)->first();

      $ant = AntecedentesObstetricos::where('id_paciente','=',$consulta->id_paciente)->first();
      $controles = Control::where('id_paciente','=',$consulta->id_paciente)->get();

      //dd($controles);

      $paciente = Pacientes::where('id','=',$consulta->id_paciente)->first();




        return view('consultas.control',compact('consulta','ant','controles','paciente'));
    }

    public function guardar_controlh(Request $request){



      $consultaf = Consultas::where('id','=',$request->consulta)->first();




      $con = new AntecedentesObstetricos();
      $con->id_paciente =  $consultaf->id_paciente;
      $con->gestas = $request->gestas;
      $con->abortos = $request->abortos;
      $con->vaginales = $request->vavinales;
      $con->viven = $request->viven;
      $con->parto = $request->parto;
      $con->cesarea = $request->cesa;
      $con->nac_muertos = $request->nac_muertos;
      $con->ant_fam = $request->ant_fam;
      $con->ant_pers = $request->ant_per;
      $con->gest_ant = $request->term_gest;
      $con->fecha_ant = $request->fecha_gest;
      $con->tipo_aborto = $request->tipo_ab;
      $con->mayor_peso = $request->mayor_peso;
      $con->peso = $request->peso;
      $con->talla = $request->talla;
      $con->tipo_sangre = $request->tipo_sangre;
      $con->sangre = $request->grupo_sangre;
      $con->fun= $request->fun;
      $con->fpp = $request->fpp;
      $con->ecoeg = $request->ecoeg;
      $con->orina = $request->orina;
      $con->fec_orina = $request->fec_orina;
      $con->urea = $request->urea;
      $con->fec_urea = $request->fec_urea;
      $con->creatinina = $request->creatinina;
      $con->fec_creati = $request->fec_creati;
      $con->bk = $request->bk;
      $con->fec_bk = $request->fec_bk;
      $con->torch = $request->torch;
      $con->fec_torch = $request->fec_torch;
      $con->usuario = Auth::user()->id;
      $con->save();

      return back();

    }

    public function guardar_historiab(Request $request){



      $consultaf = Consultas::where('id','=',$request->consulta)->first();

      $con = new HistoriaBase();
      $con->id_paciente =  $consultaf->id_paciente;
      $con->alergias = $request->alerg;
      $con->ant_pat = $request->pat;
      $con->ant_per = $request->per;
      $con->ant_fam = $request->fam;
      $con->sex = $request->sexo;
      $con->save();

      return back();

    }

    public function guardar_historiam(Request $request){



      $consultaf = Consultas::where('id','=',$request->consulta)->first();

      $con = new HistoriaBase();
      $con->id_paciente =  $consultaf->id_paciente;
      $con->alergias = $request->alerg;
      $con->ant_pat = $request->pat;
      $con->ant_per = $request->per;
      $con->ant_fam = $request->fam;
      $con->sex = $request->sexo;
      $con->save();

      return back();

    }

    public function guardar_historiap(Request $request){



      $consultaf = Consultas::where('id','=',$request->consulta)->first();

      $con = new HistoriaBase();
      $con->id_paciente =  $consultaf->id_paciente;
      $con->alergias = $request->alerg;
      $con->ant_pat = $request->pat;
      $con->ant_per = $request->per;
      $con->ant_fam = $request->fam;
      $con->sex = $request->sexo;
      $con->save();

      return back();

    }

    public function guardar_historia(Request $request)

    {


      $consultaf = Consultas::where('id','=',$request->consulta)->first();
      $con = new Historia();
      $con->id_paciente =  $consultaf->id_paciente;
      $con->id_consulta = $consultaf->id;
      $con->id_especialista = $consultaf->id_especialista;
      $con->motivo = $request->motivo;
      $con->pa = $request->pa;
      $con->pulso = $request->pulso;
      $con->temp = $request->temp;
      $con->peso = $request->peso;
      $con->talla = $request->talla;
      $con->apetito = $request->apetito;
      $con->sed = $request->sed;
      $con->animo = $request->animo;
      $con->mic = $request->mic;
      $con->rc = $request->rc;
      $con->dep = $request->dep;
      $con->fur = $request->fur;
      $con->pap = $request->pap;
      $con->mac = $request->mac;
      $con->andria = $request->andria;
      $con->g = $request->g;
      $con->p = $request->p;
      $con->piel = $request->piel;
      $con->mamas = $request->mamas;
      $con->abdomen = $request->abdomen;
      $con->ext = $request->gen_ext;
      $con->int = $request->gen_int;
      $con->miem = $request->miem_inf;
      $con->evo = $request->evo_enf;
      $con->tipo = $request->tipo_enf;
      $con->pd = $request->pre_diag;
      $con->df = $request->diag_fin;
      $con->cie = $request->cie_pd;
      $con->cie1 = $request->cie_df;
      $con->ex_aux = $request->ex_aux;
      $con->plan = $request->plan;
      $con->obser = $request->obser;
      $con->prox = $request->prox;
      $con->usuario = Auth::user()->id;
      $con->save();

      $con_fin = Consultas::where('id','=',$request->consulta)->first();
      $con_fin->historia = 2;
      $con_fin->atendido = Auth::user()->id;
      $con_fin->save();

      $usuario = DB::table('users')
      ->select('*')
      ->where('id','=', Auth::user()->id)
      ->first();  


      $at_fin = Atenciones::where('id','=',$consultaf->id_atencion)->first();
      $at_fin->atendido = 2;
      $at_fin->atendido_por = $usuario->lastname.' '.$usuario->name;
      $at_fin->save();

      return redirect()->action('ConsultasController@index')
      ->with('success','Creado Exitosamente!');


    }

    public function storeTriaje(Request $request)

    {

  

      $t = new Triaje();
      $t->id_consulta = $request->consulta;
      $t->peso = $request->peso;
      $t->talla = $request->talla;
      $t->pa = $request->pa;
      $t->t = $request->t;
      $t->sat = $request->sat;
      $t->usuario = Auth::user()->id;
      $t->save();
    

      $con_fin = Consultas::where('id','=',$request->consulta)->first();
      $con_fin->triaje = 1;
      $con_fin->atendido = Auth::user()->id;
      $con_fin->save();

      $usuario = DB::table('users')
      ->select('*')
      ->where('id','=', Auth::user()->id)
      ->first();  

      return redirect()->action('ConsultasController@index')
      ->with('success','Creado Exitosamente!');


    }

    public function guardar_historiamm(Request $request)


    {
      $consultaf = Consultas::where('id','=',$request->consulta)->first();

      $con = new HistoriaMedicina();
      $con->id_paciente =  $consultaf->id_paciente;
      $con->id_consulta = $consultaf->id;
      $con->piel = $request->piel;
      $con->torax = $request->torax;
      $con->corazon = $request->corazon;
      $con->abdomen = $request->abdomen;
      $con->otros = $request->otros;
      $con->ex_aux = $request->ex_aux;
      $con->diag_fin = $request->diag_fin;
      $con->cie_df = $request->cie_df;
      $con->plan = $request->plan;
      $con->observaciones = $request->observaciones;
      $con->usuario = Auth::user()->id;
      $con->save();

      $con_fin = Consultas::where('id','=',$request->consulta)->first();
      $con_fin->historia = 2;
      $con_fin->atendido = Auth::user()->id;
      $con_fin->save();

      $usuario = DB::table('users')
      ->select('*')
      ->where('id','=', Auth::user()->id)
      ->first();  


      $at_fin = Atenciones::where('id','=',$consultaf->id_atencion)->first();
      $at_fin->atendido = 2;
      $at_fin->atendido_por = $usuario->lastname.' '.$usuario->name;
      $at_fin->save();

      return redirect()->action('ConsultasController@index')
      ->with('success','Creado Exitosamente!');





    }

    public function guardar_historiapp(Request $request)


    {
      $consultaf = Consultas::where('id','=',$request->consulta)->first();

      $con = new HistoriaPediatria();
      $con->id_paciente =  $consultaf->id_paciente;
      $con->id_consulta = $consultaf->id;
      $con->nombre = $request->nombre;
      $con->domicilio = $request->domicilio;
      $con->sexo = $request->sexo;
      $con->nac = $request->nac;
      $con->edad = $request->edad;
      $con->telef = $request->telef;
      $con->padres = $request->padres;
      $con->relato = $request->relato;
      $con->motivo = $request->motivo;
      $con->apetito = $request->apetito;
      $con->sed = $request->sed;
      $con->animo = $request->animo;
      $con->orina = $request->orina;
      $con->heces = $request->heces;
      $con->ram = $request->ram;
      $con->desc_ram = $request->desc_ram;
      $con->hospi = $request->hospi;
      $con->desc_hosp = $request->desc_hosp;
      $con->cir = $request->cir;
      $con->desc_cir = $request->desc_cir;
      $con->vac = $request->vac;
      $con->desc_vac = $request->desc_vac;
      $con->ant_pat = $request->ant_pat;
      $con->peso = $request->peso;
      $con->talla = $request->talla;
      $con->t	 = $request->t;
      $con->pa = $request->pa;
      $con->sat = $request->sat;
      $con->aspg = $request->aspg;
      $con->cab = $request->cab;
      $con->dig = $request->dig;
      $con->neuro = $request->neuro;
      $con->tor_resp = $request->tor_resp;
      $con->circ = $request->circ;
      $con->genito = $request->genito;
      $con->locomo = $request->locomo;
      $con->hallazg = $request->hallazg;
      $con->diag = $request->diag;
      $con->plan = $request->plan;
      $con->mat_a = $request->mat_a;
      $con->edad_a = $request->edad_a;
      $con->peso_a = $request->peso_a;
      $con->talla_a = $request->talla_a;
      $con->t_a = $request->t_a;
      $con->pa_a = $request->pa_a;
      $con->ag_a = $request->ag_a;
      $con->cab_a = $request->cab_a;
      $con->dig_a = $request->dig_a;
      $con->neuro_a = $request->neuro_a;
      $con->piell_a = $request->piell_a;
      $con->tor_resp_a = $request->tor_resp_a;
      $con->circ_a = $request->circ_a;
      $con->genito_a = $request->genito_a;
      $con->locomo_a = $request->locomo_a;
      $con->ex_aux_a = $request->ex_aux_a;
      $con->plan_a = $request->plan_a;
      $con->genito_a = $request->genito_a;
      $con->locomo_a = $request->locomo_a;
      $con->ex_aux_a = $request->ex_aux_a;
      $con->ex_aux = $request->ex_aux;
      $con->usuario = Auth::user()->id;
      $con->save();

      $con_fin = Consultas::where('id','=',$request->consulta)->first();
      $con_fin->historia = 2;
      $con_fin->atendido = Auth::user()->id;
      $con_fin->save();

      $usuario = DB::table('users')
      ->select('*')
      ->where('id','=', Auth::user()->id)
      ->first();  


      $at_fin = Atenciones::where('id','=',$consultaf->id_atencion)->first();
      $at_fin->atendido = 2;
      $at_fin->atendido_por = $usuario->lastname.' '.$usuario->name;
      $at_fin->save();

      return redirect()->action('ConsultasController@index')
      ->with('success','Creado Exitosamente!');





    }




    public function guardar_control(Request $request){

      $usuario = DB::table('users')
      ->select('*')
      ->where('id','=', Auth::user()->id)
      ->first();  




      $consultaf = Consultas::where('id','=',$request->consulta)->first();

      $con = new Control();
      $con->id_paciente =  $consultaf->id_paciente;
      $con->id_consulta = $consultaf->id;
      $con->sem = $request->sem;
      $con->peso = $request->peso;
      $con->temp = $request->temp;
      $con->ten = $request->ten;
      $con->alt = $request->alt;
      $con->pres = $request->pres;
      $con->fcf = $request->fcf;
      $con->mov = $request->mov;
      $con->edema = $request->edema;
      $con->pulso = $request->pulso;
      $con->conse = $request->conse;
      $con->sulfato = $request->sulfa;
      $con->perfil = $request->perfil;
      $con->sero = $request->sero;
      $con->fec_sero = $request->fec_sero;
      $con->gluco = $request->gluco;
      $con->fec_gluco = $request->fec_gluco;
      $con->vih= $request->vih;
      $con->fec_vih = $request->fec_vih;
      $con->anem = $request->anem;
      $con->hemo = $request->hemo;
      $con->fec_hemo = $request->fec_hemo;
      $con->piel = $request->piel;
      $con->abdomen = $request->abdomen;
      $con->mamas = $request->mamas;
      $con->gen_int = $request->gen_int;
      $con->gen_ext = $request->gen_ext;
      $con->miem = $request->miem_inf;
      $con->diag = $request->diag_pres;
      $con->ex = $request->ex_aux;
      $con->diag_def = $request->diag_def;
      $con->plan = $request->plan;
      $con->prox = $request->prox;
      $con->usuario = Auth::user()->id;
      $con->save();

      $con_fin = Consultas::where('id','=',$request->consulta)->first();
      $con_fin->historia = 1;
      $con_fin->atendido = Auth::user()->id;
      $con_fin->save();


      $at_fin = Atenciones::where('id','=',$consultaf->id_atencion)->first();
      $at_fin->atendido = 2;
      $at_fin->atendido_por = $usuario->lastname.' '.$usuario->name;
      $at_fin->save();

      return redirect()->action('ConsultasController@index')
      ->with('success','Creado Exitosamente!');

    }

  

  
 
    public function delete($id)
    {

        $searchUsuarioID = DB::table('users')
        ->select('*')
        ->where('id','=', Auth::user()->id)
        ->first();  

        $atencion = Atenciones::find($id);
        $atencion->estatus = 0;
        $atencion->eliminado_por= $searchUsuarioID->name.' '.$searchUsuarioID->lastname;
        $atencion->save();

        return redirect()->action('AtencionesController@index')
        ->with('success','Eliminado Exitosamente!');
        //
    }


    public function historias(Request $request)
    {


        if($request->id_paciente != null){
         // $historias = Historias::where('id_paciente','=',$request->id_paciente)->get();

          $historias = DB::table('historia as a')
          ->select('a.id_paciente','a.id','a.created_at','a.reevalua','a.observacion','a.usuario_reevalua','b.nombres','b.apellidos','b.dni','b.fechanac','b.telefono','b.gradoinstruccion')
          ->join('pacientes as b','b.id','a.id_paciente')
          ->where('a.id_paciente', '=',$request->id_paciente)
          ->orderBy('a.created_at','DESC')
          ->get(); 

          
          $historias_m = DB::table('historia_medicina as a')
          ->select('a.id_paciente','a.id','a.created_at','b.nombres','b.apellidos','b.dni','b.fechanac','b.telefono','b.gradoinstruccion')
          ->join('pacientes as b','b.id','a.id_paciente')
          ->where('a.id_paciente', '=',$request->id_paciente)
          ->orderBy('a.created_at','DESC')
          ->get(); 

          $historias_p = DB::table('historia_pediatrica as a')
          ->select('a.id_paciente','a.id','a.created_at','b.nombres','b.apellidos','b.dni','b.fechanac','b.telefono','b.gradoinstruccion')
          ->join('pacientes as b','b.id','a.id_paciente')
          ->where('a.id_paciente', '=',$request->id_paciente)
          ->orderBy('a.created_at','DESC')
          ->get(); 
  
        } else {
          //$historias = Historias::where('id_paciente','=',77777777777)->get();

          $historias = DB::table('historia as a')
          ->select('a.id_paciente','a.id','a.created_at','a.reevalua','a.observacion','a.usuario_reevalua','b.nombres','b.apellidos','b.dni','b.fechanac','b.telefono','b.gradoinstruccion')
          ->join('pacientes as b','b.id','a.id_paciente')
          ->where('a.id_paciente', '=',77777777777)
          ->get(); 

          
          $historias_m = DB::table('historia_medicina as a')
          ->select('a.id_paciente','a.id','a.created_at','b.nombres','b.apellidos','b.dni','b.fechanac','b.telefono','b.gradoinstruccion')
          ->join('pacientes as b','b.id','a.id_paciente')
          ->where('a.id_paciente', '=',77777777777)
          ->get(); 

          $historias_p = DB::table('historia_pediatrica as a')
          ->select('a.id_paciente','a.id','a.created_at','b.nombres','b.apellidos','b.dni','b.fechanac','b.telefono','b.gradoinstruccion')
          ->join('pacientes as b','b.id','a.id_paciente')
          ->where('a.id_paciente', '=',77777777777)
          ->get(); 
        }

        if(!is_null($request->filtro)){
        $pacientes =Pacientes::where("estatus", '=', 1)->where('apellidos','like','%'.$request->filtro.'%')->orderby('apellidos','ASC')->get();
        }else{
        $pacientes =Pacientes::where("estatus", '=', 9)->orderby('apellidos','ASC')->get();
        }




        return view('consultas.historias', compact('pacientes','historias', 'historias_m', 'historias_p'));


    }

    public function controles(Request $request)
    {


        if($request->id_paciente != null){
         // $historias = Historias::where('id_paciente','=',$request->id_paciente)->get();

          $controles = DB::table('control as a')
          ->select('a.id_paciente','a.id','a.created_at','b.nombres','b.apellidos','b.dni','b.fechanac','b.telefono','b.gradoinstruccion')
          ->join('pacientes as b','b.id','a.id_paciente')
          ->where('a.id_paciente', '=',$request->id_paciente)
          ->get(); 
  
        } else {
          //$historias = Historias::where('id_paciente','=',77777777777)->get();

          $controles = DB::table('control as a')
          ->select('a.id_paciente','a.id','a.created_at','b.nombres','b.apellidos','b.dni','b.fechanac','b.telefono','b.gradoinstruccion')
          ->join('pacientes as b','b.id','a.id_paciente')
          ->where('a.id_paciente', '=',77777777777)
          ->get(); 
        }

        if(!is_null($request->filtro)){
        $pacientes =Pacientes::where("estatus", '=', 1)->where('apellidos','like','%'.$request->filtro.'%')->orderby('apellidos','ASC')->get();
        }else{
        $pacientes =Pacientes::where("estatus", '=', 9)->orderby('apellidos','ASC')->get();
        }




        return view('consultas.controles', compact('pacientes','controles'));


    }

    public function ver_historias($id)
    {


        // $hist = Historia::where('id','=',$id)->first();

         $hist = DB::table('historia as a')
         ->select('a.*','u.name','u.lastname')
         ->join('users as u','u.id','a.usuario')
         ->where('a.id', '=',$id)
         ->first(); 



         $historias_base = HistoriaBase::where('id_paciente','=',$hist->id_paciente)->first();

         $paciente = Pacientes::where('id','=',$hist->id_paciente)->first();

        return view('consultas.historias_ver', compact('hist','historias_base','paciente'));


    }

    
    public function editar_historias($id)
    {


        // $hist = Historia::where('id','=',$id)->first();

         $hist = DB::table('historia as a')
         ->select('a.*','u.name','u.lastname')
         ->join('users as u','u.id','a.usuario')
         ->where('a.id', '=',$id)
         ->first(); 



         $historias_base = HistoriaBase::where('id_paciente','=',$hist->id_paciente)->first();

         $paciente = Pacientes::where('id','=',$hist->id_paciente)->first();

        return view('consultas.historias_editar', compact('hist','historias_base','paciente'));


    }

    public function ver_controles($id)
    {


        // $cont = Control::where('id','=',$id)->first();

         $cont = DB::table('control as a')
         ->select('a.*','u.name','u.lastname')
         ->join('users as u','u.id','a.usuario')
         ->where('a.id', '=',$id)
         ->first(); 

         $ant = AntecedentesObstetricos::where('id_paciente','=',$cont->id_paciente)->first();

         $paciente = Pacientes::where('id','=',$cont->id_paciente)->first();

        return view('consultas.controles_ver', compact('ant','cont','paciente'));


    }

    
    public function reevaluar($id)
    {


   

        return view('consultas.reevaluar', compact('id'));


    }

    public function ver_historias_pdf($id)
    {


        // $hist = Historia::where('id','=',$id)->first();

         $hist = DB::table('historia as a')
         ->select('a.*','u.name','u.lastname')
         ->join('users as u','u.id','a.usuario')
         ->where('a.id', '=',$id)
         ->first(); 



         $historias_base = HistoriaBase::where('id_paciente','=',$hist->id_paciente)->first();

         $paciente = Pacientes::where('id','=',$hist->id_paciente)->first();

         $edad = Carbon::parse($paciente->fechanac)->age;


             
          $view = \View::make('consultas.historia-pdf', compact('hist','historias_base','paciente','edad'));

          $pdf = \App::make('dompdf.wrapper');
          $pdf->loadHTML($view);
   
     
      return $pdf->stream('report-pdf'.'.pdf');




    }

    public function reevaluarPost(Request $request)
    {

        $searchUsuarioID = DB::table('users')
        ->select('*')
        ->where('id','=', Auth::user()->id)
        ->first();  

        $atencion = Historia::find($request->id);
        $atencion->reevalua = 2;
        $atencion->observacion = $request->observacion;
        $atencion->usuario_reevalua= $searchUsuarioID->lastname.' '.$searchUsuarioID->name;
        $atencion->save();

        return back();


    }

    public function updateHistoria(Request $request)
    {

      $con = Historia::find($request->id);
      $con->motivo = $request->motivo;
      $con->pa = $request->pa;
      $con->pulso = $request->pulso;
      $con->temp = $request->temp;
      $con->peso = $request->peso;
      $con->talla = $request->talla;
      $con->apetito = $request->apetito;
      $con->sed = $request->sed;
      $con->animo = $request->animo;
      $con->mic = $request->mic;
      $con->rc = $request->rc;
      $con->dep = $request->dep;
      $con->fur = $request->fur;
      $con->pap = $request->pap;
      $con->mac = $request->mac;
      $con->andria = $request->andria;
      $con->g = $request->g;
      $con->p = $request->p;
      $con->piel = $request->piel;
      $con->mamas = $request->mamas;
      $con->abdomen = $request->abdomen;
      $con->ext = $request->ext;
      $con->int = $request->int;
      $con->miem = $request->miem;
      $con->evo = $request->evo;
      $con->tipo = $request->tipo;
      $con->pd = $request->pre_diag;
      $con->df = $request->diag_fin;
      $con->cie = $request->cie;
      $con->cie1 = $request->cie1;
      $con->ex_aux = $request->ex_aux;
      $con->plan = $request->plan;
      $con->obser = $request->obser;
      $con->prox = $request->prox;
      $res = $con->update();

    return redirect()->action('ConsultasController@historias')
      ->with('success','Modificado Exitosamente!');

    }


    public function updateHistoriap(Request $request)
    {

      $con = HistoriaPediatria::find($request->id);
      $con->motivo = $request->motivo;
      $con->apetito = $request->apetito;
      $con->sed = $request->sed;
      $con->animo = $request->animo;
      $con->orina = $request->orina;
      $con->heces = $request->heces;
      $con->ram = $request->ram;
      $con->desc_ram = $request->desc_ram;
      $con->hospi = $request->hospi;
      $con->desc_hosp = $request->desc_hosp;
      $con->cir = $request->cir;
      $con->desc_cir = $request->desc_cir;
      $con->vac = $request->vac;
      $con->desc_vac = $request->desc_vac;
      $con->ant_pat = $request->ant_pat;
      $con->peso = $request->peso;
      $con->talla = $request->talla;
      $con->t	 = $request->t;
      $con->pa = $request->pa;
      $con->sat = $request->sat;
      $con->aspg = $request->aspg;
      $con->cab = $request->cab;
      $con->dig = $request->dig;
      $con->neuro = $request->neuro;
      $con->tor_resp = $request->tor_resp;
      $con->circ = $request->circ;
      $con->genito = $request->genito;
      $con->locomo = $request->locomo;
      $con->hallazg = $request->hallazg;
      $con->diag = $request->diag;
      $con->plan = $request->plan;
    
      $con->ex_aux = $request->ex_aux;
      $res = $con->update();

    return redirect()->action('ConsultasController@historias')
      ->with('success','Modificado Exitosamente!');

    }

    public function updateHistoriam(Request $request)
    {

      $con = HistoriaMedicina::find($request->id);
      $con->piel = $request->piel;
      $con->torax = $request->torax;
      $con->corazon = $request->corazon;
      $con->abdomen = $request->abdomen;
      $con->otros = $request->otros;
      $con->ex_aux = $request->ex_aux;
      $con->diag_fin = $request->diag_fin;
      $con->cie_df = $request->cie_df;
      $con->plan = $request->plan;
      $con->observaciones = $request->observaciones;
      $res = $con->update();

    return redirect()->action('ConsultasController@historias')
      ->with('success','Modificado Exitosamente!');

    }





}

