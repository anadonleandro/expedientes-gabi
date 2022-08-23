<?php

namespace sisExpedientes\Http\Controllers;

use Illuminate\Http\Request;
use sisExpedientes\Http\Requests;
use sisExpedientes\Expediente;
use sisExpedientes\Persona;
use sisExpedientes\Movimiento;
use Illuminate\Support\Facades\Redirect;
use Session;
use Carbon\Carbon;
use DB;
use Fpdf;

class ExpedienteInacticoController extends Controller
{
    public function index(Request $request)
    {
    	$expedientes=DB::table('expediente as e')
        ->join('persona as p','e.id_persona','=','p.id_persona')
        ->select('e.id_exp','e.fecha_alta','e.caratula','p.nombre as cliente','e.abogado','e.estado','e.fechafinalizado','e.tipo')
        ->orderBy('e.id_exp','desc')
    	->paginate(15);
    	return view("inactivo",["expedientes"=>$expedientes]);
    
    }
    public function reportec($id)
    {
        $expediente=DB::table('expediente as e')
        ->join('persona as p','e.id_persona','=','p.id_persona')
        ->select('e.id_exp','e.fecha_alta','e.caratula','e.obs','e.abogado',
            'e.cuij','e.tipo','e.nombre_contraria','e.abogado_contraria','p.nombre as cliente',
            'e.fechafinalizado')
        ->where('e.id_exp','=',$id)
        ->first();
        $movimiento=DB::table('movimiento as m')
        ->join('expediente as e','m.id_exp','=','e.id_exp')
        ->select('m.id_mov','m.fecha_mov','m.destino_mov')
        ->where('m.id_exp','=',$id)
        ->orderBy('m.id_mov','DESC')
        ->get();

        $pdf = new Fpdf();
         $pdf::AddPage();
         $pdf::SetFont('Arial','B',11); 
         $pdf::SetXY(15,20);                
         $pdf::Cell(0,0,utf8_decode("IMPRESION DE EXPEDIENTES"),0,"","C");
         $pdf::Ln();
         $pdf::SetFont('Arial','B',10); 
         $pdf::SetXY(15,30);                
         $pdf::Cell(0,0,utf8_decode("DATOS DEL EXPEDIENTE"),0,"","");
         $pdf::Ln();
         $pdf::SetFont('Arial','B',9);
         $pdf::SetXY(15,40);
         $pdf::Cell(0,0,utf8_decode("Número: ".$expediente->id_exp));
         $pdf::SetXY(120,40);
         $pdf::Cell(0,0,utf8_decode("Registrado: ".$expediente->fecha_alta));
         $pdf::Ln();
         $pdf::SetFont('Arial','B',9);
         $pdf::SetXY(15,50);
         $pdf::Cell(0,0,utf8_decode("Representado: ".$expediente->cliente));
         if ($expediente->cuij > 0)
         {
             $pdf::SetXY(120,50);
             $pdf::Cell(0,0,utf8_decode("Cuij: ".$expediente->cuij));
             $pdf::Ln();
         }
         else
         {
             $pdf::SetXY(120,50);
             $pdf::Cell(0,0,utf8_decode("Cuij: "."SIN DATOS"));
             $pdf::Ln();
         }
         $pdf::SetFont('Arial','B',9);
         $pdf::SetXY(15,70);
         $pdf::Cell(0,0,utf8_decode("Carátula: ".$expediente->caratula));
         $pdf::Ln();
         $obs = ($expediente->obs);
         if(!empty($obs))
         {
             $pdf::SetFont('Arial','B',9);
             $pdf::SetXY(15,80);
             $pdf::MultiCell(210,0,"Obs: ".$obs);
             $pdf::Ln();
         }
         else
         {
             $pdf::SetFont('Arial','B',9);
             $pdf::SetXY(15,80);
             $pdf::Cell(0,0,utf8_decode("Obs: "."SIN DATOS"));
             $pdf::Ln();
         }
         $pdf::SetXY(15,90);
         $pdf::Cell(0,0,utf8_decode("Cerrado: ".$expediente->fechafinalizado));
         $pdf::Ln();
         $pdf::SetFont('Arial','B',9);
         $pdf::SetXY(15,60);
         $pdf::Cell(0,0,utf8_decode("Responsable: ".$expediente->abogado));
         $pdf::SetXY(120,60);
         $pdf::Cell(0,0,utf8_decode("Causa: ".$expediente->tipo));
         $pdf::Ln();
         $pdf::SetFont('Arial','B',10); 
         $pdf::SetXY(15,100);                
         $pdf::Cell(0,0,utf8_decode("PARTE CONTRARIA"),0,"","");
         $pdf::Ln();
         $nomcontraria = ($expediente->nombre_contraria);         
         if(!empty($nomcontraria))
         {
            $pdf::SetFont('Arial','B',9);
            $pdf::SetXY(15,110);
            $pdf::Cell(0,0,utf8_decode("Nombre: ".$nomcontraria));
         }
         else
         {
            $pdf::SetFont('Arial','B',9);
            $pdf::SetXY(15,110);
            $pdf::Cell(0,0,utf8_decode("Nombre: "."SIN DATOS"));
         } 
         $abocontraria = ($expediente->abogado_contraria);
         if(!empty($abocontraria))
         {
            $pdf::SetFont('Arial','B',9);
            $pdf::SetXY(120,110);
            $pdf::Cell(0,0,utf8_decode("Abogado: ".$abocontraria));
            $pdf::Ln();
         }
         else
         {
            $pdf::SetFont('Arial','B',9);
            $pdf::SetXY(120,110);
            $pdf::Cell(0,0,utf8_decode("Abogado: "."SIN DATOS"));
            $pdf::Ln();
         } 
         

         $y=130;
         foreach ($movimiento as $mov)
         {
            $pdf::SetFont('Arial','B',10); 
            $pdf::SetXY(15,120);                
            $pdf::Cell(0,0,utf8_decode("MOVIMIENTOS DEL EXPEDIENTE"),0,"","");
            $pdf::Ln();
            $pdf::SetFont('Arial','B',9);
            $pdf::SetXY(15,$y);
            $pdf::Cell(0,0,utf8_decode("Fecha: ".$mov->fecha_mov));
            $pdf::SetXY(45,$y);
            $pdf::Cell(0,0,utf8_decode("Destino: ".$mov->destino_mov));
            $y=$y+10; 
         }
         
         $pdf::Output();
         exit;
    }
}
