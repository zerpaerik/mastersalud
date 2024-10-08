<?php

namespace App\Http\Controllers;
use App\Equipos;
use App\Analisis;
use App\Clientes;
use App\Tiempo;
use App\Paquetes;
use App\Pacientes;
use App\Servicios;
use App\PlacasUsadas;
use App\PlacasMalogradas;
use App\User;
use App\Atenciones;
use App\AtencionesArchivo;
use App\Atec;
use App\Consultas;
use App\Metodos;
use App\MetoPro;
use App\Comisiones;
use App\Cobrar;
use App\HistorialCobros;
use App\LaboratoriosCheck;
use App\Creditos;
use App\CreditosB;
use App\Sesiones;
use App\ResultadosServicios;
use App\ResultadosLaboratorio;
use App\TipoConsultas;

use Auth;
use Illuminate\Http\Request;
use DB;


class AtencionesController extends Controller
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

      

        $serv = DB::table('atenciones as a')
        ->select('a.id','a.tipo_origen','a.id_origen','a.abono1','a.abono2','a.tipo_pago1','a.observaciones','a.eliminado_por','a.id_atec','a.id_tipo','a.pagado','a.atendido','a.sede','a.usuario','a.created_at','a.estatus','a.id_paciente','a.tipo_atencion','a.monto','a.abono','a.tipo_pago','b.nombres','b.apellidos','b.dni','c.name as nameo','c.lastname as lasto','d.name as nameu','d.lastname as lastu','s.nombre as detalle')
        ->join('pacientes as b','b.id','a.id_paciente')
        ->join('users as c','c.id','a.id_origen')
        ->join('users as d','d.id','a.usuario')
        ->join('servicios as s','s.id','a.id_tipo')
        ->where('a.tipo_atencion', '=', 1)
        ->where('a.monto', '!=', '0')
        ->whereBetween('a.created_at', [date('Y-m-d 00:00:00', strtotime($f1)), date('Y-m-d 23:59:59', strtotime($f1))])
        ->orderBy('a.id','DESC')
        ->where('a.sede', '=', $request->session()->get('sede'));
       // ->get(); 

        $eco = DB::table('atenciones as a')
        ->select('a.id','a.tipo_origen','a.id_origen','a.abono1','a.abono2','a.tipo_pago1','a.observaciones', 'a.eliminado_por','a.id_atec','a.id_tipo','a.pagado','a.atendido','a.sede','a.usuario','a.created_at','a.estatus','a.id_paciente','a.tipo_atencion','a.monto','a.abono','a.tipo_pago','b.nombres','b.apellidos','b.dni','c.name as nameo','c.lastname as lasto','d.name as nameu','d.lastname as lastu','s.nombre as detalle')
        ->join('pacientes as b','b.id','a.id_paciente')
        ->join('users as c','c.id','a.id_origen')
        ->join('users as d','d.id','a.usuario')
        ->join('servicios as s','s.id','a.id_tipo')
        ->where('a.tipo_atencion', '=', 2)
        ->where('a.monto', '!=', '0')
        ->whereBetween('a.created_at', [date('Y-m-d 00:00:00', strtotime($f1)), date('Y-m-d 23:59:59', strtotime($f1))])
        ->orderBy('a.id','DESC')
        ->where('a.sede', '=', $request->session()->get('sede'));

        $cons = DB::table('atenciones as a')
        ->select('a.id','a.tipo_origen','a.id_origen','a.abono1','a.abono2','a.tipo_pago1','a.observaciones','a.eliminado_por','a.id_atec','a.id_tipo','a.pagado','a.atendido','a.sede','a.usuario','a.created_at','a.estatus','a.id_paciente','a.tipo_atencion','a.monto','a.abono','a.tipo_pago','b.nombres','b.apellidos','b.dni','c.name as nameo','c.lastname as lasto','d.name as nameu','d.lastname as lastu','s.nombre as detalle')
        ->join('pacientes as b','b.id','a.id_paciente')
        ->join('users as c','c.id','a.id_origen')
        ->join('users as d','d.id','a.usuario')
        ->join('servicios as s','s.id','a.id_tipo')
        ->where('a.tipo_atencion', '=', 5)
        ->where('a.monto', '!=', '0')
        ->whereBetween('a.created_at', [date('Y-m-d 00:00:00', strtotime($f1)), date('Y-m-d 23:59:59', strtotime($f1))])
        ->orderBy('a.id','DESC')
        ->where('a.sede', '=', $request->session()->get('sede'));

        $meto = DB::table('atenciones as a')
        ->select('a.id','a.tipo_origen','a.id_origen','a.abono1','a.abono2','a.tipo_pago1','a.observaciones','a.eliminado_por','a.id_atec','a.id_tipo','a.pagado','a.atendido','a.sede','a.usuario','a.created_at','a.estatus','a.id_paciente','a.tipo_atencion','a.monto','a.abono','a.tipo_pago','b.nombres','b.apellidos','b.dni','c.name as nameo','c.lastname as lasto','d.name as nameu','d.lastname as lastu','s.nombre as detalle')
        ->join('pacientes as b','b.id','a.id_paciente')
        ->join('users as c','c.id','a.id_origen')
        ->join('users as d','d.id','a.usuario')
        ->join('servicios as s','s.id','a.id_tipo')
        ->where('a.tipo_atencion', '=', 6)
        ->where('a.monto', '!=', '0')
        ->whereBetween('a.created_at', [date('Y-m-d 00:00:00', strtotime($f1)), date('Y-m-d 23:59:59', strtotime($f1))])
        ->orderBy('a.id','DESC')
        ->where('a.sede', '=', $request->session()->get('sede'));

        $salud = DB::table('atenciones as a')
        ->select('a.id','a.tipo_origen','a.id_origen','a.abono1','a.abono2','a.tipo_pago1','a.observaciones','a.eliminado_por','a.id_atec','a.id_tipo','a.pagado','a.atendido','a.sede','a.usuario','a.created_at','a.estatus','a.id_paciente','a.tipo_atencion','a.monto','a.abono','a.tipo_pago','b.nombres','b.apellidos','b.dni','c.name as nameo','c.lastname as lasto','d.name as nameu','d.lastname as lastu','s.nombre as detalle')
        ->join('pacientes as b','b.id','a.id_paciente')
        ->join('users as c','c.id','a.id_origen')
        ->join('users as d','d.id','a.usuario')
        ->join('servicios as s','s.id','a.id_tipo')
        ->where('a.tipo_atencion', '=', 8)
        ->where('a.monto', '!=', '0')
        ->whereBetween('a.created_at', [date('Y-m-d 00:00:00', strtotime($f1)), date('Y-m-d 23:59:59', strtotime($f1))])
        ->orderBy('a.id','DESC')
        ->where('a.sede', '=', $request->session()->get('sede'));

        $ana = DB::table('atenciones as a')
        ->select('a.id','a.tipo_origen','a.id_origen','a.abono1','a.abono2','a.tipo_pago1','a.observaciones','a.eliminado_por','a.id_atec','a.id_tipo','a.pagado','a.atendido','a.sede','a.usuario','a.created_at','a.estatus','a.id_paciente','a.tipo_atencion','a.monto','a.abono','a.tipo_pago','b.nombres','b.apellidos','b.dni','c.name as nameo','c.lastname as lasto','d.name as nameu','d.lastname as lastu','s.nombre as detalle')
        ->join('pacientes as b','b.id','a.id_paciente')
        ->join('users as c','c.id','a.id_origen')
        ->join('users as d','d.id','a.usuario')
        ->join('analisis as s','s.id','a.id_tipo')
        ->where('a.tipo_atencion', '=', 4)
        ->where('a.monto', '!=', '0')
        ->whereBetween('a.created_at', [date('Y-m-d 00:00:00', strtotime($f1)), date('Y-m-d 23:59:59', strtotime($f1))])
        ->orderBy('a.id','DESC')
        ->where('a.sede', '=', $request->session()->get('sede'));

        $paq = DB::table('atenciones as a')
        ->select('a.id','a.tipo_origen','a.id_origen','a.abono1','a.abono2','a.tipo_pago1','a.observaciones','a.eliminado_por','a.id_atec','a.id_tipo','a.pagado','a.atendido','a.sede','a.usuario','a.created_at','a.estatus','a.id_paciente','a.tipo_atencion','a.monto','a.abono','a.tipo_pago','b.nombres','b.apellidos','b.dni','c.name as nameo','c.lastname as lasto','d.name as nameu','d.lastname as lastu','s.nombre as detalle')
        ->join('pacientes as b','b.id','a.id_paciente')
        ->join('users as c','c.id','a.id_origen')
        ->join('users as d','d.id','a.usuario')
        ->join('paquetes as s','s.id','a.id_tipo')
        ->where('a.tipo_atencion', '=', 7)
        ->where('a.monto', '!=', '0')
        ->whereBetween('a.created_at', [date('Y-m-d 00:00:00', strtotime($f1)), date('Y-m-d 23:59:59', strtotime($f1))])
        ->orderBy('a.id','DESC')
        ->where('a.sede', '=', $request->session()->get('sede'));


        $metodos = DB::table('atenciones as a')
        ->select('a.id','a.tipo_origen','a.id_origen','a.abono1','a.abono2','a.tipo_pago1','a.observaciones','a.eliminado_por','a.id_atec','a.id_tipo','a.pagado','a.atendido','a.sede','a.usuario','a.created_at','a.estatus','a.id_paciente','a.tipo_atencion','a.monto','a.abono','a.tipo_pago','b.nombres','b.apellidos','b.dni','c.name as nameo','c.lastname as lasto','d.name as nameu','d.lastname as lastu','s.nombre as detalle')
        ->join('pacientes as b','b.id','a.id_paciente')
        ->join('users as c','c.id','a.id_origen')
        ->join('users as d','d.id','a.usuario')
        ->join('meto_pro as s','s.id','a.id_tipo')
        ->where('a.tipo_atencion', '=', 6)
        ->where('a.monto', '!=', '0')
        ->whereBetween('a.created_at', [date('Y-m-d 00:00:00', strtotime($f1)), date('Y-m-d 23:59:59', strtotime($f1))])
        ->orderBy('a.id','DESC')
        ->where('a.sede', '=', $request->session()->get('sede'));

        $consultas = DB::table('atenciones as a')
        ->select('a.id','a.tipo_origen','a.id_origen','a.abono1','a.abono2','a.tipo_pago1','a.observaciones','a.eliminado_por','a.id_atec','a.id_tipo','a.pagado','a.atendido','a.sede','a.usuario','a.created_at','a.estatus','a.id_paciente','a.tipo_atencion','a.monto','a.abono','a.tipo_pago','b.nombres','b.apellidos','b.dni','c.name as nameo','c.lastname as lasto','d.name as nameu','d.lastname as lastu','s.nombre as detalle')
        ->join('pacientes as b','b.id','a.id_paciente')
        ->join('users as c','c.id','a.id_origen')
        ->join('users as d','d.id','a.usuario')
        ->join('tipo_con as s','s.id','a.id_tipo')
        ->where('a.tipo_atencion', '=', 5)
        ->where('a.monto', '!=', '0')
        ->whereBetween('a.created_at', [date('Y-m-d 00:00:00', strtotime($f1)), date('Y-m-d 23:59:59', strtotime($f1))])
        ->orderBy('a.id','DESC')
        ->where('a.sede', '=', $request->session()->get('sede'));
        //->get(); 

     

        $atenciones = DB::table('atenciones as a')
        ->select('a.id','a.tipo_origen','a.id_origen','a.abono1','a.abono2','a.tipo_pago1','a.observaciones','a.eliminado_por','a.id_atec','a.id_tipo','a.pagado','a.atendido','a.sede','a.usuario','a.created_at','a.estatus','a.id_paciente','a.tipo_atencion','a.monto','a.abono','a.tipo_pago','b.nombres','b.apellidos','b.dni','c.name as nameo','c.lastname as lasto','d.name as nameu','d.lastname as lastu','s.nombre as detalle')
        ->join('pacientes as b','b.id','a.id_paciente')
        ->join('users as c','c.id','a.id_origen')
        ->join('users as d','d.id','a.usuario')
        ->join('servicios as s','s.id','a.id_tipo')
        ->where('a.tipo_atencion', '=', 3)
        ->where('a.monto', '!=', '0')
        ->where('a.sede', '=', $request->session()->get('sede'))
        ->whereBetween('a.created_at', [date('Y-m-d 00:00:00', strtotime($f1)), date('Y-m-d 23:59:59', strtotime($f1))])
        ->orderBy('a.id','DESC')
        ->union($serv)
        ->union($eco)
        ->union($ana)
        ->union($metodos)
        ->union($salud)
        ->union($paq)
        ->union($consultas)
        ->get(); 



      } else {

        $f1 = date('Y-m-d');

        $serv = DB::table('atenciones as a')
        ->select('a.id','a.tipo_origen','a.id_origen','a.abono1','a.abono2','a.tipo_pago1','a.observaciones','a.eliminado_por','a.id_atec','a.id_tipo','a.pagado','a.atendido','a.sede','a.usuario','a.created_at','a.estatus','a.id_paciente','a.tipo_atencion','a.monto','a.abono','a.tipo_pago','b.nombres','b.apellidos','b.dni','c.name as nameo','c.lastname as lasto','d.name as nameu','d.lastname as lastu','s.nombre as detalle')
        ->join('pacientes as b','b.id','a.id_paciente')
        ->join('users as c','c.id','a.id_origen')
        ->join('users as d','d.id','a.usuario')
        ->join('servicios as s','s.id','a.id_tipo')
        ->where('a.tipo_atencion', '=', 1)
        ->where('a.monto', '!=', '0')
        ->whereBetween('a.created_at', [date('Y-m-d 00:00:00', strtotime($f1)), date('Y-m-d 23:59:59', strtotime($f1))])
        ->where('a.sede', '=', $request->session()->get('sede'))
        ->orderBy('a.id','desc');

     

        $eco = DB::table('atenciones as a')
        ->select('a.id','a.tipo_origen','a.id_origen','a.abono1','a.abono2','a.tipo_pago1','a.observaciones','a.eliminado_por','a.id_atec','a.id_tipo','a.pagado','a.atendido','a.sede','a.usuario','a.created_at','a.estatus','a.id_paciente','a.tipo_atencion','a.monto','a.abono','a.tipo_pago','b.nombres','b.apellidos','b.dni','c.name as nameo','c.lastname as lasto','d.name as nameu','d.lastname as lastu','s.nombre as detalle')
        ->join('pacientes as b','b.id','a.id_paciente')
        ->join('users as c','c.id','a.id_origen')
        ->join('users as d','d.id','a.usuario')
        ->join('servicios as s','s.id','a.id_tipo')
        ->where('a.tipo_atencion', '=', 2)
        ->where('a.monto', '!=', '0')
        ->whereBetween('a.created_at', [date('Y-m-d 00:00:00', strtotime($f1)), date('Y-m-d 23:59:59', strtotime($f1))])
        ->where('a.sede', '=', $request->session()->get('sede'))
        ->orderBy('a.id','desc');


        $cons = DB::table('atenciones as a')
        ->select('a.id','a.tipo_origen','a.id_origen','a.abono1','a.abono2','a.tipo_pago1','a.observaciones','a.eliminado_por','a.id_atec','a.id_tipo','a.pagado','a.atendido','a.sede','a.usuario','a.created_at','a.estatus','a.id_paciente','a.tipo_atencion','a.monto','a.abono','a.tipo_pago','b.nombres','b.apellidos','b.dni','c.name as nameo','c.lastname as lasto','d.name as nameu','d.lastname as lastu','s.nombre as detalle')
        ->join('pacientes as b','b.id','a.id_paciente')
        ->join('users as c','c.id','a.id_origen')
        ->join('users as d','d.id','a.usuario')
        ->join('servicios as s','s.id','a.id_tipo')
        ->where('a.tipo_atencion', '=', 5)
        ->where('a.monto', '!=', '0')
        ->whereBetween('a.created_at', [date('Y-m-d 00:00:00', strtotime($f1)), date('Y-m-d 23:59:59', strtotime($f1))])
        ->where('a.sede', '=', $request->session()->get('sede'))
        ->orderBy('a.id','desc');


        $meto = DB::table('atenciones as a')
        ->select('a.id','a.tipo_origen','a.id_origen','a.abono1','a.abono2','a.tipo_pago1','a.observaciones','a.eliminado_por','a.id_atec','a.id_tipo','a.pagado','a.atendido','a.sede','a.usuario','a.created_at','a.estatus','a.id_paciente','a.tipo_atencion','a.monto','a.abono','a.tipo_pago','b.nombres','b.apellidos','b.dni','c.name as nameo','c.lastname as lasto','d.name as nameu','d.lastname as lastu','s.nombre as detalle')
        ->join('pacientes as b','b.id','a.id_paciente')
        ->join('users as c','c.id','a.id_origen')
        ->join('users as d','d.id','a.usuario')
        ->join('servicios as s','s.id','a.id_tipo')
        ->where('a.tipo_atencion', '=', 6)
        ->where('a.monto', '!=', '0')
        ->whereBetween('a.created_at', [date('Y-m-d 00:00:00', strtotime($f1)), date('Y-m-d 23:59:59', strtotime($f1))])
        ->where('a.sede', '=', $request->session()->get('sede'))   
        ->orderBy('a.id','desc');

        $salud = DB::table('atenciones as a')
        ->select('a.id','a.tipo_origen','a.id_origen','a.abono1','a.abono2','a.tipo_pago1','a.observaciones','a.eliminado_por','a.id_atec','a.id_tipo','a.pagado','a.atendido','a.sede','a.usuario','a.created_at','a.estatus','a.id_paciente','a.tipo_atencion','a.monto','a.abono','a.tipo_pago','b.nombres','b.apellidos','b.dni','c.name as nameo','c.lastname as lasto','d.name as nameu','d.lastname as lastu','s.nombre as detalle')
        ->join('pacientes as b','b.id','a.id_paciente')
        ->join('users as c','c.id','a.id_origen')
        ->join('users as d','d.id','a.usuario')
        ->join('servicios as s','s.id','a.id_tipo')
        ->where('a.tipo_atencion', '=', 8)
        ->where('a.monto', '!=', '0')
        ->whereBetween('a.created_at', [date('Y-m-d 00:00:00', strtotime($f1)), date('Y-m-d 23:59:59', strtotime($f1))])
        ->where('a.sede', '=', $request->session()->get('sede'))   
        ->orderBy('a.id','desc');


        $ana = DB::table('atenciones as a')
        ->select('a.id','a.tipo_origen','a.id_origen','a.abono1','a.abono2','a.tipo_pago1','a.observaciones','a.eliminado_por','a.id_atec','a.id_tipo','a.pagado','a.atendido','a.sede','a.usuario','a.created_at','a.estatus','a.id_paciente','a.tipo_atencion','a.monto','a.abono','a.tipo_pago','b.nombres','b.apellidos','b.dni','c.name as nameo','c.lastname as lasto','d.name as nameu','d.lastname as lastu','s.nombre as detalle')
        ->join('pacientes as b','b.id','a.id_paciente')
        ->join('users as c','c.id','a.id_origen')
        ->join('users as d','d.id','a.usuario')
        ->join('analisis as s','s.id','a.id_tipo')
        ->where('a.tipo_atencion', '=', 4)
        ->where('a.monto', '!=', '0')
        ->whereBetween('a.created_at', [date('Y-m-d 00:00:00', strtotime($f1)), date('Y-m-d 23:59:59', strtotime($f1))])
        ->where('a.sede', '=', $request->session()->get('sede'))
        ->orderBy('a.id','desc');


        $paq = DB::table('atenciones as a')
        ->select('a.id','a.tipo_origen','a.id_origen','a.abono1','a.abono2','a.tipo_pago1','a.observaciones','a.eliminado_por','a.id_atec','a.id_tipo','a.pagado','a.atendido','a.sede','a.usuario','a.created_at','a.estatus','a.id_paciente','a.tipo_atencion','a.monto','a.abono','a.tipo_pago','b.nombres','b.apellidos','b.dni','c.name as nameo','c.lastname as lasto','d.name as nameu','d.lastname as lastu','s.nombre as detalle')
        ->join('pacientes as b','b.id','a.id_paciente')
        ->join('users as c','c.id','a.id_origen')
        ->join('users as d','d.id','a.usuario')
        ->join('paquetes as s','s.id','a.id_tipo')
        ->where('a.tipo_atencion', '=', 7)
        ->where('a.monto', '!=', '0')
        ->where('a.sede', '=', $request->session()->get('sede'))
        ->whereBetween('a.created_at', [date('Y-m-d 00:00:00', strtotime($f1)), date('Y-m-d 23:59:59', strtotime($f1))])
        ->orderBy('a.id','desc');

        $metodos = DB::table('atenciones as a')
        ->select('a.id','a.tipo_origen','a.id_origen','a.abono1','a.abono2','a.tipo_pago1','a.observaciones','a.eliminado_por','a.id_atec','a.id_tipo','a.pagado','a.atendido','a.sede','a.usuario','a.created_at','a.estatus','a.id_paciente','a.tipo_atencion','a.monto','a.abono','a.tipo_pago','b.nombres','b.apellidos','b.dni','c.name as nameo','c.lastname as lasto','d.name as nameu','d.lastname as lastu','s.nombre as detalle')
        ->join('pacientes as b','b.id','a.id_paciente')
        ->join('users as c','c.id','a.id_origen')
        ->join('users as d','d.id','a.usuario')
        ->join('meto_pro as s','s.id','a.id_tipo')
        ->where('a.tipo_atencion', '=', 6)
        ->where('a.monto', '!=', '0')
        ->whereBetween('a.created_at', [date('Y-m-d 00:00:00', strtotime($f1)), date('Y-m-d 23:59:59', strtotime($f1))])
        ->where('a.sede', '=', $request->session()->get('sede'))
        ->orderBy('a.id','desc');

        
        $consultas = DB::table('atenciones as a')
        ->select('a.id','a.tipo_origen','a.id_origen','a.abono1','a.abono2','a.tipo_pago1','a.observaciones','a.eliminado_por','a.id_atec','a.id_tipo','a.pagado','a.atendido','a.sede','a.usuario','a.created_at','a.estatus','a.id_paciente','a.tipo_atencion','a.monto','a.abono','a.tipo_pago','b.nombres','b.apellidos','b.dni','c.name as nameo','c.lastname as lasto','d.name as nameu','d.lastname as lastu','s.nombre as detalle')
        ->join('pacientes as b','b.id','a.id_paciente')
        ->join('users as c','c.id','a.id_origen')
        ->join('users as d','d.id','a.usuario')
        ->join('tipo_con as s','s.id','a.id_tipo')
        ->where('a.tipo_atencion', '=', 5)
        ->where('a.monto', '!=', '0')
        ->whereBetween('a.created_at', [date('Y-m-d 00:00:00', strtotime($f1)), date('Y-m-d 23:59:59', strtotime($f1))])
        ->where('a.sede', '=', $request->session()->get('sede'))
        ->orderBy('a.id','desc');

        //->get(); 


     

        $atenciones = DB::table('atenciones as a')
        ->select('a.id','a.tipo_origen','a.id_origen','a.abono1','a.abono2','a.tipo_pago1','a.observaciones','a.eliminado_por','a.id_atec','a.id_tipo','a.pagado','a.atendido','a.sede','a.usuario','a.created_at','a.estatus','a.id_paciente','a.tipo_atencion','a.monto','a.abono','a.tipo_pago','b.nombres','b.apellidos','b.dni','c.name as nameo','c.lastname as lasto','d.name as nameu','d.lastname as lastu','s.nombre as detalle')
        ->join('pacientes as b','b.id','a.id_paciente')
        ->join('users as c','c.id','a.id_origen')
        ->join('users as d','d.id','a.usuario')
        ->join('servicios as s','s.id','a.id_tipo')
        ->where('a.tipo_atencion', '=', 3)
        ->where('a.monto', '!=', '0')
        ->where('a.sede', '=', $request->session()->get('sede'))
        ->whereBetween('a.created_at', [date('Y-m-d 00:00:00', strtotime($f1)), date('Y-m-d 23:59:59', strtotime($f1))])
        ->union($serv)
        ->union($eco)
        ->union($ana)
        ->union($metodos)
        ->union($salud)
        ->union($consultas)
        ->union($paq)
        ->orderBy('id','desc')
        ->get(); 



 





      }

        
        

        return view('atenciones.index', compact('atenciones','f1'));
        //
    }

    public function ticket(Request $request,$id){

      $serv = DB::table('atenciones as a')
      ->select('a.id','a.tipo_origen','a.id_origen','a.id_atec','a.id_tipo','a.pagado','a.atendido','a.sede','a.usuario','a.created_at','a.estatus','a.id_paciente','a.tipo_atencion','a.monto','a.abono','a.tipo_pago','b.nombres','b.apellidos','b.dni','c.name as nameo','c.lastname as lasto','d.name as nameu','d.lastname as lastu','s.nombre as detalle')
      ->join('pacientes as b','b.id','a.id_paciente')
      ->join('users as c','c.id','a.id_origen')
      ->join('users as d','d.id','a.usuario')
      ->join('servicios as s','s.id','a.id_tipo')
      ->where('a.estatus', '=', 1)
      ->where('a.tipo_atencion', '=', 1)
      ->where('a.id_atec', '=', $id)
      ->orderBy('a.id','desc');

   

      $eco = DB::table('atenciones as a')
      ->select('a.id','a.tipo_origen','a.id_origen','a.id_atec','a.id_tipo','a.pagado','a.atendido','a.sede','a.usuario','a.created_at','a.estatus','a.id_paciente','a.tipo_atencion','a.monto','a.abono','a.tipo_pago','b.nombres','b.apellidos','b.dni','c.name as nameo','c.lastname as lasto','d.name as nameu','d.lastname as lastu','s.nombre as detalle')
      ->join('pacientes as b','b.id','a.id_paciente')
      ->join('users as c','c.id','a.id_origen')
      ->join('users as d','d.id','a.usuario')
      ->join('servicios as s','s.id','a.id_tipo')
      ->where('a.estatus', '=', 1)
      ->where('a.tipo_atencion', '=', 2)
      ->where('a.id_atec', '=', $id)
      ->orderBy('a.id','desc');


      $cons = DB::table('atenciones as a')
      ->select('a.id','a.tipo_origen','a.id_origen','a.id_atec','a.id_tipo','a.pagado','a.atendido','a.sede','a.usuario','a.created_at','a.estatus','a.id_paciente','a.tipo_atencion','a.monto','a.abono','a.tipo_pago','b.nombres','b.apellidos','b.dni','c.name as nameo','c.lastname as lasto','d.name as nameu','d.lastname as lastu','s.nombre as detalle')
      ->join('pacientes as b','b.id','a.id_paciente')
      ->join('users as c','c.id','a.id_origen')
      ->join('users as d','d.id','a.usuario')
      ->join('servicios as s','s.id','a.id_tipo')
      ->where('a.estatus', '=', 1)
      ->where('a.tipo_atencion', '=', 5)
      ->where('a.id_atec', '=', $id)
      ->orderBy('a.id','desc');

      $rayos = DB::table('atenciones as a')
      ->select('a.id','a.tipo_origen','a.id_origen','a.id_atec','a.id_tipo','a.pagado','a.atendido','a.sede','a.usuario','a.created_at','a.estatus','a.id_paciente','a.tipo_atencion','a.monto','a.abono','a.tipo_pago','b.nombres','b.apellidos','b.dni','c.name as nameo','c.lastname as lasto','d.name as nameu','d.lastname as lastu','s.nombre as detalle')
      ->join('pacientes as b','b.id','a.id_paciente')
      ->join('users as c','c.id','a.id_origen')
      ->join('users as d','d.id','a.usuario')
      ->join('servicios as s','s.id','a.id_tipo')
      ->where('a.estatus', '=', 1)
      ->where('a.tipo_atencion', '=', 3)
      ->where('a.id_atec', '=', $id)
      ->orderBy('a.id','desc');


      $meto = DB::table('atenciones as a')
      ->select('a.id','a.tipo_origen','a.id_origen','a.id_atec','a.id_tipo','a.pagado','a.atendido','a.sede','a.usuario','a.created_at','a.estatus','a.id_paciente','a.tipo_atencion','a.monto','a.abono','a.tipo_pago','b.nombres','b.apellidos','b.dni','c.name as nameo','c.lastname as lasto','d.name as nameu','d.lastname as lastu','s.nombre as detalle')
      ->join('pacientes as b','b.id','a.id_paciente')
      ->join('users as c','c.id','a.id_origen')
      ->join('users as d','d.id','a.usuario')
      ->join('servicios as s','s.id','a.id_tipo')
      ->where('a.estatus', '=', 1)
      ->where('a.tipo_atencion', '=', 6)
      ->where('a.id_atec', '=', $id)
      ->orderBy('a.id','desc');

      
      $salud = DB::table('atenciones as a')
      ->select('a.id','a.tipo_origen','a.id_origen','a.id_atec','a.id_tipo','a.pagado','a.atendido','a.sede','a.usuario','a.created_at','a.estatus','a.id_paciente','a.tipo_atencion','a.monto','a.abono','a.tipo_pago','b.nombres','b.apellidos','b.dni','c.name as nameo','c.lastname as lasto','d.name as nameu','d.lastname as lastu','s.nombre as detalle')
      ->join('pacientes as b','b.id','a.id_paciente')
      ->join('users as c','c.id','a.id_origen')
      ->join('users as d','d.id','a.usuario')
      ->join('servicios as s','s.id','a.id_tipo')
      ->where('a.estatus', '=', 1)
      ->where('a.tipo_atencion', '=', 8)
      ->where('a.id_atec', '=', $id)
      ->orderBy('a.id','desc');


      $ana = DB::table('atenciones as a')
      ->select('a.id','a.tipo_origen','a.id_origen','a.id_atec','a.id_tipo','a.pagado','a.atendido','a.sede','a.usuario','a.created_at','a.estatus','a.id_paciente','a.tipo_atencion','a.monto','a.abono','a.tipo_pago','b.nombres','b.apellidos','b.dni','c.name as nameo','c.lastname as lasto','d.name as nameu','d.lastname as lastu','s.nombre as detalle')
      ->join('pacientes as b','b.id','a.id_paciente')
      ->join('users as c','c.id','a.id_origen')
      ->join('users as d','d.id','a.usuario')
      ->join('analisis as s','s.id','a.id_tipo')
      ->where('a.estatus', '=', 1)
      ->where('a.tipo_atencion', '=', 4)
      ->where('a.id_atec', '=', $id)
      ->orderBy('a.id','desc');


      $paq = DB::table('atenciones as a')
      ->select('a.id','a.tipo_origen','a.id_origen','a.id_atec','a.id_tipo','a.pagado','a.atendido','a.sede','a.usuario','a.created_at','a.estatus','a.id_paciente','a.tipo_atencion','a.monto','a.abono','a.tipo_pago','b.nombres','b.apellidos','b.dni','c.name as nameo','c.lastname as lasto','d.name as nameu','d.lastname as lastu','s.nombre as detalle')
      ->join('pacientes as b','b.id','a.id_paciente')
      ->join('users as c','c.id','a.id_origen')
      ->join('users as d','d.id','a.usuario')
      ->join('paquetes as s','s.id','a.id_tipo')
      ->where('a.estatus', '=', 1)
      ->where('a.tipo_atencion', '=', 7)
      ->where('a.id_atec', '=', $id)
      ->orderBy('a.id','desc');

      $metodos = DB::table('atenciones as a')
      ->select('a.id','a.tipo_origen','a.id_origen','a.id_atec','a.id_tipo','a.pagado','a.atendido','a.sede','a.usuario','a.created_at','a.estatus','a.id_paciente','a.tipo_atencion','a.monto','a.abono','a.tipo_pago','b.nombres','b.apellidos','b.dni','c.name as nameo','c.lastname as lasto','d.name as nameu','d.lastname as lastu','s.nombre as detalle')
      ->join('pacientes as b','b.id','a.id_paciente')
      ->join('users as c','c.id','a.id_origen')
      ->join('users as d','d.id','a.usuario')
      ->join('meto_pro as s','s.id','a.id_tipo')
      ->where('a.estatus', '=', 1)
      ->where('a.tipo_atencion', '=', 6)
      ->where('a.id_atec', '=', $id)
      ->orderBy('a.id','desc');

      
      $consultas = DB::table('atenciones as a')
      ->select('a.id','a.tipo_origen','a.id_origen','a.id_atec','a.id_tipo','a.pagado','a.atendido','a.sede','a.usuario','a.created_at','a.estatus','a.id_paciente','a.tipo_atencion','a.monto','a.abono','a.tipo_pago','b.nombres','b.apellidos','b.dni','c.name as nameo','c.lastname as lasto','d.name as nameu','d.lastname as lastu','s.nombre as detalle')
      ->join('pacientes as b','b.id','a.id_paciente')
      ->join('users as c','c.id','a.id_origen')
      ->join('users as d','d.id','a.usuario')
      ->join('tipo_con as s','s.id','a.id_tipo')
      ->where('a.estatus', '=', 1)
      ->where('a.tipo_atencion', '=', 5)
      ->where('a.id_atec', '=', $id)
      ->orderBy('a.id','desc');

      //->get(); 

   

      $atenciones = DB::table('atenciones as a')
      ->select('a.id','a.tipo_origen','a.id_origen','a.id_atec','a.id_tipo','a.pagado','a.atendido','a.sede','a.usuario','a.created_at','a.estatus','a.id_paciente','a.tipo_atencion',DB::raw('SUM(a.monto) as monto'),'a.abono','a.tipo_pago','b.nombres','b.apellidos','b.dni','c.name as nameo','c.lastname as lasto','d.name as nameu','d.lastname as lastu','s.nombre as detalle')
      ->join('pacientes as b','b.id','a.id_paciente')
      ->join('users as c','c.id','a.id_origen')
      ->join('users as d','d.id','a.usuario')
      ->join('tipo_con as s','s.id','a.id_tipo')
      ->where('a.estatus', '=', 1)
      ->where('a.tipo_atencion', '=', 5)
      ->where('a.id_atec', '=', $id)
      ->union($serv)
      ->union($eco)
      ->union($salud)
      ->union($rayos)
      ->union($ana)
      ->union($metodos)
      ->union($paq)
      ->orderBy('id','desc')
      ->get(); 

       
      $aten = DB::table('atenciones as a')
      ->select('a.id','a.tipo_origen','a.id_origen','a.id_atec','a.id_tipo','a.pagado','a.atendido','a.sede','a.usuario','a.created_at','a.estatus','a.id_paciente','a.tipo_atencion','a.monto','a.abono','a.tipo_pago','b.nombres','b.apellidos','b.dni','c.name as nameo','c.lastname as lasto','d.name as nameu','d.lastname as lastu','s.nombre as detalle')
      ->join('pacientes as b','b.id','a.id_paciente')
      ->join('users as c','c.id','a.id_origen')
      ->join('users as d','d.id','a.usuario')
      ->join('tipo_con as s','s.id','a.id_tipo')
      ->where('a.estatus', '=', 1)
      ->where('a.tipo_atencion', '=', 5)
      ->where('a.id_atec', '=', $id)
      ->union($serv)
      ->union($eco)
      ->union($rayos)
      ->union($salud)
      ->union($ana)
      ->union($metodos)
      ->union($paq)
      ->orderBy('id','desc')
      ->first(); 



      $total = Atenciones::where('id_atec', $id)
         ->select(DB::raw('SUM(monto) as monto'))
         ->first();
      
         $abono = Atenciones::where('id_atec', $id)
         ->select(DB::raw('SUM(abono) as monto'))
         ->first();

       
         $resta = Atenciones::where('id_atec', $id)
         ->select(DB::raw('SUM(resta) as monto'))
         ->first();

       


    


        $view = \View::make('atenciones.ticket')->with('ticket', $atenciones)->with('header', $aten)->with('total', $total)->with('abono', $abono)->with('resta', $resta);
        $customPaper = array(0,0,1000.00,200.00);

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper($customPaper, 'landscape');
        return $pdf->stream('ticket_ver');




    }







    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $ecografias = Servicios::where('estatus','=',1)->where('tipo','=','ECOGRAFIA')->orderBy('nombre','ASC')->get();
        $rayos = Servicios::where('estatus','=',1)->where('tipo','=','RAYOS')->orderBy('nombre','ASC')->get();
        $otros = Servicios::where('estatus','=',1)->where('tipo','=','OTROS')->orderBy('nombre','ASC')->get();
        $otrosp = Servicios::where('estatus','=',1)->where('tipo','=','OtrosP')->orderBy('nombre','ASC')->get();
        $salud = Servicios::where('estatus','=',1)->where('tipo','=','OTROS')->orderBy('nombre','ASC')->get();
        $analisis = Analisis::where('estatus','=',1)->orderBy('nombre','ASC')->get();
        $paquetes = Paquetes::where('estatus','=',1)->orderBy('nombre','ASC')->get();


        $met = MetoPro::where('estatus','=',1)->orderBy('nombre','ASC')->get();

        $personal = User::where('estatus','=',1)->where('tipo','=',1)->where('tipo_personal','=','ProfSalud')->orderBy('name','ASC')->get();
        $tipo_consultas = TipoConsultas::orderBy('detalle','ASC')->get();


        if(!is_null($request->pac)){
            $paciente = Pacientes::where('dni','=',$request->pac)->first();
            $res = 'SI';
            } else {
            $paciente = Pacientes::where('dni','=','LABORATORIO')->first();
            $res = 'NO';
            }

        return view('atenciones.create', compact('paquetes','personal','ecografias','rayos','otros','analisis','paciente','res','met','salud','tipo_consultas','otrosp'));
    }

    public function getServicio($id)
    {
        return Servicios::where('id','=',$id)->first();

    }

    public function getPaquetes($id)
    {
        return Paquetes::where('id','=',$id)->first();

    }

    public function getAnalisis($id)
    {
        return Analisis::where('id','=',$id)->first();

    }

    public function personal(){
     
        $personal = User::where('estatus','=',1)->where('tipo','=',1)->where('tipo_personal','=','ProfSalud')->orderBy('lastname','ASC')->get();

 
     return view('atenciones.personal', compact('personal'));
   }

   public function profesionales(){
     
    $profesionales = User::where('estatus','=',1)->where('tipo','=',2)->orderBy('lastname','ASC')->get();


 return view('atenciones.profesionales', compact('profesionales'));
}

