<?php

namespace sisExpedientes\Http\Controllers;

use Illuminate\Http\Request;
use sisExpedientes\Http\Requests;
use sisExpedientes\Expediente;
use Illuminate\Support\Facades\Redirect;
use Session;
use Carbon\Carbon;
use DB;
use Fpdf;

class ConsultaExpedienteController extends Controller
{
    public function consulta(Request $request )
    {
        switch($request->input('valor')){
 
        case 1:
            //numero de Expediente
            $expedientes=DB::table('expediente as e')
            ->join('persona as p','e.id_persona','=','p.id_persona')
            ->select('e.id_exp','e.fecha_alta','e.caratula','p.nombre as cliente','e.abogado','estado','e.tipo')
            ->where('id_exp', 'like', ''. $request->input('dato').'%')
            ->get();

            $a=(count($expedientes));
            if ($a > 0) {
                return view("resultado",["expedientes"=>$expedientes]);
            }else {
                Session::flash('message','SIN REGISTROS PARA LOS DATOS INGRESADOS..!!!');
                return view("consulta");
            }     
            break;

        case 6:
            //por caratula
            $expedientes=DB::table('expediente as e')
            ->join('persona as p','e.id_persona','=','p.id_persona')
            ->select('e.id_exp','e.fecha_alta','e.caratula','p.nombre as cliente','e.abogado','estado','e.tipo')
            ->where('e.caratula','like', '%'. $request->input('dato').'%')
            ->orderBy('id_exp','DESC')
            ->get();

            $a=(count($expedientes));
            if ($a > 0) {
                return view("resultado",["expedientes"=>$expedientes]);
            }else {
                Session::flash('message','SIN REGISTROS PARA LOS DATOS INGRESADOS..!!!');
                return view("consulta6");
            }
            break;

        case 3:
            //por nro cuij
            $expedientes=DB::table('expediente as e')
            ->join('persona as p','e.id_persona','=','p.id_persona')
            ->select('e.id_exp','e.fecha_alta','e.caratula','p.nombre as cliente','e.abogado','estado','e.tipo')
            ->where('e.cuij','like', ''. $request->input('dato').'%')
            ->orderBy('id_exp','DESC')
            ->get();

            $a=(count($expedientes));
            if ($a > 0) {
                return view("resultado",["expedientes"=>$expedientes]);
            }else {
                Session::flash('message','SIN REGISTROS PARA LOS DATOS INGRESADOS..!!!');
                return view("consulta3");
            }
            break;

        case 4:
            //por nombre contraria
            $expedientes=DB::table('expediente as e')
            ->join('persona as p','e.id_persona','=','p.id_persona')
            ->select('e.id_exp','e.fecha_alta','e.caratula','p.nombre as cliente','e.abogado','estado','e.tipo')
            ->where('e.nombre_contraria','like', '%'. $request->input('dato').'%')
            ->orderBy('id_exp','DESC')
            ->get();

            $a=(count($expedientes));
            if ($a > 0) {
                return view("resultado",["expedientes"=>$expedientes]);
            }else {
                Session::flash('message','SIN REGISTROS PARA LOS DATOS INGRESADOS..!!!');
                return view("consulta4");
            }
            break;
        case 5:
            //por abogado contraria
            $expedientes=DB::table('expediente as e')
            ->join('persona as p','e.id_persona','=','p.id_persona')
            ->select('e.id_exp','e.fecha_alta','e.caratula','p.nombre as cliente','e.abogado','estado','e.tipo')
            ->where('e.abogado_contraria','like', '%'. $request->input('dato').'%')
            ->orderBy('id_exp','DESC')
            ->get();

            $a=(count($expedientes));
            if ($a > 0) {
                return view("resultado",["expedientes"=>$expedientes]);
            }else {
                Session::flash('message','SIN REGISTROS PARA LOS DATOS INGRESADOS..!!!');
                return view("consulta5");
            }
            break;
        case 7:
            //por causa
            $expedientes=DB::table('expediente as e')
            ->join('persona as p','e.id_persona','=','p.id_persona')
            ->select('e.id_exp','e.fecha_alta','e.caratula','p.nombre as cliente','e.abogado','estado','e.tipo')
            ->where('e.tipo','like', ''. $request->input('dato').'%')
            ->orderBy('id_exp','DESC')
            ->get();

            $a=(count($expedientes));
            if ($a > 0) {
                return view("resultado",["expedientes"=>$expedientes]);
            }else {
                Session::flash('message','SIN REGISTROS PARA LOS DATOS INGRESADOS..!!!');
                return view("consulta7");
            }
            break;
        case 8:
            //por responsable
            $expedientes=DB::table('expediente as e')
            ->join('persona as p','e.id_persona','=','p.id_persona')
            ->select('e.id_exp','e.fecha_alta','e.caratula','p.nombre as cliente','e.abogado','estado','e.tipo')
            ->where('e.abogado','like', '%'. $request->input('dato').'%')
            ->orderBy('id_exp','DESC')
            ->get();

            $a=(count($expedientes));
            if ($a > 0) {
                return view("resultado",["expedientes"=>$expedientes]);
            }else {
                Session::flash('message','SIN REGISTROS PARA LOS DATOS INGRESADOS..!!!');
                return view("consulta8");
            }
            break;
        }
    }
    public function fecha(Request $request )
    {
        $f1 = $request->fecha_desde;
        $f2 = $request->fecha_hasta;
       
        if ($f1 <= $f2) {
            $expedientes=DB::table('expediente as e')
            ->join('persona as p','e.id_persona','=','p.id_persona')
            ->select('e.id_exp','e.fecha_alta','e.caratula','p.nombre as cliente','e.abogado','estado','e.tipo')
            ->whereBetween('e.fecha_alta', [$request->input('fecha_desde'),$request->input('fecha_hasta')])
            ->orderBy('id_exp','DESC')
            ->get();
         
            $a=(count($expedientes));
            if ($a > 0) {
                return view("fecharesultado",["expedientes"=>$expedientes]);
            }else {
                Session::flash('message','SIN REGISTROS PARA LOS DATOS INGRESADOS..!!!');
                return view("fecha");
            }
        } 
    }
}
