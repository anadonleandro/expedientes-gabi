<?php

namespace sisExpedientes\Http\Controllers;

use Illuminate\Http\Request;
use sisExpedientes\Http\Requests;
use sisExpedientes\Movimiento;
use Illuminate\Support\Facades\Redirect;
use Session;
use Carbon\Carbon;
use DB;
use Fpdf;

class MovimientoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
    	//
    }
    public function create()
    {
         $expedientes = DB::table('expediente')
            ->select('id_exp','caratula','estado','abogado')
            ->orderBy('id_exp','DESC')
            ->get();
        return view("archivo.movimiento.create",["expedientes"=>$expedientes]);
    }
    public function store(Request $request)
    {
        $movimiento=new Movimiento;   
        $movimiento->id_exp=$request->get('id_exp');
        $mytime=Carbon::now('America/Argentina/Buenos_Aires');  
        $movimiento->fecha_mov=$mytime->toDateString();
        $movimiento->destino_mov=$request->get('destino_mov');
        $movimiento->obs_mov=$request->get('obs_mov');
        $movimiento->estado_mov='ACTIVO';
        $movimiento->save();

        return Redirect::to('archivo/expediente');   
    }
    public function show($id)
    {
        $movimiento=DB::table('movimiento')
        ->select('id_mov','id_exp','fecha_mov','destino_mov','obs_mov')
        ->where('id_mov','=',$id)
        ->get();

    	return view("archivo.movimiento.show",["movimiento"=>$movimiento]);
    }
    public function edit($id)
    {
        return view("archivo.movimiento.edit",["movimiento"=>Movimiento::find($id)]);
    }
    public function update(Request $request,$id)
    {
		$movimiento=Movimiento::find($id);
        $movimiento->destino_mov=$request->get('destino_mov');
        $movimiento->obs_mov=$request->get('obs_mov');
        $movimiento->estado_mov='ACTIVO';
        $movimiento->save();

        return Redirect::to('archivo/expediente'); 
    }
    public function destroy($id)
    {
        //
    }
    public function reportec($id)
    {
       
        $movimiento=DB::table('movimiento')
        ->select('id_mov','fecha_mov','destino_mov','id_exp','obs_mov')
        ->where('id_mov','=',$id)
        ->first();

        $pdf = new Fpdf('L','mm','A4');
         $pdf::AddPage();
        /* $pdf::SetTextColor(35,56,113);*/
         $pdf::SetFont('Arial','B',11); 
         $pdf::SetXY(15,20);                
         $pdf::Cell(0,0,utf8_decode("IMPRESION DE MOVIMIENTOS"),0,"","C");
         $pdf::Ln();
         $pdf::SetFont('Arial','B',10); 
         $pdf::SetXY(15,30);                
         $pdf::Cell(0,0,utf8_decode("DATOS DEL MOVIMIENTO"),0,"","");
         $pdf::Ln();
         $pdf::SetFont('Arial','B',9);
         $pdf::SetXY(15,40);
         $pdf::Cell(0,0,utf8_decode("Expediente: ".$movimiento->id_exp));
         $pdf::SetFont('Arial','B',9);
         $pdf::SetXY(15,50);
         $pdf::Cell(0,0,utf8_decode("Fecha Mvto: ".$movimiento->fecha_mov));
         $destino = ($movimiento->destino_mov);
         if(!empty($destino))
         {
            $pdf::SetFont('Arial','B',9);
            $pdf::SetXY(15,60);
            $pdf::Cell(0,0,utf8_decode("Datos del mov: ".$destino));
            $pdf::Ln();
         }
         else
         {
            $pdf::SetFont('Arial','B',9);
            $pdf::SetXY(15,60);
            $pdf::Cell(0,0,utf8_decode("Datos del mov: "."SIN DATOS"));
            $pdf::Ln();
         } 
         $obs = ($movimiento->obs_mov);
         if(!empty($obs))
         {
            $pdf::SetFont('Arial','B',9);
            $pdf::SetXY(15,70);
            $pdf::Cell(0,0,utf8_decode("Obs: ".$obs));
            $pdf::Ln();
         }
         else
         {
            $pdf::SetFont('Arial','B',9);
            $pdf::SetXY(15,70);
            $pdf::Cell(0,0,utf8_decode("Obs: "."SIN DATOS"));
            $pdf::Ln();
         } 
         
         $pdf::Output();
         exit;

    }
}