public function particular(){

return view('atenciones.particular');
}

    public function datapac($id){

       

        $pacientes = DB::table('pacientes as a')
       ->select('a.id','a.dni','a.nombres','a.apellidos','a.tipo_doc','a.direccion','a.telefono','a.fechanac')
       ->where('a.dni','=',$id)
       ->first();


          // $edad = Carbon::parse($pacientes->fechanac)->age;

       //return $pacientes;

           return view('solicitudes.pacientes',compact('pacientes'));


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $searchUsuarioID = DB::table('users')
        ->select('*')
        ->where('id','=', $request->origen_usuario)
        ->first();  

      
        /*if($validator->fails()) {
          $request->session()->flash('error', 'El Personal ya está REGISTRADO - DNI y EMAIL deben ser únicos.');
          return redirect()->action('PersonalController@create', ['errors' => $validator->errors()]);
        } else {*/

          if($request->paciente == null){
            $request->session()->flash('error', 'Debe Seleccionar un Paciente para poder hacer el ingreso.');
            return back();

          } else if($request->origen_usuario == null && $request->origen != 3){
            $request->session()->flash('error', 'Debe Seleccionar un Origen para poder hacer el ingreso.');
            return back();

          } else {
              $atec = new Atec();
              $atec->save();

              $totalabono = $request->abo_con + $request->abo1_con;

              if (!is_null($request->precio_con)) {

                if($request->esp_con == null){
                  $request->session()->flash('error', 'Debe Seleccionar un Especialista para hacer el ingreso.');
                  return back();
      
                }




                  $lab = new Atenciones();
                  $lab->tipo_origen =  3;
                  $lab->id_origen = $request->esp_con;
                  $lab->id_atec =  $atec->id;
                  $lab->id_paciente =  $request->paciente;
                  $lab->tipo_atencion = 5;
                  $lab->id_tipo = $request->tipo_con;
                  $lab->resta = $request->precio_con - $totalabono;
                  $lab->monto = $totalabono;
                  $lab->abono = $totalabono;
                  $lab->abono1 = $request->abo_con;
                  $lab->abono2 = $request->abo1_con;
                  $lab->tipo_pago = $request->tipop_con;
                  $lab->tipo_pago1 = $request->tipop1_con;
                  $lab->observaciones = $request->observaciones;
                  $lab->usuario = Auth::user()->id;
                  $lab->sede = $request->session()->get('sede');
                  $lab->save();

                  $cre = new Creditos();
                  $cre->origen = 'CONSULTAS';
                  $cre->descripcion = 'INGRESO POR CONSULTA';
                  $cre->id_atencion =  $lab->id;
                  $cre->monto = $request->abo_con;
                  $cre->usuario = Auth::user()->id;
                  $cre->tipopago = $request->tipop_con;
                  if ($request->tipop_con == 'EF') {
                    $cre->efectivo = $request->abo_con;
                  } elseif($request->tipop_con == 'TJ') {
                    $cre->tarjeta = $request->abo_con;
                  } elseif($request->tipop_con == 'DP') {
                    $cre->dep = $request->abo_con;
                  } else {
                    $cre->yap = $request->abo_con;
                  }
                  $cre->sede = $request->session()->get('sede');
                  $cre->fecha = date('Y-m-d');
                  $cre->save();

                  
                  if ($request->abo1_con != null) {
                    $cre1 = new Creditos();
                    $cre1->origen = 'CONSULTAS';
                    $cre1->descripcion = 'INGRESO POR CONSULTA';
                    $cre1->id_atencion =  $lab->id;
                    $cre1->monto = $request->abo1_con;
                    $cre1->usuario = Auth::user()->id;
                    $cre1->tipopago = $request->tipop1_con;
                    if ($request->tipop1_con == 'EF') {
                      $cre1->efectivo = $request->abo1_con;
                    } elseif($request->tipop1_con == 'TJ') {
                      $cre1->tarjeta = $request->abo1_con;
                    } elseif($request->tipop1_con == 'DP') {
                      $cre1->dep = $request->abo1_con;
                    } else {
                      $cre1->yap = $request->abo1_con;
                    }
                    $cre1->sede = $request->session()->get('sede');
                    $cre1->fecha = date('Y-m-d');
                    $cre1->horatime = now();
                    $cre1->save();
                  }


                  $cre = new CreditosB();
                  $cre->origen = 'CONSULTAS';
                  $cre->descripcion = 'INGRESO POR CONSULTA';
                  $cre->id_atencion =  $lab->id;
                  $cre->monto = $request->precio_con;
                  $cre->usuario = Auth::user()->id;
                  $cre->tipopago = $request->tipop_con;
                  if ($request->tipop_con == 'EF') {
                    $cre->efectivo = $request->precio_con;
                  } elseif($request->tipop_con == 'TJ') {
                    $cre->tarjeta = $request->precio_con;
                  } elseif($request->tipop_con == 'DP') {
                    $cre->dep = $request->precio_con;
                  } else {
                    $cre->yap = $request->precio_con;
                  }
                  $cre->sede = $request->session()->get('sede');
                  $cre->fecha = date('Y-m-d');
                  $cre->save();


                  if ($request->precio_con > $request->precio_con) {
                  }

                  $con = new Consultas();
                  $con->id_paciente =  $request->paciente;
                  $con->id_atencion =  $lab->id;
                  $con->id_especialista =  $request->esp_con;
                  $con->tipo =  $request->tipo_con;
                  $con->tipo_consulta =  $request->tipo_consulta;
                  $con->monto = $request->precio_con;
                  $con->usuario = Auth::user()->id;
                  $con->sede = $request->session()->get('sede');
                  $con->save();
              }

        
              //GUARDANDO METODOS
        
              if (!is_null($request->precio_met)) {


                if($request->metodo == null){
                  $request->session()->flash('error', 'Debe Seleccionar un Método para hacer el ingreso.');
                  return back();
      
                }

                $totalabono = $request->abo_met + $request->abo1_met;

                             
                if($totalabono > $request->precio_met){
                  $request->session()->flash('error', 'El monto del abono de pagos mixto es mayor al item de la consulta/control.');
                  return back();
                } 




                  $lab = new Atenciones();
                  $lab->tipo_origen =  $request->origen;
                  if ($request->origen == 3) {
                      $lab->id_origen = 99;
                  } else {
                      $lab->id_origen = $searchUsuarioID->id;
                  }
                  $lab->id_paciente =  $request->paciente;
                  $lab->tipo_atencion = 6;
                  $lab->id_atec =  $atec->id;
                  $lab->id_tipo = $request->metodo;
                  $lab->monto = $request->precio_met;
                  $lab->abono = $totalabono;
                  $lab->abono1 = $request->abo_met;
                  $lab->abono2 = $request->abo1_met;
                  $lab->resta = $request->precio_met - $totalabono;
                  $lab->tipo_pago = $request->tipop_met;
                  $lab->tipo_pago1 = $request->tipop1_met;
                  $lab->observaciones = $request->observaciones;
                  $lab->usuario = Auth::user()->id;
                  $lab->sede = $request->session()->get('sede');
                  $lab->save();

                  $cre = new Creditos();
                  $cre->origen = 'METODO';
                  $cre->descripcion = 'INGRESO POR METODO';
                  $cre->id_atencion =  $lab->id;
                  $cre->monto = $request->abo_met;
                  $cre->tipopago = $request->tipop_met;
                  if ($request->tipop_met == 'EF') {
                    $cre->efectivo = $request->abo_met;
                  } elseif($request->tipop_met == 'TJ') {
                    $cre->tarjeta = $request->abo_met;
                  } elseif($request->tipop_met == 'DP') {
                    $cre->dep = $request->abo_met;
                  } else {
                    $cre->yap = $request->abo_met;
                  }
                  $cre->usuario = Auth::user()->id;
                  $cre->sede = $request->session()->get('sede');
                  $cre->fecha = date('Y-m-d');
                  $cre->save();

                  if($request->abo1_met != null){

                    $cre1 = new Creditos();
                    $cre1->origen = 'METODO';
                    $cre1->descripcion = 'INGRESO POR METODO';
                    $cre1->id_atencion =  $lab->id;
                    $cre1->monto = $request->abo1_met;
                    $cre1->tipopago = $request->tipop1_met;
                    if ($request->tipop1_met == 'EF') {
                      $cre1->efectivo = $request->abo1_met;
                    } elseif($request->tipop1_met == 'TJ') {
                      $cre1->tarjeta = $request->abo1_met;
                    } elseif($request->tipop1_met == 'DP') {
                      $cre1->dep = $request->abo1_met;
                    } else {
                      $cre1->yap = $request->abo1_met;
                    }
                    $cre1->usuario = Auth::user()->id;
                    $cre1->sede = $request->session()->get('sede');
                    $cre1->save();

                  }

             

                  $met = new Metodos();
                  $met->id_paciente =  $request->paciente;
                  $met->id_atencion =  $lab->id;
                  $met->id_producto =  $request->metodo;
                  $met->monto = $request->precio_met;
                  $met->usuario = Auth::user()->id;
                  $met->sede = $request->session()->get('sede');
                  $met->save();
              }

              //GUARDANDO SERVICIOS


        
              if ($request->id_servicio != null && $request->id_servicio['servicios'][0]['servicio'] != '1') {
                  foreach ($request->id_servicio['servicios'] as $key => $serv) {
                      if (!is_null($serv['servicio'])) {
                          $servicio = Servicios::where('id', '=', $serv['servicio'])->first();
                          $totalabono = (float)$request->monto_abol['servicios'][$key]['abono'] + (float)$request->monto_abol['servicios'][$key]['abono1'];


                           
                          if($totalabono > (float)$request->monto_s['servicios'][$key]['monto']){
                            $request->session()->flash('error', 'El monto del abono de pagos mixto es mayor al item del procedimiento.');
                            return back();
                          } 



                          //TIPO ATENCION SERVICIOS= 1
                          $lab = new Atenciones();
                          $lab->tipo_origen =  $request->origen;
                          if ($request->origen == 3) {
                              $lab->id_origen = 99;
                          } else {
                              $lab->id_origen = $searchUsuarioID->id;
                          }
                          $lab->id_paciente =  $request->paciente;
                          $lab->tipo_atencion = 1;
                          $lab->atendido = 2;
                          $lab->id_tipo = $serv['servicio'];
                          $lab->monto = (float)$request->monto_s['servicios'][$key]['monto'];
                          $lab->abono =  $request->monto_abol['servicios'][$key]['abono1'] != null ? (float)$request->monto_abol['servicios'][$key]['abono'] + (float)$request->monto_abol['servicios'][$key]['abono1'] : (float)$request->monto_abol['servicios'][$key]['abono'];
                          $lab->abono1 =  (float)$request->monto_abol['servicios'][$key]['abono'];
                          $lab->abono2 =  (float)$request->monto_abol['servicios'][$key]['abono1'];
                          $lab->tipo_pago = $request->id_pago['servicios'][$key]['tipop'];
                          $lab->tipo_pago1 = $request->id_pago['servicios'][$key]['tipop1'];
                          $lab->resta = (float)$request->monto_s['servicios'][$key]['monto'] - $totalabono;
                          $lab->usuario = Auth::user()->id;
                          $lab->observaciones = $request->observaciones;
                          $lab->sede = $request->session()->get('sede');
                          $lab->id_atec =  $atec->id;
                          $lab->save();

                          $cre = new Creditos();
                          $cre->origen = 'SERVICIO';
                          $cre->descripcion = 'INGRESO POR SERVICIO';
                          $cre->id_atencion =  $lab->id;
                          $cre->tipopago =  $request->id_pago['servicios'][$key]['tipop'];
                          $cre->monto = (float)$request->monto_abol['servicios'][$key]['abono'];
                          if ($request->id_pago['servicios'][$key]['tipop'] == 'EF') {
                            $cre->efectivo = (float)$request->monto_abol['servicios'][$key]['abono'];
                          } elseif($request->id_pago['servicios'][$key]['tipop'] == 'TJ') {
                            $cre->tarjeta =(float)$request->monto_abol['servicios'][$key]['abono'];
                          } elseif($request->id_pago['servicios'][$key]['tipop'] == 'DP') {
                            $cre->dep = (float)$request->monto_abol['servicios'][$key]['abono'];
                          } else {
                            $cre->yap = (float)$request->monto_abol['servicios'][$key]['abono'];
                          }
                          $cre->usuario = Auth::user()->id;
                          $cre->sede = $request->session()->get('sede');
                          $cre->fecha = date('Y-m-d');
                          $cre->save();

                          
                          if($request->monto_abol['servicios'][$key]['abono1'] != null){

                            $cre1 = new Creditos();
                            $cre1->origen = 'SERVICIO';
                            $cre1->descripcion = 'INGRESO POR SERVICIO';
                            $cre1->id_atencion =  $lab->id;
                            $cre1->tipopago =  $request->id_pago['servicios'][$key]['tipop1'];
                            $cre1->monto = (float)$request->monto_abol['servicios'][$key]['abono1'];
                            if ($request->id_pago['servicios'][$key]['tipop1'] == 'EF') {
                              $cre1->efectivo = (float)$request->monto_abol['servicios'][$key]['abono1'];
                            } elseif($request->id_pago['servicios'][$key]['tipop1'] == 'TJ') {
                              $cre1->tarjeta =(float)$request->monto_abol['servicios'][$key]['abono1'];
                            } elseif($request->id_pago['servicios'][$key]['tipop1'] == 'DP') {
                              $cre1->dep = (float)$request->monto_abol['servicios'][$key]['abono1'];
                            } else {
                              $cre1->yap = (float)$request->monto_abol['servicios'][$key]['abono1'];
                            }
                            $cre1->usuario = Auth::user()->id;
                            $cre1->sede = $request->session()->get('sede');
                            $cre1->fecha = date('Y-m-d');
                            $cre1->fechatime = date('Y-m-d');
                            $cre1->horatime = now();
                            $cre1->save();
  
                            }

                       
                            $rs = new ResultadosServicios();
                            $rs->id_atencion =  $lab->id;
                            $rs->id_servicio = $serv['servicio'];
                            $rs->save();

                          if ($request->monto_s['servicios'][$key]['monto'] > $request->monto_abol['servicios'][$key]['abono']) {
                              $cb = new Cobrar();
                              $cb->id_atencion =  $lab->id;
                              $cb->detalle =  $servicio->nombre;
                              $cb->resta =(float)$request->monto_s['servicios'][$key]['monto'] - (float)$request->monto_abol['servicios'][$key]['abono'];
                              $cb->save();
                          }



                          if ($request->origen == 1 && $servicio->porcentaje > 0) {
                              $com = new Comisiones();
                              $com->id_atencion =  $lab->id;
                              $com->porcentaje = $servicio->porcentaje;
                              $com->id_responsable = $searchUsuarioID->id;
                              $com->id_origen = $request->origen;
                              $com->detalle =  $servicio->nombre;
                              $com->monto = (float)$request->monto_s['servicios'][$key]['monto'] * $servicio->porcentaje / 100;
                              $com->estatus = 1;
                              $com->usuario = Auth::user()->id;
                              $com->sede = $request->session()->get('sede');
                              $com->save();
                          } elseif ($request->origen == 2 && $servicio->porcentaje1 > 0) {
                              $com = new Comisiones();
                              $com->id_atencion =  $lab->id;
                              $com->porcentaje = $servicio->porcentaje1;
                              $com->id_responsable = $searchUsuarioID->id;
                              $com->id_origen = $request->origen;
                              $com->detalle =  $servicio->nombre;
                              $com->monto = (float)$request->monto_s['servicios'][$key]['monto'] * $servicio->porcentaje1 / 100;
                              $com->estatus = 1;
                              $com->usuario = Auth::user()->id;
                              $com->sede = $request->session()->get('sede');
                              $com->save();
                          } else {

              
                          }
                      }
                  }
              }

            //GUARDANDO Otros Pagos

            //dd($request->all());

            if ($request->id_salu != null && $request->id_salu['salud'][0]['salu'] != '1') {
              foreach ($request->id_salu['salud'] as $key => $serv) {
                  if (!is_null($serv['salu'])) {
                      $servicio = Servicios::where('id', '=', $serv['salu'])->first();
                      $totalabono = (float)$request->monto_abol['salud'][$key]['abono'] + (float)$request->monto_abol['salud'][$key]['abono1'];

                      if($serv['salu'] != 1){
                          //TIPO ATENCION SERVICIOS= 1
                      $lab = new Atenciones();
                      $lab->tipo_origen =  $request->origen;
                      if ($request->origen == 3) {
                          $lab->id_origen = 99;
                      } else {
                          $lab->id_origen = $searchUsuarioID->id;
                      }
                      $lab->id_paciente =  $request->paciente;
                      $lab->tipo_atencion = 8;
                      $lab->id_tipo = $serv['salu'];
                      $lab->monto = (float)$request->monto_s['salud'][$key]['monto'];
                      $lab->abono =  $request->monto_abol['salud'][$key]['abono1'] != null ? (float)$totalabono : (float)$request->monto_abol['salud'][$key]['abono'];
                      $lab->abono1 =  (float)$request->monto_abol['salud'][$key]['abono'];
                      $lab->abono2 =  (float)$request->monto_abol['salud'][$key]['abono1'];
                      $lab->tipo_pago = $request->id_pago['salud'][$key]['tipop'];
                      $lab->tipo_pago1 = $request->id_pago['salud'][$key]['tipop1'];
                      $lab->resta = (float)$request->monto_s['salud'][$key]['monto'] - $totalabono;
                      $lab->usuario = Auth::user()->id;
                      $lab->sede = $request->session()->get('sede');
                      $lab->observaciones = $request->observaciones;
                      $lab->id_atec =  $atec->id;
                      $lab->save();

                      $cre = new Creditos();
                      $cre->origen = 'SERVICIO';
                      $cre->descripcion = 'INGRESO POR SERVICIO';
                      $cre->id_atencion =  $lab->id;
                      $cre->tipopago =  $request->id_pago['salud'][$key]['tipop'];
                      $cre->monto = (float)$request->monto_abol['salud'][$key]['abono'];
                      if ($request->id_pago['salud'][$key]['tipop'] == 'EF') {
                        $cre->efectivo = (float)$request->monto_abol['salud'][$key]['abono'];
                      } elseif($request->id_pago['salud'][$key]['tipop'] == 'TJ') {
                        $cre->tarjeta =(float)$request->monto_abol['salud'][$key]['abono'];
                      } elseif($request->id_pago['salud'][$key]['tipop'] == 'DP') {
                        $cre->dep = (float)$request->monto_abol['salud'][$key]['abono'];
                      } else {
                        $cre->yap = (float)$request->monto_abol['salud'][$key]['abono'];
                      }
                      $cre->usuario = Auth::user()->id;
                      $cre->sede = $request->session()->get('sede');
                      $cre->fecha = date('Y-m-d');
                      $cre->save();

                      
                      if($request->monto_abol['salud'][$key]['abono1'] != null){

                        $cre1 = new Creditos();
                        $cre1->origen = 'SERVICIO';
                        $cre1->descripcion = 'INGRESO POR SERVICIO';
                        $cre1->id_atencion =  $lab->id;
                        $cre1->tipopago =  $request->id_pago['salud'][$key]['tipop1'];
                        $cre1->monto = (float)$request->monto_abol['salud'][$key]['abono1'];
                        if ($request->id_pago['salud'][$key]['tipop1'] == 'EF') {
                          $cre1->efectivo = (float)$request->monto_abol['salud'][$key]['abono1'];
                        } elseif($request->id_pago['salud'][$key]['tipop1'] == 'TJ') {
                          $cre1->tarjeta =(float)$request->monto_abol['salud'][$key]['abono1'];
                        } elseif($request->id_pago['salud'][$key]['tipop1'] == 'DP') {
                          $cre1->dep = (float)$request->monto_abol['salud'][$key]['abono1'];
                        } else {
                          $cre1->yap = (float)$request->monto_abol['salud'][$key]['abono1'];
                        }
                        $cre1->usuario = Auth::user()->id;
                        $cre1->sede = $request->session()->get('sede');
                        $cre1->fecha = date('Y-m-d');
                        $cre1->fechatime = date('Y-m-d');
                        $cre1->horatime = now();
                        $cre1->save();

                        }

                      if ($request->monto_s['salud'][$key]['monto'] > $request->monto_abol['salud'][$key]['abono']) {
                          $cb = new Cobrar();
                          $cb->id_atencion =  $lab->id;
                          $cb->detalle =  $servicio->nombre;
                          $cb->resta =(float)$request->monto_s['salud'][$key]['monto'] - (float)$request->monto_abol['salud'][$key]['abono'];
                          $cb->save();
                      }

                      if ($request->origen == 1 && $servicio->porcentaje > 0) {
                          $com = new Comisiones();
                          $com->id_atencion =  $lab->id;
                          $com->porcentaje = $servicio->porcentaje;
                          $com->id_responsable = $searchUsuarioID->id;
                          $com->id_origen = $request->origen;
                          $com->detalle =  $servicio->nombre;
                          $com->monto = (float)$request->monto_s['salud'][$key]['monto'] * $servicio->porcentaje / 100;
                          $com->estatus = 1;
                          $com->usuario = Auth::user()->id;
                          $com->sede = $request->session()->get('sede');
                          $com->save();
                      } elseif ($request->origen == 2 && $servicio->porcentaje1 > 0) {
                          $com = new Comisiones();
                          $com->id_atencion =  $lab->id;
                          $com->porcentaje = $servicio->porcentaje1;
                          $com->id_responsable = $searchUsuarioID->id;
                          $com->id_origen = $request->origen;
                          $com->detalle =  $servicio->nombre;
                          $com->monto = (float)$request->monto_s['salud'][$key]['monto'] * $servicio->porcentaje1 / 100;
                          $com->estatus = 1;
                          $com->usuario = Auth::user()->id;
                          $com->sede = $request->session()->get('sede');
                          $com->save();
                      } else {

          
                      }

                      }

                    
                  }
              }
          }






              //GUARDANDO ANALISIS


              if ($request->id_analisi != null && $request->id_analisi['analisis'][0]['analisi'] != '1') {
                  foreach ($request->id_analisi['analisis'] as $key => $laboratorio) {
                      if (!is_null($laboratorio['analisi'])) {
                          $analisis = Analisis::where('id', '=', $laboratorio['analisi'])->first();
                          $totalabono = (float)$request->monto_abol['analisis'][$key]['abono'] + (float)$request->monto_abol['analisis'][$key]['abono1'];



                          //TIPO ATENCION LABORATORIO= 4
                          $lab = new Atenciones();
                          $lab->tipo_origen =  $request->origen;
                          if ($request->origen == 3) {
                              $lab->id_origen = 99;
                          } else {
                              $lab->id_origen = $searchUsuarioID->id;
                          }
                          $lab->id_paciente =  $request->paciente;
                          $lab->tipo_atencion = 4;
                          $lab->id_tipo = $laboratorio['analisi'];
                          $lab->monto = (float)$request->monto_s['analisis'][$key]['monto'];
                          $lab->abono =  $request->monto_abol['analisis'][$key]['abono1'] != null ? (float)$totalabono : (float)$request->monto_abol['analisis'][$key]['abono'];
                          $lab->abono1 =  (float)$request->monto_abol['analisis'][$key]['abono'];
                          $lab->abono2 =  (float)$request->monto_abol['analisis'][$key]['abono1'];
                          $lab->tipo_pago = $request->id_pago['analisis'][$key]['tipop'];
                          $lab->tipo_pago1 = $request->id_pago['analisis'][$key]['tipop1'];
                          $lab->resta = (float)$request->monto_s['analisis'][$key]['monto'] - $totalabono;
                          $lab->usuario = Auth::user()->id;
                          $lab->sede = $request->session()->get('sede');
                          $lab->observaciones = $request->observaciones;
                          $lab->id_atec =  $atec->id;
                          $lab->save();

                          $cre = new Creditos();
                          $cre->origen = 'ANALISIS';
                          $cre->descripcion = 'INGRESO POR ANALISIS';
                          $cre->id_atencion =  $lab->id;
                          $cre->tipopago =  $request->id_pago['analisis'][$key]['tipop'];
                          $cre->monto = (float)$request->monto_abol['analisis'][$key]['abono'];
                          if ($request->id_pago['analisis'][$key]['tipop'] == 'EF') {
                            $cre->efectivo = (float)$request->monto_abol['analisis'][$key]['abono'];
                          } elseif($request->id_pago['analisis'][$key]['tipop'] == 'TJ') {
                            $cre->tarjeta =(float)$request->monto_abol['analisis'][$key]['abono'];
                          } elseif($request->id_pago['analisis'][$key]['tipop'] == 'DP') {
                            $cre->dep = (float)$request->monto_abol['analisis'][$key]['abono'];
                          } else {
                            $cre->yap = (float)$request->monto_abol['analisis'][$key]['abono'];
                          }
                          $cre->usuario = Auth::user()->id;
                          $cre->sede = $request->session()->get('sede');
                          $cre->fecha = date('Y-m-d');
                          $cre->save();

                          
                          if($request->monto_abol['analisis'][$key]['abono1'] != null){
                            
                            $cre1 = new Creditos();
                            $cre1->origen = 'ANALISIS';
                            $cre1->descripcion = 'INGRESO POR ANALISIS';
                            $cre1->id_atencion =  $lab->id;
                            $cre1->tipopago =  $request->id_pago['analisis'][$key]['tipop1'];
                            $cre1->monto = (float)$request->monto_abol['analisis'][$key]['abono1'];
                            if ($request->id_pago['analisis'][$key]['tipop1'] == 'EF') {
                              $cre1->efectivo = (float)$request->monto_abol['analisis'][$key]['abono1'];
                            } elseif($request->id_pago['analisis'][$key]['tipop1'] == 'TJ') {
                              $cre1->tarjeta =(float)$request->monto_abol['analisis'][$key]['abono1'];
                            } elseif($request->id_pago['analisis'][$key]['tipop1'] == 'DP') {
                              $cre1->dep = (float)$request->monto_abol['analisis'][$key]['abono1'];
                            } else {
                              $cre1->yap = (float)$request->monto_abol['analisis'][$key]['abono1'];
                            }
                            $cre1->usuario = Auth::user()->id;
                            $cre1->sede = $request->session()->get('sede');
                            $cre1->fecha = date('Y-m-d');
                            $cre1->fechatime = date('Y-m-d');
                            $cre1->horatime = now();
                            $cre1->save();
                            }
  

                          
                        

                          $rs = new ResultadosLaboratorio();
                          $rs->id_atencion =  $lab->id;
                          $rs->id_laboratorio =$laboratorio['analisi'];
                          $rs->save();

                          $lchck = new LaboratoriosCheck();
                          $lchck->atencion =  $lab->id;
                          $lchck->analisis = $laboratorio['analisi'];
                          $lchck->paciente = $request->paciente;
                          $lchck->laboratorio = $request->paciente;
                          $lchck->save();


                          if ($request->monto_s['analisis'][$key]['monto'] > $request->monto_abol['analisis'][$key]['abono']) {
                              $cb = new Cobrar();
                              $cb->id_atencion =  $lab->id;
                              $cb->detalle =  $analisis->nombre;
                              $cb->resta =(float)$request->monto_s['analisis'][$key]['monto'] - (float)$request->monto_abol['analisis'][$key]['abono'];
                              $cb->save();
                          }



                          if ($request->origen == 2) {
                              $com = new Comisiones();
                              $com->id_atencion =  $lab->id;
                              $com->detalle =  $analisis->nombre;
                              $com->porcentaje = $analisis->porcentaje;
                              $com->id_responsable = $searchUsuarioID->id;
                              $com->id_origen = $request->origen;
                              $com->monto = (float)$request->monto_s['analisis'][$key]['monto'] * $analisis->porcentaje / 100;
                              $com->estatus = 1;
                              $com->usuario = Auth::user()->id;
                              $com->sede = $request->session()->get('sede');
                              $com->save();
                          }
                      }
                  }
              }

              //GUARDANDO PAQUETES


              if ($request->id_paquete != null && $request->id_paquete['paquetes_'][0]['paquete'] != '1') {
                  foreach ($request->id_paquete['paquetes_'] as $key => $paq) {
                      if (!is_null($paq['paquete'])) {
                          $paquetes = Paquetes::where('id', '=', $paq['paquete'])->first();
                          $totalabono = (float)$request->monto_abol['paquetes'][$key]['abono'] + (float)$request->monto_abol['paquetes'][$key]['abono1'];


                          //TIPO ATENCION PAQUETE= 7
                          $lab = new Atenciones();
                          $lab->tipo_origen =  $request->origen;
                          if ($request->origen == 3) {
                              $lab->id_origen = 99;
                          } else {
                              $lab->id_origen = $searchUsuarioID->id;
                          }
                          $lab->id_paciente =  $request->paciente;
                          $lab->tipo_atencion = 7;
                          $lab->id_tipo = $paq['paquete'];
                          $lab->monto = (float)$request->monto_s['paquetes'][$key]['monto'];
                          $lab->abono =  $request->monto_abol['paquetes'][$key]['abono1'] != null ? (float)$totalabono : (float)$request->monto_abol['paquetes'][$key]['abono'];
                          $lab->abono1 =  (float)$request->monto_abol['paquetes'][$key]['abono'];
                          $lab->abono2 =  (float)$request->monto_abol['paquetes'][$key]['abono1'];
                          $lab->tipo_pago = $request->id_pago['paquetes'][$key]['tipop'];
                          $lab->tipo_pago1 = $request->id_pago['paquetes'][$key]['tipop1'];
                          $lab->resta = (float)$request->monto_s['paquetes'][$key]['monto'] - $totalabono;
                          $lab->usuario = Auth::user()->id;
                          $lab->sede = $request->session()->get('sede');
                          $lab->observaciones = $request->observaciones;
                          $lab->id_atec =  $atec->id;
                          $lab->save();

                          $cre = new Creditos();
                          $cre->origen = 'PAQUETES';
                          $cre->descripcion = 'INGRESO POR PAQUETE';
                          $cre->id_atencion =  $lab->id;
                          $cre->tipopago =  $request->id_pago['paquetes'][$key]['tipop'];
                          $cre->monto = (float)$request->monto_abol['paquetes'][$key]['abono'];
                          if ($request->id_pago['paquetes'][$key]['tipop'] == 'EF') {
                            $cre->efectivo = (float)$request->monto_abol['paquetes'][$key]['abono'];
                          } elseif($request->id_pago['paquetes'][$key]['tipop'] == 'TJ') {
                            $cre->tarjeta =(float)$request->monto_abol['paquetes'][$key]['abono'];
                          } elseif($request->id_pago['paquetes'][$key]['tipop'] == 'DP') {
                            $cre->dep = (float)$request->monto_abol['paquetes'][$key]['abono'];
                          } else {
                            $cre->yap = (float)$request->monto_abol['paquetes'][$key]['abono'];
                          }
                          $cre->usuario = Auth::user()->id;
                          $cre->sede = $request->session()->get('sede');
                          $cre->fecha = date('Y-m-d');
                          $cre->save();

                          if($request->monto_abol['paquetes'][$key]['abono1'] != null){
                            $cre1 = new Creditos();
                            $cre1->origen = 'PAQUETES';
                            $cre1->descripcion = 'INGRESO POR PAQUETE';
                            $cre1->id_atencion =  $lab->id;
                            $cre1->tipopago =  $request->id_pago['paquetes'][$key]['tipop1'];
                            $cre1->monto = (float)$request->monto_abol['paquetes'][$key]['abono1'];
                            if ($request->id_pago['paquetes'][$key]['tipop1'] == 'EF') {
                              $cre1->efectivo = (float)$request->monto_abol['paquetes'][$key]['abono1'];
                            } elseif($request->id_pago['paquetes'][$key]['tipop1'] == 'TJ') {
                              $cre1->tarjeta =(float)$request->monto_abol['paquetes'][$key]['abono1'];
                            } elseif($request->id_pago['paquetes'][$key]['tipop1'] == 'DP') {
                              $cre1->dep = (float)$request->monto_abol['paquetes'][$key]['abono1'];
                            } else {
                              $cre1->yap = (float)$request->monto_abol['paquetes'][$key]['abono1'];
                            }
                            $cre1->usuario = Auth::user()->id;
                            $cre1->sede = $request->session()->get('sede');
                            $cre1->fecha = date('Y-m-d');
                            $cre1->fechatime = date('Y-m-d');
                            $cre1->horatime = now();
                            $cre1->save();

                          }


                        


                          if ($request->monto_s['paquetes'][$key]['monto'] > $request->monto_abol['paquetes'][$key]['abono']) {
                              $cb = new Cobrar();
                              $cb->id_atencion =  $lab->id;
                              $cb->detalle =  $paquetes->nombre;
                              $cb->resta =(float)$request->monto_s['paquetes'][$key]['monto'] - (float)$request->monto_abol['paquetes'][$key]['abono'];
                              $cb->save();
                          }


                          if ($request->origen == 1 && $paquetes->porcentaje > 0) {
                              $com = new Comisiones();
                              $com->id_atencion =  $lab->id;
                              $com->detalle =  $paquetes->nombre;
                              $com->porcentaje = $paquetes->porcentaje;
                              $com->id_responsable = $searchUsuarioID->id;
                              $com->id_origen = $request->origen;
                              $com->monto = (float)$request->monto_s['paquetes'][$key]['monto'] * $paquetes->porcentaje / 100;
                              $com->estatus = 1;
                              $com->usuario = Auth::user()->id;
                              $com->sede = $request->session()->get('sede');
                              $com->save();
                          }


                          // VERIFICANDO SERVICIOS DE PAQUETE PARA GUARDAR SUS RESULTADPS

                          $searchServPaq = DB::table('paquetes_s')
                          ->select('*')
                          ->where('paquete', '=', $paq['paquete'])
                          ->get();

                          //

                          foreach ($searchServPaq as $serv) {
                              $id_servicio = $serv->servicio;
          
                              $servdetalle =  DB::table('servicios')
                              ->select('*')
                              ->where('id', '=', $id_servicio)
                              ->first();

                              $contador=0;
                      
                              if ($servdetalle->sesiones != 0) {
                                  while ($contador < $servdetalle->sesiones) {
                                      $ses = new Sesiones();
                                      $ses->id_paciente =   $request->paciente;
                                      $ses->id_atencion =  $id_servicio;
                                      $ses->id_atec =  $lab->id;
                                     // $ses->monto =  '50';
                                      $ses->save();
       
                                      $contador++;
                                  }
                              }
       


                
                              if (! is_null($id_servicio) && $servdetalle->estatus != 0 && $servdetalle->informe != 0) {
                                      $rs = new ResultadosServicios();
                                      $rs->id_atencion =  $lab->id;
                                      $rs->id_servicio = $id_servicio;
                                      $rs->monto = $servdetalle->precio;
                                      $rs->save();
                                  
                              }
                          }



                          // VERIFICANDO LABORATORIOS DE PAQUETE PARA GUARDAR SUS RESULTADPS


                          $searchLabPaq = DB::table('paquetes_l')
              ->select('*')
              ->where('paquete', '=', $paq['paquete'])
              ->get();


                          foreach ($searchLabPaq as $labp) {
                              $id_laboratorio = $labp->laboratorio;
                              if (!is_null($id_laboratorio)) {
                                  $rs = new ResultadosLaboratorio();
                                  $rs->id_atencion =  $lab->id;
                                  $rs->id_laboratorio =$id_laboratorio;
                                  $rs->save();
                              }
                          }

                          // VERIFICANDO CANTIDAD DE CONSULTAS EN PAQUETE

                          $searchConsPaq = DB::table('paquetes_c')
                          ->select('*')
                          ->where('paquete', '=', $paq['paquete'])
                          ->get();
    
                          if (count($searchConsPaq) > 0) {
                              foreach ($searchConsPaq as $cons) {
                                  $cantidad=$cons->cantidad;
                              }
    
    
    
                              $contador=0;

             
                              while ($contador < $cantidad) {

                                if($request->origen == 3){
                                  $con = new Consultas();
                                  $con->id_paciente =  $request->paciente;
                                  $con->id_especialista =  99;
                                  $con->id_atencion =  $lab->id;
                                  $con->tipo =  1;
                                  $con->monto = 0;
                                  $con->usuario = Auth::user()->id;
                                  $con->sede = $request->session()->get('sede');
                                  $con->save();
                                } else {
                                  $con = new Consultas();
                                  $con->id_paciente =  $request->paciente;
                                  $con->id_especialista =  $searchUsuarioID->id;
                                  $con->id_atencion =  $lab->id;
                                  $con->tipo =  1;
                                  $con->monto = 0;
                                  $con->usuario = Auth::user()->id;
                                  $con->sede = $request->session()->get('sede');
                                  $con->save();

                                }
 
                                  $contador++;
                              }
                          }



                          //

                          // VERIFICANDO CANTIDAD DE CONTROLES EN PAQUETE

                          $searchConsPaq = DB::table('paquetes_co')
            ->select('*')
            ->where('paquete', '=', $paq['paquete'])
            ->get();
    
                          if (count($searchConsPaq) > 0) {
                              foreach ($searchConsPaq as $cons) {
                                  $cantidad=$cons->cantidad;
                              }
    
    
    
                              $contador=0;

             
                              while ($contador < $cantidad) {
                                  $con = new Consultas();
                                  $con->id_paciente =  $request->paciente;
                                  $con->id_especialista =  1;
                                  $con->id_atencion =  $lab->id;
                                  $con->tipo =  2;
                                  $con->monto = 0;
                                  $con->usuario = Auth::user()->id;
                                  $con->sede = $request->session()->get('sede');
                                  $con->save();
 
                                  $contador++;
                              }
                          }
                      }
                  }
              }

              //GUARDANDO ECOGRAFIAS

              if ($request->id_ecografia != null && $request->id_ecografia['ecografias'][0]['ecografia'] != '1') {
                  foreach ($request->id_ecografia['ecografias'] as $key => $eco) {
                      if (!is_null($eco['ecografia'])) {
                          $servicio = Servicios::where('id', '=', $eco['ecografia'])->first();
                          $totalabono = (float)$request->monto_abol['ecografias'][$key]['abono'] + (float)$request->monto_abol['ecografias'][$key]['abono1'];


                          //TIPO ATENCION ECOGRAFIA= 2
                          $lab = new Atenciones();
                          $lab->tipo_origen =  $request->origen;
                          if ($request->origen == 3) {
                              $lab->id_origen = 99;
                          } else {
                              $lab->id_origen = $searchUsuarioID->id;
                          }
                          $lab->id_paciente =  $request->paciente;
                          $lab->tipo_atencion = 2;
                          $lab->id_tipo = $eco['ecografia'];
                          $lab->monto = (float)$request->monto_s['ecografias'][$key]['monto'];
                          $lab->abono =  $request->monto_abol['ecografias'][$key]['abono1'] != null ? (float)$totalabono : (float)$request->monto_abol['ecografias'][$key]['abono'];
                          $lab->abono1 =  (float)$request->monto_abol['ecografias'][$key]['abono'];
                          $lab->abono2 =  (float)$request->monto_abol['ecografias'][$key]['abono1'];
                          $lab->tipo_pago = $request->id_pago['ecografias'][$key]['tipop'];
                          $lab->tipo_pago1 = $request->id_pago['ecografias'][$key]['tipop1'];
                          $lab->resta = (float)$request->monto_s['ecografias'][$key]['monto'] - $totalabono;
                          $lab->usuario = Auth::user()->id;
                          $lab->sede = $request->session()->get('sede');
                          $lab->observaciones = $request->observaciones;
                          $lab->id_atec =  $atec->id;
                          $lab->save();


                          
                       
                          $rs = new ResultadosServicios();
                          $rs->id_atencion =  $lab->id;
                          $rs->id_servicio = $eco['ecografia'];
                          $rs->save();

                
                          $cre = new Creditos();
                          $cre->origen = 'ECOGRAFIA';
                          $cre->descripcion = 'INGRESO POR ECOGRAFIA';
                          $cre->id_atencion =  $lab->id;
                          $cre->tipopago =  $request->id_pago['ecografias'][$key]['tipop'];
                          $cre->monto = (float)$request->monto_abol['ecografias'][$key]['abono'];
                          if ($request->id_pago['ecografias'][$key]['tipop'] == 'EF') {
                            $cre->efectivo = (float)$request->monto_abol['ecografias'][$key]['abono'];
                          } elseif($request->id_pago['ecografias'][$key]['tipop'] == 'TJ') {
                            $cre->tarjeta =(float)$request->monto_abol['ecografias'][$key]['abono'];
                          } elseif($request->id_pago['ecografias'][$key]['tipop'] == 'DP') {
                            $cre->dep = (float)$request->monto_abol['ecografias'][$key]['abono'];
                          } else {
                            $cre->yap = (float)$request->monto_abol['ecografias'][$key]['abono'];
                          }
                          $cre->usuario = Auth::user()->id;
                          $cre->sede = $request->session()->get('sede');
                          $cre->fecha = date('Y-m-d');
                          $cre->save();

                          if($request->monto_abol['ecografias'][$key]['abono1'] != null){

                            $cre1 = new Creditos();
                            $cre1->origen = 'ECOGRAFIA';
                            $cre1->descripcion = 'INGRESO POR ECOGRAFIA';
                            $cre1->id_atencion =  $lab->id;
                            $cre1->tipopago =  $request->id_pago['ecografias'][$key]['tipop1'];
                            $cre1->monto = (float)$request->monto_abol['ecografias'][$key]['abono1'];
                            if ($request->id_pago['ecografias'][$key]['tipop1'] == 'EF') {
                              $cre1->efectivo = (float)$request->monto_abol['ecografias'][$key]['abono1'];
                            } elseif($request->id_pago['ecografias'][$key]['tipop1'] == 'TJ') {
                              $cre1->tarjeta =(float)$request->monto_abol['ecografias'][$key]['abono1'];
                            } elseif($request->id_pago['ecografias'][$key]['tipop1'] == 'DP') {
                              $cre1->dep = (float)$request->monto_abol['ecografias'][$key]['abono1'];
                            } else {
                              $cre1->yap = (float)$request->monto_abol['ecografias'][$key]['abono1'];
                            }
                            $cre1->usuario = Auth::user()->id;
                            $cre1->sede = $request->session()->get('sede');
                            $cre1->fecha = date('Y-m-d');
                            $cre1->fechatime = date('Y-m-d');
                            $cre1->horatime = now();
                            $cre1->save();

                          }
                          
                      
                   
                          if ($request->monto_s['ecografias'][$key]['monto'] > $request->monto_abol['ecografias'][$key]['abono']) {
                              $cb = new Cobrar();
                              $cb->id_atencion =  $lab->id;
                              $cb->detalle =  $servicio->nombre;
                              $cb->resta =(float)$request->monto_s['ecografias'][$key]['monto'] - (float)$request->monto_abol['ecografias'][$key]['abono'];
                              $cb->save();
                          }


                          if ($request->origen == 1  && $servicio->porcentaje > 0) {
                              $com = new Comisiones();
                              $com->id_atencion =  $lab->id;
                              $com->detalle =  $servicio->nombre;
                              $com->porcentaje = $servicio->porcentaje;
                              $com->id_responsable = $searchUsuarioID->id;
                              $com->id_origen = $request->origen;
                              $com->monto = (float)$request->monto_s['ecografias'][$key]['monto'] * $servicio->porcentaje / 100;
                              $com->estatus = 1;
                              $com->usuario = Auth::user()->id;
                              $com->sede = $request->session()->get('sede');
                              $com->save();
                          } elseif ($request->origen == 2 && $servicio->porcentaje1 > 0) {
                              $com = new Comisiones();
                              $com->id_atencion =  $lab->id;
                              $com->detalle =  $servicio->nombre;
                              $com->porcentaje = $servicio->porcentaje1;
                              $com->id_responsable = $searchUsuarioID->id;
                              $com->id_origen = $request->origen;
                              $com->monto = (float)$request->monto_s['ecografias'][$key]['monto'] * $servicio->porcentaje1 / 100;
                              $com->estatus = 1;
                              $com->usuario = Auth::user()->id;
                              $com->sede = $request->session()->get('sede');
                              $com->save();
                          } else {

                 /* $com = new Comisiones();
                  $com->id_atencion =  $lab->id;
                  $com->detalle =  $servicio->nombre;
                  $com->porcentaje = $servicio->porcentaje2;
                  $com->monto = (float)$request->monto_s['ecografias'][$key]['monto'] * $servicio->porcentaje2 / 100;
                  $com->estatus = 1;
                  $com->usuario = Auth::user()->id;
                  $com->save();*/
                          }
                      }
                  }
              }

              //GUARDANDO RAYOS X

              if ($request->id_rayo != null && $request->id_rayo['rayos'][0]['rayo'] != '1') {
                  foreach ($request->id_rayo['rayos'] as $key => $ray) {
                      if (!is_null($ray['rayo'])) {
                          $servicio = Servicios::where('id', '=', $ray['rayo'])->first();


                          //TIPO ATENCION RAYOS= 3
                          $lab = new Atenciones();
                          $lab->tipo_origen =  $request->origen;
                          if ($request->origen == 3) {
                              $lab->id_origen = 99;
                          } else {
                              $lab->id_origen = $searchUsuarioID->id;
                          }
                          $lab->id_paciente =  $request->paciente;
                          $lab->tipo_atencion = 3;
                          $lab->id_tipo = $ray['rayo'];
                          $lab->monto = (float)$request->monto_s['rayos'][$key]['monto'];
                          $lab->abono = (float)$request->monto_abol['rayos'][$key]['abono'];
                          $lab->resta = (float)$request->monto_s['rayos'][$key]['monto'] - (float)$request->monto_abol['rayos'][$key]['abono'];
                          $lab->tipo_pago = $request->id_pago['rayos'][$key]['tipop'];
                          $lab->usuario = Auth::user()->id;
                          $lab->sede =$request->session()->get('sede');
                          $lab->observaciones = $request->observaciones;
                          $lab->id_atec =  $atec->id;
                          $lab->save();

                          $cre = new Creditos();
                          $cre->origen = 'RAYOSX';
                          $cre->descripcion = 'INGRESO POR RAYOSX';
                          $cre->id_atencion =  $lab->id;
                          $cre->tipopago =  $request->id_pago['rayos'][$key]['tipop'];
                          $cre->monto = (float)$request->monto_abol['rayos'][$key]['abono'];
                          if ($request->id_pago['rayos'][$key]['tipop'] == 'EF') {
                            $cre->efectivo = (float)$request->monto_abol['rayos'][$key]['abono'];
                          } elseif($request->id_pago['rayos'][$key]['tipop'] == 'TJ') {
                            $cre->tarjeta =(float)$request->monto_abol['rayos'][$key]['abono'];
                          } elseif($request->id_pago['rayos'][$key]['tipop'] == 'DP') {
                            $cre->dep = (float)$request->monto_abol['rayos'][$key]['abono'];
                          } else {
                            $cre->yap = (float)$request->monto_abol['rayos'][$key]['abono'];
                          }
                          $cre->usuario = Auth::user()->id;
                          $cre->sede = $request->session()->get('sede');
                          $cre->fecha = date('Y-m-d');
                          $cre->save();

                          $cre = new CreditosB();
                          $cre->origen = 'RAYOSX';
                          $cre->descripcion = 'INGRESO POR RAYOSX';
                          $cre->id_atencion =  $lab->id;
                          $cre->tipopago =  $request->id_pago['rayos'][$key]['tipop'];
                          $cre->monto = (float)$request->monto_abol['rayos'][$key]['abono'];
                          if ($request->id_pago['rayos'][$key]['tipop'] == 'EF') {
                            $cre->efectivo = (float)$request->monto_abol['rayos'][$key]['abono'];
                          } elseif($request->id_pago['rayos'][$key]['tipop'] == 'TJ') {
                            $cre->tarjeta =(float)$request->monto_abol['rayos'][$key]['abono'];
                          } elseif($request->id_pago['rayos'][$key]['tipop'] == 'DP') {
                            $cre->dep = (float)$request->monto_abol['rayos'][$key]['abono'];
                          } else {
                            $cre->yap = (float)$request->monto_abol['rayos'][$key]['abono'];
                          }
                          $cre->usuario = Auth::user()->id;
                          $cre->sede = $request->session()->get('sede');
                          $cre->fecha = date('Y-m-d');
                          $cre->save();

                          $rs = new ResultadosServicios();
                          $rs->id_atencion =  $lab->id;
                          $rs->id_servicio =$ray['rayo'];
                          $rs->monto =  (float)$request->monto_abol['rayos'][$key]['abono'];
                          $rs->save();

                          if ($request->monto_s['rayos'][$key]['monto'] > $request->monto_abol['rayos'][$key]['abono']) {
                              $cb = new Cobrar();
                              $cb->id_atencion =  $lab->id;
                              $cb->detalle =  $servicio->nombre;
                              $cb->resta =(float)$request->monto_s['rayos'][$key]['monto'] - (float)$request->monto_abol['rayos'][$key]['abono'];
                              $cb->save();
                          }

                         if ($request->origen == 2 && $servicio->porcentaje1 > 0) {
                              $comision = new Comisiones();
                              $comision->id_atencion =  $lab->id;
                              $comision->porcentaje = $servicio->porcentaje1;
                              $comision->detalle =  $servicio->nombre;
                              $comision->id_responsable = $searchUsuarioID->id;
                              $comision->id_origen = $request->origen;
                              $comision->monto = (float)$request->monto_s['rayos'][$key]['monto'] * $servicio->porcentaje1 / 100;
                              $comision->estatus = 1;
                              $comision->usuario = Auth::user()->id;
                              $comision->sede = $request->session()->get('sede');
                              $comision->save();
                          } 
                      }
                  }
              }
          }


        return redirect()->route('atenciones.index')
        ->with('success','Creado Exitosamente!');

        //return redirect()->action('AnalisisController@index', ["created" => true, "analisis" => Analisis::all()]);

    }

    public function ver($id){
        
      $atenciones = Atenciones::where('id','=',$id)->first();
  
      return view('atenciones.ver', compact('atenciones'));
      }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Analisis  $Clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $atencion = Atenciones::where('id','=',1)->first();

        return view('atenciones.edit', compact('atencion')); //
    }

    public function edits($id)
    {
        $atencion = Atenciones::where('id','=',$id)->first();

     
        if($atencion->tipo_atencion == 1){
          $servicio = Servicios::where('estatus','=',1)->where('tipo','=','OTROS')->get();
        } else if($atencion->tipo_atencion == 2) {
          $servicio = Servicios::where('estatus','=',1)->where('tipo','=','ECOGRAFIA')->get();
        } else {
          $servicio = Servicios::where('estatus','=',1)->where('tipo','=','RAYOS')->get();
        }

        if ($atencion->tipo_origen == 1) {
          $usuario = User::where('estatus', '=', 1)->where('tipo', '=', 1)->where('tipo_personal', '=', 'ProfSalud')->get();
        } else {
          $usuario = User::where('estatus', '=', 1)->where('tipo', '=', 2)->get();
        }




        return view('atenciones.edits', compact('atencion','servicio','usuario')); //
    }

    public function editsa($id)
    {
        $atencion = Atenciones::where('id','=',$id)->first();

     
        if($atencion->tipo_atencion == 1){
          $servicio = Servicios::where('estatus','=',1)->where('tipo','=','OTROS')->get();
        } else if($atencion->tipo_atencion == 2) {
          $servicio = Servicios::where('estatus','=',1)->where('tipo','=','ECOGRAFIA')->get();
        } else if($atencion->tipo_atencion == 8) {
          $servicio = Servicios::where('estatus','=',1)->where('tipo','=','SALUD')->get();
        } else {
          $servicio = Servicios::where('estatus','=',1)->where('tipo','=','RAYOS')->get();
        }

        if ($atencion->tipo_origen == 1) {
          $usuario = User::where('estatus', '=', 1)->where('tipo', '=', 1)->where('tipo_personal', '=', 'ProfSalud')->get();
        } else {
          $usuario = User::where('estatus', '=', 1)->where('tipo', '=', 2)->get();
        }




        return view('atenciones.editsa', compact('atencion','servicio','usuario')); //
    }


    public function editl($id)
    {
          $atencion = Atenciones::where('id','=',$id)->first();

          $analisis = Analisis::where('estatus','=',1)->get();
     
        if ($atencion->tipo_origen == 1) {
          $usuario = User::where('estatus', '=', 1)->where('tipo', '=', 1)->where('tipo_personal', '=', 'ProfSalud')->get();
        } else {
          $usuario = User::where('estatus', '=', 1)->where('tipo', '=', 2)->get();
        }




        return view('atenciones.editl', compact('atencion','analisis','usuario')); //
    }

    
    public function editp($id)
    {
          $atencion = Atenciones::where('id','=',$id)->first();

     
        if ($atencion->tipo_origen == 1) {
          $usuario = User::where('estatus', '=', 1)->where('tipo', '=', 1)->where('tipo_personal', '=', 'ProfSalud')->get();
        } else {
          $usuario = User::where('estatus', '=', 1)->where('tipo', '=', 2)->get();
        }




        return view('atenciones.editp', compact('atencion','usuario')); //
    }

    public function editc($id)
    {
          $atencion = Atenciones::where('id','=',$id)->first();

          $consulta = Consultas::where('id_atencion','=',$id)->first();

          
       // $met = MetoPro::where('estatus','=',1)->get();

        $personal = User::where('estatus','=',1)->where('tipo','=',1)->where('tipo_personal','=','Especialista')->get();


        return view('atenciones.editc', compact('atencion','personal','consulta')); //
    }

    public function editm($id)
    {
          $atencion = Atenciones::where('id','=',$id)->first();

          $met = Metodos::where('id_atencion','=',$id)->first();


          
        $metodos = MetoPro::where('estatus','=',1)->get();

       // $personal = User::where('estatus','=',1)->where('tipo','=',1)->where('tipo_personal','=','Especialista')->get();


        return view('atenciones.editm', compact('atencion','metodos','met')); //
    }





    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clientes  $Clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {


       

      $p = Atenciones::find($request->id);
      $p->monto =$request->monto;
      $p->abono =$request->abono;
      $p->tipo_pago =$request->tipo_pago;
    
      $res = $p->update();
    
    
    return redirect()->action('AtencionesController@index')
    ->with('success','Modificado Exitosamente!');

        //
    }

    public function updates(Request $request)
    {

      $totalabono = $request->abono1 + $request->abono2;

      if($totalabono > $request->monto){
        $request->session()->flash('error', 'El monto del abono es mayor al monto total.');
        return back();
      } 

     // dd($request->monto);

      $serv = Servicios::where('id','=',$request->id_tipo)->first();
      $rsfd = ResultadosServicios::where('id_atencion','=',$request->id)->first();
      $atenciod = Atenciones::where('id','=',$request->id)->first();


      $sesio = Sesiones::where('id_atencion','=',$request->id)->get();
      if ($sesio != null) {
          foreach ($sesio as $rs) {
              $id_rs = $rs->id;
              if (!is_null($id_rs)) {
                  $rsf = Sesiones::where('id', '=', $id_rs)->first();
                  $rsf->delete();
              }
          }
      }

      
      $contador=0;
                      
      if ($serv->sesiones != 0) {
          while ($contador < $serv->sesiones) {
              $ses = new Sesiones();
              $ses->id_paciente =   $atenciod->id_paciente;
              $ses->id_atencion =  $atenciod->id;
              $ses->monto = '50';
              $ses->save();

              $contador++;
          }
      }

      if ($rsfd != null) {
          $rsf = ResultadosServicios::where('id_atencion', '=', $request->id)->first();
          $rsf->id_servicio = $request->id_tipo;
          $rsf->save();
      }

      $cob = Cobrar::where('id_atencion','=',$request->id)->first();
      if($cob != null){
        $hcob = HistorialCobros::where('id_cobro', '=', $request->id)->first();
        if ($hcob != null) {
            $hcobf = HistorialCobros::where('id_cobro', '=', $request->id)->first();
            $hcobf->delete();
        }
          $cobf = Cobrar::where('id_atencion', '=', $request->id)->first();
          $cobf->delete();
      }

      $creditosa = Creditos::where('id_atencion','=',$request->id)->get();


      //ELIMINAR CREDITOS

      foreach ($creditosa as $cred) {
        $id_credito = $cred->id;
        if (!is_null($id_credito)) {
            $rsf = Creditos::where('id', '=', $id_credito)->first();
            $rsf->delete();
        }
    }

    //GUARDANDO CREDITOS

      $creditos =  new Creditos();
      $creditos->monto = $request->abono1;
      $creditos->tipopago =$request->tipo_pago;
      $creditos->id_atencion =$request->id;
      $creditos->usuario =Auth::user()->id;
      $creditos->sede =$request->session()->get('sede');
      $creditos->origen = 'SERVICIO';
      $creditos->descripcion = 'INGRESO POR SERVICIO';
      $creditos->fecha = $atenciod->created_at;
      $creditos->created_at = $atenciod->created_at;
      if ($request->tipo_pago == 'EF') {
        $creditos->efectivo = $request->abono1;
        $creditos->tarjeta = '0';
        $creditos->dep = '0';
        $creditos->yap = '0';
      } elseif($request->tipo_pago == 'TJ') {
        $creditos->tarjeta = $request->abono1;
        $creditos->efectivo = '0';
        $creditos->dep = '0';
        $creditos->yap = '0';
      } elseif($request->tipo_pago == 'DP') {
        $creditos->dep = $request->abono1;
        $creditos->efectivo = '0';
        $creditos->tarjeta = '0';
        $creditos->yap = '0';
      } else {
        $creditos->efectivo = '0';
        $creditos->tarjeta = '0';
        $creditos->dep = '0';
        $creditos->yap = $request->abono1;
      }
      $creditos->save();

      if($request->abono2 != null){
        $creditos2 =  new Creditos();
      $creditos2->monto = $request->abono2;
      $creditos2->tipopago =$request->tipo_pago1;
      $creditos2->usuario =Auth::user()->id;
      $creditos2->sede =$request->session()->get('sede');
      $creditos2->fecha = $atenciod->created_at;
      $creditos2->created_at = $atenciod->created_at;
      $creditos2->origen = 'SERVICIO';
      $creditos2->descripcion = 'INGRESO POR SERVICIO';
      $creditos2->id_atencion =$request->id;
      if ($request->tipo_pago1 == 'EF') {
        $creditos2->efectivo = $request->abono2;
        $creditos2->tarjeta = '0';
        $creditos2->dep = '0';
        $creditos2->yap = '0';
      } elseif($request->tipo_pago1 == 'TJ') {
        $creditos2->tarjeta = $request->abono2;
        $creditos2->efectivo = '0';
        $creditos2->dep = '0';
        $creditos2->yap = '0';
      } elseif($request->tipo_pago1 == 'DP') {
        $creditos2->dep = $request->abono2;
        $creditos2->efectivo = '0';
        $creditos2->tarjeta = '0';
        $creditos->yap = '0';
      } else {
        $creditos2->efectivo = '0';
        $creditos2->tarjeta = '0';
        $creditos2->dep = '0';
        $creditos2->yap = $request->abono2;
      }
      $creditos2->save();

      }


      $csf1 = Comisiones::where('id_atencion','=',$request->id)->where('tecnologo','=',0)->get();
      if ($csf1 != null) {
         /* $csf = Comisiones::where('id_atencion', '=', $request->id)->first();
          $csf->delete();*/

          foreach ($csf1 as $rs) {
            $id_cms = $rs->id;
            if (!is_null($id_cms)) {
                $rsf = Comisiones::where('id', '=', $id_cms)->first();
                $rsf->delete();
            }
        }

      }

      $sesio = Sesiones::where('id_atencion','=',$request->id)->first();
      if ($sesio != null) {
          $ses = Sesiones::where('id_atencion', '=', $request->id)->first();
          $ses->delete();
      }

      if($request->tipo_origen == 1 && $serv->porcentaje > 0){

        $com = new Comisiones();
        $com->id_atencion = $request->id;
        $com->porcentaje =$serv->porcentaje;
        $com->id_responsable = $request->origen_usuario != null ? $request->origen_usuario : $request->origen_usuario2;
        $com->id_origen = $request->tipo_origen;
        $com->detalle =  $serv->nombre;
        $com->monto = $request->monto * $serv->porcentaje / 100;
        $com->estatus = 1;
        $com->usuario = Auth::user()->id;
        $com->sede = $request->session()->get('sede');
        $com->save();

       /* $csf = Comisiones::where('id_atencion','=',$request->id)->first();
        $csf->detalle = $serv->nombre;
        $csf->porcentaje = $serv->porcentaje;
        $csf->monto = $request->monto * $serv->porcentaje / 100;
        $csf->save();*/

      } else if($request->tipo_origen == 2 && $serv->porcentaje1 > 0){

        $com = new Comisiones();
        $com->id_atencion = $request->id;
        $com->porcentaje =$serv->porcentaje1;
        $com->detalle =  $serv->nombre;
        $com->id_responsable = $request->origen_usuario != null ? $request->origen_usuario : $request->origen_usuario2;
        $com->id_origen = $request->tipo_origen;
        $com->monto = $request->monto * $serv->porcentaje1 / 100;
        $com->estatus = 1;
        $com->usuario = Auth::user()->id;
        $com->sede = $request->session()->get('sede');
        $com->save();

       /* $csf = Comisiones::where('id_atencion','=',$request->id)->first();
        $csf->porcentaje = $serv->nombre;
        $csf->monto =  $request->monto * $serv->porcentaje1 / 100;
        $csf->detalle = $serv->porcentaje1;
        $csf->save();*/

      } else {

      }

      
      if($request->monto > $totalabono){

        $cb = new Cobrar();
        $cb->id_atencion =  $request->id;
        $cb->detalle =  $serv->nombre;
        $cb->resta =$request->monto - $totalabono;
        $cb->save();
    
      }

      $p = Atenciones::find($request->id);
      $p->monto =$request->monto;
      $p->abono =$totalabono;
      $p->abono1 =$request->abono1;
      $p->abono2 =$request->abono2;
      $p->resta =$request->monto - $totalabono;
      $p->tipo_pago =$request->tipo_pago;
      $p->tipo_pago1 =$request->tipo_pago1;
      $p->tipo_origen =$request->tipo_origen;
      if($request->tipo_origen == 3){
        $p->id_origen =99;
      }else{
        $p->id_origen = $request->origen_usuario != null ? $request->origen_usuario : $request->origen_usuario2;
      }  
      $p->id_tipo =$request->id_tipo;
      $res = $p->update();
    
      return redirect()->action('AtencionesController@index')
      ->with('success','Modificado Exitosamente!');

    }

    public function updatel(Request $request)
    {

      $totalabono = $request->abono1 + $request->abono2;

      if($totalabono > $request->monto){
        $request->session()->flash('error', 'El monto del abono es mayor al monto total.');
        return back();
      } 


      $serv = Analisis::where('id','=',$request->id_tipo)->first();
      $atenciod = Atenciones::where('id','=',$request->id)->first();

      $rsf = ResultadosLaboratorio::where('id_atencion','=',$request->id)->first();
      $rsf->id_laboratorio = $request->id_tipo;
      $rsf->save();

     

      $csf1 = Comisiones::where('id_atencion','=',$request->id)->first();

      if($csf1 != null){
        $csf = Comisiones::where('id_atencion','=',$request->id)->first();
        $csf->delete();

      }

      $creditosa = Creditos::where('id_atencion','=',$request->id)->get();


      //ELIMINAR CREDITOS

      foreach ($creditosa as $cred) {
        $id_credito = $cred->id;
        if (!is_null($id_credito)) {
            $rsf = Creditos::where('id', '=', $id_credito)->first();
            $rsf->delete();
        }
    }

    //GUARDANDO CREDITOS

      $creditos =  new Creditos();
      $creditos->monto = $request->abono1;
      $creditos->tipopago =$request->tipo_pago;
      $creditos->id_atencion =$request->id;
      $creditos->usuario =Auth::user()->id;
      $creditos->sede =$request->session()->get('sede');
      $creditos->origen = 'ANALISIS';
      $creditos->descripcion = 'INGRESO POR ANALISIS';
      $creditos->fecha = $atenciod->created_at;
      $creditos->created_at = $atenciod->created_at;
      if ($request->tipo_pago == 'EF') {
        $creditos->efectivo = $request->abono1;
        $creditos->tarjeta = '0';
        $creditos->dep = '0';
        $creditos->yap = '0';
      } elseif($request->tipo_pago == 'TJ') {
        $creditos->tarjeta = $request->abono1;
        $creditos->efectivo = '0';
        $creditos->dep = '0';
        $creditos->yap = '0';
      } elseif($request->tipo_pago == 'DP') {
        $creditos->dep = $request->abono1;
        $creditos->efectivo = '0';
        $creditos->tarjeta = '0';
        $creditos->yap = '0';
      } else {
        $creditos->efectivo = '0';
        $creditos->tarjeta = '0';
        $creditos->dep = '0';
        $creditos->yap = $request->abono1;
      }
      $creditos->save();

      if($request->abono2 != null){
        $creditos2 =  new Creditos();
      $creditos2->monto = $request->abono2;
      $creditos2->tipopago =$request->tipo_pago1;
      $creditos2->usuario =Auth::user()->id;
      $creditos2->sede =$request->session()->get('sede');
      $creditos2->fecha = $atenciod->created_at;
      $creditos2->created_at = $atenciod->created_at;
      $creditos2->origen = 'ANALISIS';
      $creditos2->descripcion = 'INGRESO POR ANALISIS';
      $creditos2->id_atencion =$request->id;
      if ($request->tipo_pago1 == 'EF') {
        $creditos2->efectivo = $request->abono2;
        $creditos2->tarjeta = '0';
        $creditos2->dep = '0';
        $creditos2->yap = '0';
      } elseif($request->tipo_pago1 == 'TJ') {
        $creditos2->tarjeta = $request->abono2;
        $creditos2->efectivo = '0';
        $creditos2->dep = '0';
        $creditos2->yap = '0';
      } elseif($request->tipo_pago1 == 'DP') {
        $creditos2->dep = $request->abono2;
        $creditos2->efectivo = '0';
        $creditos2->tarjeta = '0';
        $creditos->yap = '0';
      } else {
        $creditos2->efectivo = '0';
        $creditos2->tarjeta = '0';
        $creditos2->dep = '0';
        $creditos2->yap = $request->abono2;
      }
      $creditos2->save();

      }
     

      if($request->tipo_origen == 2 && $serv->porcentaje > 0){

        $com = new Comisiones();
        $com->id_atencion = $request->id;
        $com->porcentaje =$serv->porcentaje;
        $com->detalle =  $serv->nombre;
        $com->id_origen = $request->tipo_origen;
        $com->id_responsable = $request->origen_usuario != null ? $request->origen_usuario : $request->origen_usuario2;
        $com->monto = $request->monto * $serv->porcentaje / 100;
        $com->estatus = 1;
        $com->usuario = Auth::user()->id;
        $com->sede = $request->session()->get('sede');
        $com->save();

      } 

      $cob = Cobrar::where('id_atencion','=',$request->id)->first();
      if($cob != null){
        $hcob = HistorialCobros::where('id_cobro', '=', $request->id)->first();
        if ($hcob != null) {
            $hcobf = HistorialCobros::where('id_cobro', '=', $request->id)->first();
            $hcobf->delete();
        }
          $cobf = Cobrar::where('id_atencion', '=', $request->id)->first();
          $cobf->delete();
      }

      if($request->monto > $totalabono){

        $cb = new Cobrar();
        $cb->id_atencion =  $request->id;
        $cb->detalle =  $serv->nombre;
        $cb->resta =$request->monto - $totalabono;
        $cb->save();
    
      }


      $p = Atenciones::find($request->id);
      $p->monto =$request->monto;
      $p->abono =$totalabono;
      $p->abono1 =$request->abono1;
      $p->abono2 =$request->abono2;
      $p->resta =$request->monto - $totalabono;
      $p->tipo_pago =$request->tipo_pago;
      $p->tipo_pago1 =$request->tipo_pago1;
      $p->tipo_origen =$request->tipo_origen;
      if($request->tipo_origen == 3){
        $p->id_origen =99;
      }else{
        $p->id_origen = $request->origen_usuario != null ? $request->origen_usuario : $request->origen_usuario2;
      }         
      $p->id_tipo =$request->id_tipo;
      $res = $p->update();
    
        return redirect()->action('AtencionesController@index')
        ->with('success','Modificado Exitosamente!');

        //
    }

    public function updatep(Request $request)
    {

      $totalabono = $request->abono1 + $request->abono2;

      if($totalabono > $request->monto){
        $request->session()->flash('error', 'El monto del abono es mayor al monto total.');
        return back();
      } 


      $atenciod = Atenciones::where('id','=',$request->id)->first();


      $com = Comisiones::where('id_atencion','=',$request->id)->first();

      $serv = Paquetes::where('id','=',$request->id_tipo)->first();


      $creditosa = Creditos::where('id_atencion','=',$request->id)->get();


      //ELIMINAR CREDITOS

      foreach ($creditosa as $cred) {
        $id_credito = $cred->id;
        if (!is_null($id_credito)) {
            $rsf = Creditos::where('id', '=', $id_credito)->first();
            $rsf->delete();
        }
    }

    //GUARDANDO CREDITOS

      $creditos =  new Creditos();
      $creditos->monto = $request->abono1;
      $creditos->tipopago =$request->tipo_pago;
      $creditos->id_atencion =$request->id;
      $creditos->usuario =Auth::user()->id;
      $creditos->sede =$request->session()->get('sede');
      $creditos->origen = 'PAQUETES';
      $creditos->descripcion = 'INGRESO POR PAQUETE';
      $creditos->fecha = $atenciod->created_at;
      $creditos->created_at = $atenciod->created_at;
      if ($request->tipo_pago == 'EF') {
        $creditos->efectivo = $request->abono1;
        $creditos->tarjeta = '0';
        $creditos->dep = '0';
        $creditos->yap = '0';
      } elseif($request->tipo_pago == 'TJ') {
        $creditos->tarjeta = $request->abono1;
        $creditos->efectivo = '0';
        $creditos->dep = '0';
        $creditos->yap = '0';
      } elseif($request->tipo_pago == 'DP') {
        $creditos->dep = $request->abono1;
        $creditos->efectivo = '0';
        $creditos->tarjeta = '0';
        $creditos->yap = '0';
      } else {
        $creditos->efectivo = '0';
        $creditos->tarjeta = '0';
        $creditos->dep = '0';
        $creditos->yap = $request->abono1;
      }
      $creditos->save();

      if($request->abono2 != null){
      $creditos2 =  new Creditos();
      $creditos2->monto = $request->abono2;
      $creditos2->tipopago =$request->tipo_pago1;
      $creditos2->usuario =Auth::user()->id;
      $creditos2->sede =$request->session()->get('sede');
      $creditos2->fecha = $atenciod->created_at;
      $creditos2->created_at = $atenciod->created_at;
      $creditos2->origen = 'PAQUETES';
      $creditos2->descripcion = 'INGRESO POR PAQUETE';
      $creditos2->id_atencion =$request->id;
      if ($request->tipo_pago1 == 'EF') {
        $creditos2->efectivo = $request->abono2;
        $creditos2->tarjeta = '0';
        $creditos2->dep = '0';
        $creditos2->yap = '0';
      } elseif($request->tipo_pago1 == 'TJ') {
        $creditos2->tarjeta = $request->abono2;
        $creditos2->efectivo = '0';
        $creditos2->dep = '0';
        $creditos2->yap = '0';
      } elseif($request->tipo_pago1 == 'DP') {
        $creditos2->dep = $request->abono2;
        $creditos2->efectivo = '0';
        $creditos2->tarjeta = '0';
        $creditos2->yap = '0';
      } else {
        $creditos2->efectivo = '0';
        $creditos2->tarjeta = '0';
        $creditos2->dep = '0';
        $creditos2->yap = $request->abono2;
      }
      $creditos2->save();

      }
     


   /*   if($atenciod->created_at->format('Y-m-d') == date('Y-m-d')){
          $creditos = Creditos::where('id_atencion','=',$request->id)->first();
          $creditos->monto = $request->abono;
          $creditos->tipopago =$request->tipo_pago;
          if ($request->tipo_pago == 'EF') {
            $creditos->efectivo = $request->abono;
            $creditos->tarjeta = '0';
            $creditos->dep = '0';
            $creditos->yap = '0';
          } elseif($request->tipo_pago == 'TJ') {
            $creditos->tarjeta = $request->abono;
            $creditos->efectivo = '0';
            $creditos->dep = '0';
            $creditos->yap = '0';
          } elseif($request->tipo_pago == 'DP') {
            $creditos->dep = $request->abono;
            $creditos->efectivo = '0';
            $creditos->tarjeta = '0';
            $creditos->yap = '0';
          } else {
            $creditos->efectivo = '0';
            $creditos->tarjeta = '0';
            $creditos->dep = '0';
            $creditos->yap = $request->abono;
          }
          $creditos->save();

    }

      $creditos = CreditosB::where('id_atencion','=',$request->id)->first();
      $creditos->monto = $request->abono;
      $creditos->tipopago =$request->tipo_pago;
      if ($request->tipo_pago == 'EF') {
        $creditos->efectivo = $request->abono;
        $creditos->tarjeta = '0';
        $creditos->dep = '0';
        $creditos->yap = '0';
      } elseif($request->tipo_pago == 'TJ') {
        $creditos->tarjeta = $request->abono;
        $creditos->efectivo = '0';
        $creditos->dep = '0';
        $creditos->yap = '0';
      } elseif($request->tipo_pago == 'DP') {
        $creditos->dep = $request->abono;
        $creditos->efectivo = '0';
        $creditos->tarjeta = '0';
        $creditos->yap = '0';
      } else {
        $creditos->efectivo = '0';
        $creditos->tarjeta = '0';
        $creditos->dep = '0';
        $creditos->yap = $request->abono;
      }
      $creditos->save();*/


      if($request->tipo_origen == 1){
        if($com != null){
        $csf = Comisiones::where('id_atencion','=',$request->id)->first();
        $csf->monto = $request->monto * $com->porcentaje / 100;
        $csf->id_responsable = $request->origen_usuario != null ? $request->origen_usuario : $request->origen_usuario2;
        $csf->id_origen = $request->tipo_origen;
        $csf->save();
      }

      } else if($request->tipo_origen == 2){

        if($com != null){
        $csf = Comisiones::where('id_atencion','=',$request->id)->first();
        $csf->monto =  $request->monto * $com->porcentaje / 100;
        $csf->id_origen = $request->tipo_origen;
        $csf->id_responsable = $request->origen_usuario != null ? $request->origen_usuario : $request->origen_usuario2;
        $csf->save();
      }

      } else {

      }

      $cob = Cobrar::where('id_atencion','=',$request->id)->first();
      if($cob != null){
        $hcob = HistorialCobros::where('id_cobro', '=', $request->id)->first();
        if ($hcob != null) {
            $hcobf = HistorialCobros::where('id_cobro', '=', $request->id)->first();
            $hcobf->delete();
        }
          $cobf = Cobrar::where('id_atencion', '=', $request->id)->first();
          $cobf->delete();
      }

      if($request->monto > $totalabono){

        $cb = new Cobrar();
        $cb->id_atencion =  $request->id;
        $cb->detalle =  $serv->nombre;
        $cb->resta =$request->monto - $totalabono;
        $cb->save();
    
      }



      $p = Atenciones::find($request->id);
      $p->monto =$request->monto;
      $p->abono =$totalabono;
      $p->abono1 =$request->abono1;
      $p->abono2 =$request->abono2;
      $p->resta =$request->monto - $totalabono;
      $p->tipo_pago =$request->tipo_pago;
      $p->tipo_pago1 =$request->tipo_pago1;
      $p->tipo_origen =$request->tipo_origen;
      if($request->tipo_origen == 3){
        $p->id_origen =99;
      }else{
        $p->id_origen = $request->origen_usuario != null ? $request->origen_usuario : $request->origen_usuario2;
      }        
      $res = $p->update();
    
        return redirect()->action('AtencionesController@index')
        ->with('success','Modificado Exitosamente!');

        //
    }

    public function updatec(Request $request)
    {

      $totalabono = $request->abono1 + $request->abono2;

      if($totalabono > $request->monto){
        $request->session()->flash('error', 'El monto del abono es mayor al monto total.');
        return back();
      } 


      $p = Consultas::where('id_atencion','=',$request->id)->first();
      $p->id_especialista =$request->especialista;
      $p->monto =$request->monto;
      $p->tipo =$request->tipo;
      $res = $p->update();
      
      $atenciod = Atenciones::where('id','=',$request->id)->first();
      $creditosa = Creditos::where('id_atencion','=',$request->id)->get();


      //ELIMINAR CREDITOS

      foreach ($creditosa as $cred) {
        $id_credito = $cred->id;
        if (!is_null($id_credito)) {
            $rsf = Creditos::where('id', '=', $id_credito)->first();
            $rsf->delete();
        }
    }

    //GUARDANDO CREDITOS

      $creditos =  new Creditos();
      $creditos->monto = $request->abono1;
      $creditos->tipopago =$request->tipo_pago;
      $creditos->id_atencion =$request->id;
      $creditos->usuario =Auth::user()->id;
      $creditos->sede =$request->session()->get('sede');
      $creditos->origen = 'CONSULTAS';
      $creditos->descripcion = 'INGRESO POR CONSULTA';
      $creditos->fecha = $atenciod->created_at;
      $creditos->created_at = $atenciod->created_at;
      if ($request->tipo_pago == 'EF') {
        $creditos->efectivo = $request->abono1;
        $creditos->tarjeta = '0';
        $creditos->dep = '0';
        $creditos->yap = '0';
      } elseif($request->tipo_pago == 'TJ') {
        $creditos->tarjeta = $request->abono1;
        $creditos->efectivo = '0';
        $creditos->dep = '0';
        $creditos->yap = '0';
      } elseif($request->tipo_pago == 'DP') {
        $creditos->dep = $request->abono1;
        $creditos->efectivo = '0';
        $creditos->tarjeta = '0';
        $creditos->yap = '0';
      } else {
        $creditos->efectivo = '0';
        $creditos->tarjeta = '0';
        $creditos->dep = '0';
        $creditos->yap = $request->abono1;
      }
      $creditos->save();

      if($request->abono2 != null){
        $creditos2 =  new Creditos();
      $creditos2->monto = $request->abono2;
      $creditos2->tipopago =$request->tipo_pago1;
      $creditos2->usuario =Auth::user()->id;
      $creditos2->sede =$request->session()->get('sede');
      $creditos2->fecha = $atenciod->created_at;
      $creditos2->created_at = $atenciod->created_at;
      $creditos2->origen = 'CONSULTAS';
      $creditos2->descripcion = 'INGRESO POR CONSULTA';
      $creditos2->id_atencion =$request->id;
      if ($request->tipo_pago1 == 'EF') {
        $creditos2->efectivo = $request->abono2;
        $creditos2->tarjeta = '0';
        $creditos2->dep = '0';
        $creditos2->yap = '0';
      } elseif($request->tipo_pago1 == 'TJ') {
        $creditos2->tarjeta = $request->abono2;
        $creditos2->efectivo = '0';
        $creditos2->dep = '0';
        $creditos2->yap = '0';
      } elseif($request->tipo_pago1 == 'DP') {
        $creditos2->dep = $request->abono2;
        $creditos2->efectivo = '0';
        $creditos2->tarjeta = '0';
        $creditos->yap = '0';
      } else {
        $creditos2->efectivo = '0';
        $creditos2->tarjeta = '0';
        $creditos2->dep = '0';
        $creditos2->yap = $request->abono2;
      }
      $creditos2->save();

      }

      //CUENTAS POR COBRAR

      $cob = Cobrar::where('id_atencion','=',$request->id)->first();
      if($cob != null){
        $hcob = HistorialCobros::where('id_cobro', '=', $request->id)->first();
        if ($hcob != null) {
            $hcobf = HistorialCobros::where('id_cobro', '=', $request->id)->first();
            $hcobf->delete();
        }
          $cobf = Cobrar::where('id_atencion', '=', $request->id)->first();
          $cobf->delete();
      }

      if($request->monto > $totalabono){

        $cb = new Cobrar();
        $cb->id_atencion =  $request->id;
        $cb->detalle =  "CONSULTA";
        $cb->resta =$request->monto - $totalabono;
        $cb->save();
    
      }


  

      $p = Atenciones::find($request->id);
      $p->monto =$request->monto;
      $p->abono =$totalabono;
      $p->abono1 =$request->abono1;
      $p->abono2 =$request->abono2;
      $p->resta =$request->monto - $totalabono;
      $p->tipo_pago =$request->tipo_pago;
      $p->tipo_pago1 =$request->tipo_pago1;
      $p->id_tipo =$request->tipo;
      $res = $p->update();
    
        return redirect()->action('AtencionesController@index')
        ->with('success','Modificado Exitosamente!');

        //
    }

    public function updatem(Request $request)
    {

      $totalabono = $request->abono1 + $request->abono2;

      if($totalabono > $request->monto){
        $request->session()->flash('error', 'El monto del abono es mayor al monto total.');
        return back();
      } 

      $m = Metodos::where('id_atencion','=',$request->id)->first();
      $m->id_producto =$request->metodo;
      $m->monto =$request->monto;
      $resm = $m->update();

      $atenciod = Atenciones::where('id','=',$request->id)->first();
      $creditosa = Creditos::where('id_atencion','=',$request->id)->get();


      //ELIMINAR CREDITOS

      foreach ($creditosa as $cred) {
        $id_credito = $cred->id;
        if (!is_null($id_credito)) {
            $rsf = Creditos::where('id', '=', $id_credito)->first();
            $rsf->delete();
        }
    }

    //GUARDANDO CREDITOS

      $creditos =  new Creditos();
      $creditos->monto = $request->abono1;
      $creditos->tipopago =$request->tipo_pago;
      $creditos->id_atencion =$request->id;
      $creditos->usuario =Auth::user()->id;
      $creditos->sede =$request->session()->get('sede');
      $creditos->origen = 'METODO';
      $creditos->descripcion = 'INGRESO POR METODO';
      $creditos->fecha = $atenciod->created_at;
      $creditos->created_at = $atenciod->created_at;
      if ($request->tipo_pago == 'EF') {
        $creditos->efectivo = $request->abono1;
        $creditos->tarjeta = '0';
        $creditos->dep = '0';
        $creditos->yap = '0';
      } elseif($request->tipo_pago == 'TJ') {
        $creditos->tarjeta = $request->abono1;
        $creditos->efectivo = '0';
        $creditos->dep = '0';
        $creditos->yap = '0';
      } elseif($request->tipo_pago == 'DP') {
        $creditos->dep = $request->abono1;
        $creditos->efectivo = '0';
        $creditos->tarjeta = '0';
        $creditos->yap = '0';
      } else {
        $creditos->efectivo = '0';
        $creditos->tarjeta = '0';
        $creditos->dep = '0';
        $creditos->yap = $request->abono1;
      }
      $creditos->save();

      if($request->abono2 != null){
        $creditos2 =  new Creditos();
      $creditos2->monto = $request->abono2;
      $creditos2->tipopago =$request->tipo_pago1;
      $creditos2->usuario =Auth::user()->id;
      $creditos2->sede =$request->session()->get('sede');
      $creditos2->fecha = $atenciod->created_at;
      $creditos2->created_at = $atenciod->created_at;
      $creditos2->origen = 'METODO';
      $creditos2->descripcion = 'INGRESO POR METODO';
      $creditos2->id_atencion =$request->id;
      if ($request->tipo_pago1 == 'EF') {
        $creditos2->efectivo = $request->abono2;
        $creditos2->tarjeta = '0';
        $creditos2->dep = '0';
        $creditos2->yap = '0';
      } elseif($request->tipo_pago1 == 'TJ') {
        $creditos2->tarjeta = $request->abono2;
        $creditos2->efectivo = '0';
        $creditos2->dep = '0';
        $creditos2->yap = '0';
      } elseif($request->tipo_pago1 == 'DP') {
        $creditos2->dep = $request->abono2;
        $creditos2->efectivo = '0';
        $creditos2->tarjeta = '0';
        $creditos->yap = '0';
      } else {
        $creditos2->efectivo = '0';
        $creditos2->tarjeta = '0';
        $creditos2->dep = '0';
        $creditos2->yap = $request->abono2;
      }
      $creditos2->save();

      }

       //CUENTAS POR COBRAR

       $cob = Cobrar::where('id_atencion','=',$request->id)->first();
       if($cob != null){
         $hcob = HistorialCobros::where('id_cobro', '=', $request->id)->first();
         if ($hcob != null) {
             $hcobf = HistorialCobros::where('id_cobro', '=', $request->id)->first();
             $hcobf->delete();
         }
           $cobf = Cobrar::where('id_atencion', '=', $request->id)->first();
           $cobf->delete();
       }
 
       if($request->monto > $totalabono){
 
         $cb = new Cobrar();
         $cb->id_atencion =  $request->id;
         $cb->detalle =  "MÈTODO ANTICONCEPTIVO";
         $cb->resta =$request->monto - $totalabono;
         $cb->save();
     
       }
 
 

     

      $p = Atenciones::find($request->id);
      $p->monto =$request->monto;
      $p->abono =$totalabono;
      $p->abono1 =$request->abono1;
      $p->abono2 =$request->abono2;
      $p->resta =$request->monto - $totalabono;
      $p->tipo_pago =$request->tipo_pago;
      $p->tipo_pago1 =$request->tipo_pago1;
      $p->id_tipo = $request->metodo;
      $res = $p->update();
    
        return redirect()->action('AtencionesController@index')
        ->with('success','Modificado Exitosamente!');

        //
    }

   

  

    public function sesiones1(Request $request)
    {

      if ($request->id_paciente != null) {

      

        $sesiones = DB::table('sesiones as a')
        ->select('a.id', 'a.id_atencion','a.id_paciente','a.created_at', 'a.estatus','b.nombres','b.apellidos','b.dni','s.nombre as servicio')
        ->join('pacientes as b', 'b.id', 'a.id_paciente')
        ->join('servicios as s', 's.id', 'a.id_atencion')
        ->where('a.estatus', '=',0)
        ->where('a.id_paciente','=', $request->id_paciente)
        ->get();


    } else {

        $f1 = date('Y-m-d');
        $f2 = date('Y-m-d');


        $sesiones = DB::table('sesiones as a')
        ->select('a.id', 'a.id_atencion','a.created_at', 'a.estatus','at.id_tipo','at.id_paciente','b.nombres','b.apellidos','b.dni','s.nombre as servicio')
        ->join('atenciones as at', 'at.id', 'a.id_atencion')
        ->join('pacientes as b', 'b.id', 'at.id_paciente')
        ->join('servicios as s', 's.id', 'at.id_tipo')
        ->where('a.estatus', '=',0)
        ->where('a.id_paciente','=', 'CCCCCCC')
       // ->whereBetween('a.created_at', [$f1, $f2])
        ->get();


    }

    if(!is_null($request->filtro)){
      $pacientes =Pacientes::where("estatus", '=', 1)->where('apellidos','like','%'.$request->filtro.'%')->orderby('apellidos','asc')->get();
      }else{
      $pacientes =Pacientes::where("estatus", '=', 9)->orderby('nombres','asc')->get();
      }

      $personal = User::where('estatus','=',1)->where('tipo','=',1)->where('tipo_personal','=','ProfSalud')->orderBy('lastname','ASC')->get();





    

      return view('sesiones.index', compact('sesiones','pacientes','personal'));
       
    }

    public function sesiones2(Request $request)
    {

      if ($request->id_paciente != null) {
      

        $sesiones = DB::table('sesiones as a')
        ->select('a.id', 'a.id_atencion','a.id_paciente','a.created_at', 'a.id_personal','a.estatus','b.nombres','b.apellidos','b.dni','s.nombre as servicio','u.name','u.lastname')
        ->join('pacientes as b', 'b.id', 'a.id_paciente')
        ->join('servicios as s', 's.id', 'a.id_atencion')
        ->join('users as u', 'u.id', 'a.id_personal')
        ->where('a.estatus', '=',1)
        ->where('a.id_paciente','=', $request->id_paciente)
        ->get();


    } else {

        $f1 = date('Y-m-d');
        $f2 = date('Y-m-d');


        $sesiones = DB::table('sesiones as a')
        ->select('a.id', 'a.id_atencion','a.created_at', 'a.id_personal','a.estatus','at.id_tipo','at.id_paciente','b.nombres','b.apellidos','b.dni','s.nombre as servicio','u.name','u.lastname')
        ->join('atenciones as at', 'at.id', 'a.id_atencion')
        ->join('pacientes as b', 'b.id', 'at.id_paciente')
        ->join('servicios as s', 's.id', 'at.id_tipo')
        ->join('users as u', 'u.id', 'a.id_personal')
        ->where('a.estatus', '=',1)
        ->where('a.id_paciente','=', 'CCCCCCC')
       // ->whereBetween('a.created_at', [$f1, $f2])
        ->get();


    }

    if(!is_null($request->filtro)){
      $pacientes =Pacientes::where("estatus", '=', 1)->where('apellidos','like','%'.$request->filtro.'%')->orderby('apellidos','asc')->get();
      }else{
      $pacientes =Pacientes::where("estatus", '=', 9)->orderby('nombres','asc')->get();
      }

      $personal = User::where('estatus','=',1)->where('tipo','=',1)->where('tipo_personal','=','ProfSalud')->orderBy('lastname','ASC')->get();





      return view('sesiones.index1', compact('sesiones','pacientes','personal'));
       
    }

    public function atender_sesion(Request $request)
    {

      $pr = Sesiones::where('id','=',$request->id)->first();


      $atencion = Atenciones::where('id','=',$pr->id_atencion)->first();




      $p = Sesiones::find($request->id);
      $p->estatus =1;
      $p->id_personal =$request->personal;
      $res = $p->update();

      $at = Atenciones::where('id','=',$pr->id_atencion)->first();
      $at->atendido =2;
      $rest = $at->update();

      //PARA CIRUHIA MENOR AGREGAR COMISOON DE 120 CUANDO LO ATIENDA

      if($atencion->id_tipo == 123){

        $com = new Comisiones();
        $com->id_atencion = $atencion->id;
        $com->porcentaje = '0';
        $com->detalle =  'CIRUGIA MENOR';
        $com->id_responsable = $request->personal;
        $com->id_origen = 1;
        $com->monto = 120;
        $com->estatus = 1;
        $com->usuario = Auth::user()->id;
        $com->save();



      }


    
    
    return back();

        //
    }

    public function reversar_sesion($id)
    {

      $pr = Sesiones::where('id','=',$id)->first();


      $atencion = Atenciones::where('id','=',$pr->id_atencion)->first();




      $p = Sesiones::find($id);
      $p->estatus = 0;
      $p->id_personal = null;
      $res = $p->update();

      $at = Atenciones::where('id','=',$pr->id_atencion)->first();
      $at->atendido =1;
      $rest = $at->update();

      $com = Comisiones::where('id_atencion','=',$pr->id_atencion)->first();

      if($com != null && $com->detalle == 'CIRUGIA MENOR'){
        $comi = Comisiones::where('id_atencion','=',$pr->id_atencion)->first();
        $comi->delete();

      }


      //PARA CIRUHIA MENOR AGREGAR COMISOON DE 120 CUANDO LO ATIENDA

     



    
    return back();

        //
    }

    public function guardar_archivo(Request $request){



      $usuario = DB::table('users')
      ->select('*')
      ->where('id','=', Auth::user()->id)
      ->first();  


      if (isset($request->monto_ls)) {
        foreach ($request->monto_ls['laboratorios'] as $key => $lab) {

         // dd($request->file($request->monto_ls['laboratorios'][$key]['montos']));

         /* $rs = Atenciones::where('id','=',$request->id)->first();
          $img = $request->file('informe');
          $nombre_imagen=$img->getClientOriginalName();
          $rs->usuario_archivo=Auth::user()->id;
          $rs->archivo=$nombre_imagen;
          if ($rs->save()) {
              \Storage::disk('public')->put($nombre_imagen, \File::get($img));
          }
          \DB::commit();*/

          $atec_a = new AtencionesArchivo();
          $atec_a->id_atencion =$request->id_atencion;
          $img = $request->monto_ls['laboratorios'][$key]['montos'];
          $nombre_imagen=$img->getClientOriginalName();
          $atec_a->usuario=Auth::user()->id;
          $atec_a->archivo=$nombre_imagen;
          if ($atec_a->save()) {
            \Storage::disk('public')->put($nombre_imagen, \File::get($img));
          }
          \DB::commit();

        }
      }



      /*


      $rs = Atenciones::where('id','=',$request->id)->first();
      $img = $request->file('informe');
      $nombre_imagen=$img->getClientOriginalName();
      $rs->usuario_archivo=Auth::user()->id;
      $rs->archivo=$nombre_imagen;
      if ($rs->save()) {
          \Storage::disk('public')->put($nombre_imagen, \File::get($img));
      }
      \DB::commit();*/


      return redirect()->route('atenciones.index')
      ->with('success','Creado Exitosamente!');
         
    }

    public function guardar_archivo_get($id){

      return view('atenciones.archivo', compact('id'));

    }

    public function ver_archivos($id){

      $archivos = AtencionesArchivo::where('id_atencion','=',$id)->get();

      return view('atenciones.ver_archivos', compact('archivos'));



    }

    public function eliminar_archivos($id){

      $comisionescc = AtencionesArchivo::where('id', '=', $id)->first();
      $comisionescc->delete();

      return back();

    }



 
    public function delete($id)
    {

        $searchUsuarioID = DB::table('users')
        ->select('*')
        ->where('id','=', Auth::user()->id)
        ->first();  

        $aten = Atenciones::where('id','=',$id)->first();

        

        $coms = Comisiones::where('id_atencion','=',$id)->get();


        if ($coms != null) {
          /*  $com = Comisiones::where('id_atencion', '=', $id)->first();
            $com->estatus = 0;
            $com->save();*/
            foreach ($coms as $rs) {
              $id_cm = $rs->id;
              if (!is_null($id_cm)) {
                $com = Comisiones::where('id', '=', $id_cm)->first();
                $com->delete();

              }
          }




        }





        if($aten->tipo_atencion == 5){
          $con = Consultas::where('id_atencion','=',$id)->first();
          $con->estatus = 0;
          $con->save();

        } elseif($aten->tipo_atencion == 6){
          $con = Metodos::where('id_atencion','=',$id)->first();
          $con->estatus = 0;
          $con->save();
        
        } elseif($aten->tipo_atencion == 7){

          $consultas = Consultas::where('id_atencion','=',$id)->get();
          $res = ResultadosServicios::where('id_atencion','=',$id)->get();
          $rel = ResultadosLaboratorio::where('id_atencion','=',$id)->get();



          foreach ($consultas as $con) {
            $id_consulta = $con->id;
            if(!is_null($id_consulta)){
              $con = Consultas::where('id','=',$id_consulta)->first();
              $con->estatus = 0;
              $con->save();
             }
           }

           foreach ($res as $rs) {
            $id_rs = $rs->id;
            if(!is_null($id_rs)){
              $rsf = ResultadosServicios::where('id','=',$id_rs)->first();
              $rsf->estatus = 0;
              $rsf->save();
             }
           }

           if ($rel != null) {
               foreach ($rel as $rl) {
                   $id_rl = $rl->id;
                   if (!is_null($id_rl)) {
                       $rsll = ResultadosLaboratorio::where('id', '=', $id_rl)->first();
                       $rsll->estatus = 0;
                       $rsll->save();
                   }
               }
           }

         

        } else {

        }


        $atencion = Atenciones::find($id);
        $atencion->estatus = 0;
        $atencion->eliminado_por= $searchUsuarioID->name.' '.$searchUsuarioID->lastname;
        $atencion->save();

       

        $metodo = Metodos::where('id_atencion','=',$id)->first();
        if ($metodo != null) {
            $met_el = Metodos::where('id_atencion', '=', $id)->first();
            $met_el->delete();
        }

        $cbr = Cobrar::where('id_atencion','=',$id)->first();

        if ($cbr != null) {
            $cb = Cobrar::where('id_atencion', '=', $id)->first();
            $cb->estatus = 0;
            $cb->save();
        }

        $labscheck = LaboratoriosCheck::where('atencion','=',$id)->first();

        if ($labscheck != null) {
          $lsss = LaboratoriosCheck::where('atencion', '=', $id)->first();
          $lsss->delete();
        }

       /*$placas_u = PlacasUsadas::where('atencion','=',$id)->first();

        if ($placas_u != null) {
          $pu = PlacasUsadas::where('atencion', '=', $id)->first();
          $pu->delete();
        }

        $placas_m = PlacasMalogradas::where('atencion','=',$id)->first();

        if ($placas_m != null) {
          $pm = PlacasMalogradas::where('atencion', '=', $id)->first();
          $pm->delete();
        }*/


        $sesio = Sesiones::where('id_atec','=',$id)->get();
        if ($sesio != null) {
            foreach ($sesio as $rs) {
                $id_rs = $rs->id;
                if (!is_null($id_rs)) {
                    $rsf = Sesiones::where('id', '=', $id_rs)->first();
                    $rsf->delete();
                }
            }
        }

        $creditosa = Creditos::where('id_atencion','=',$id)->get();


      //ELIMINAR CREDITOS

          foreach ($creditosa as $cred) {
            $id_credito = $cred->id;
            if (!is_null($id_credito)) {
                $rsf = Creditos::where('id', '=', $id_credito)->first();
                $rsf->delete();
            }
        }
        

       
/*
        $rs = ResultadosServicios::where('id_atencion','=',$id)->first();
        $rs->estatus = 0;
        $rs->delete();

        $rl = ResultadosLaboratorio::where('id_atencion','=',$id)->first();
        $rl->estatus = 0;
        $rl->save();*/

        return redirect()->action('AtencionesController@index')
        ->with('success','Eliminado Exitosamente!');
        //
    }
}

