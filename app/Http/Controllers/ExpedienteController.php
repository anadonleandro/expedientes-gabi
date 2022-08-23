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
use Maatwebsite\Excel\Facades\Excel;

class ExpedienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
    	if ($request)
    	{
            $query=trim($request->get('searchText'));    
    		$expedientes=DB::table('expediente as e')
            ->join('persona as p','e.id_persona','=','p.id_persona')
            ->select('e.id_exp','e.fecha_alta','e.caratula','p.nombre as cliente','e.abogado','e.estado','e.tipo')
            ->orwhere('e.id_exp','LIKE','%'.$query.'%')
            ->orwhere('e.caratula','LIKE','%'.$query.'%')
            ->orderBy('e.id_exp','desc')
    		->paginate(20);
    		return view('archivo.expediente.index',["expedientes"=>$expedientes,"searchText"=>$query]);
    	}
    }
    public function create()
    { 
        $usuarios=DB::table('users')->get();
        $personas=DB::table('persona')->where('tipo','=','Cliente')->get(); 
        return view("archivo.expediente.create",["personas"=>$personas,"usuarios"=>$usuarios]);
    }    

    public function store(Request $request)
    { 
        $expediente=new Expediente;    
        $expediente->id_persona=$request->get('id_persona');
        $mytime = Carbon::now('America/Argentina/Buenos_Aires');
        $expediente->fecha_alta=$mytime->toDateString();
        $expediente->tipo=$request->get('tipo');
        $expediente->abogado=$request->get('abogado');
        $expediente->caratula=$request->get('caratula');
        $expediente->obs=$request->get('obs');
        $expediente->cuij=$request->get('cuij');
        $expediente->nombre_contraria=$request->get('nombre_contraria');
        $expediente->abogado_contraria=$request->get('abogado_contraria');
        $expediente->estado='1';
        $expediente->fechasiniestro=$request->get('fechasiniestro');
        $expediente->fechapoder=$request->get('fechapoder');
        $expediente->poder=$request->get('poder');
        $expediente->cuotalitis=$request->get('cuotalitis');
        $expediente->historiaclinica=$request->get('historiaclinica');
        $expediente->dni=$request->get('dni');
        $expediente->tarjeta=$request->get('tarjeta');
        $expediente->licencia=$request->get('licencia');
        $expediente->certificacion=$request->get('certificacion');
        $expediente->polizadenuncia=$request->get('polizadenuncia');
        $expediente->fechapedidohc=$request->get('fechapedidohc');
        $expediente->fechaentregahc=$request->get('fechaentregahc');
        $expediente->foto=$request->get('foto');
        $expediente->ampliarhc=$request->get('ampliarhc');
        $expediente->presupuesto=$request->get('presupuesto');
        $expediente->escrito=$request->get('escrito');
        $expediente->recibo=$request->get('recibo');
        $expediente->fecharecibohc=$request->get('fecharecibohc');
        $expediente->presentar=$request->get('presentar');
        $expediente->fechamedica=$request->get('fechamedica');
        $expediente->lugarmedica=$request->get('lugarmedica');
        $expediente->horamedica=$request->get('horamedica');
        $expediente->fechamecanica=$request->get('fechamecanica');
        $expediente->lugarmecanica=$request->get('lugarmecanica');
        $expediente->horamecanica=$request->get('horamecanica');
        $expediente->rechazomonto1=$request->get('rechazomonto1');
        $expediente->fechamonto1=$request->get('fechamonto1');
        $expediente->rechazomonto2=$request->get('rechazomonto2');
        $expediente->fechamonto2=$request->get('fechamonto2');
        $expediente->rechazomonto3=$request->get('rechazomonto3');
        $expediente->fechamonto3=$request->get('fechamonto3');
        $expediente->rechazomonto4=$request->get('rechazomonto4');
        $expediente->fechamonto4=$request->get('fechamonto4');
        $expediente->rechazomonto5=$request->get('rechazomonto5');
        $expediente->fechamonto5=$request->get('fechamonto5');
        $expediente->aceptamonto=$request->get('aceptamonto');
        $expediente->fechaacepta=$request->get('fechaacepta');
        $expediente->fechaconvenio=$request->get('fechaconvenio');
        $expediente->boleta=$request->get('boleta');
        $expediente->fechacheque=$request->get('fechacheque');
        $expediente->pago=$request->get('pago');
        $expediente->cobro=$request->get('cobro');
        $expediente->save();
        
        return Redirect::to('archivo/expediente');           
    }
    public function show($id)
    {        
        $expediente=DB::table('expediente as e')
        ->join('persona as p','e.id_persona','=','p.id_persona')
        ->select('e.id_exp','e.fecha_alta','e.caratula','e.obs','e.abogado','e.cuij','e.tipo','e.nombre_contraria',
            'e.abogado_contraria','p.nombre as cliente','e.fechasiniestro','e.fechapoder','e.poder','e.cuotalitis',
            'e.historiaclinica','e.dni','e.tarjeta','e.licencia','e.certificacion','e.polizadenuncia','e.fechapedidohc',
            'e.fechaentregahc','e.foto','e.ampliarhc','e.presupuesto','e.escrito','e.recibo','e.fecharecibohc',
            'e.presentar','e.fechamedica','e.lugarmedica','e.horamedica','e.fechamecanica','e.lugarmecanica',
            'e.horamecanica','e.rechazomonto1','e.rechazomonto2','e.rechazomonto3','e.rechazomonto4','e.rechazomonto5',
            'e.fechamonto1','e.fechamonto2','e.fechamonto3','e.fechamonto4','e.fechamonto5','e.aceptamonto','e.fechaacepta',
            'e.fechaconvenio','e.boleta','e.fechacheque','e.pago','e.cobro')
        ->where('e.id_exp','=',$id)
        ->get();
        $movimiento=DB::table('movimiento as m')
        ->join('expediente as e','m.id_exp','=','e.id_exp')
        ->select('m.id_mov','m.fecha_mov','m.destino_mov')
        ->where('m.id_exp','=',$id)
        ->where('estado_mov','=','ACTIVO')
        ->orderBy('m.id_mov','DESC')
        ->get();

        return view("archivo.expediente.show",["expediente"=>$expediente,"movimiento"=>$movimiento]);
    }
    public function edit($id)
    {
        $expediente=Expediente::find($id);
        $personas=DB::table('persona')->where('tipo','=','Cliente')->get();
        $usuarios=DB::table('users')->get();
        return view("archivo.expediente.edit",["expediente"=>$expediente,"personas"=>$personas,"usuarios"=>$usuarios]);
    }
    public function update(Request $request,$id)
    {
        $expediente=Expediente::find($id);
        $expediente->id_persona=$request->get('id_persona');
        $expediente->tipo=$request->get('tipo');
        $expediente->abogado=$request->get('abogado');
        $expediente->caratula=$request->get('caratula');
        $expediente->obs=$request->get('obs');
        $expediente->cuij=$request->get('cuij');
        $expediente->nombre_contraria=$request->get('nombre_contraria');
        $expediente->abogado_contraria=$request->get('abogado_contraria');
        $expediente->fechasiniestro=$request->get('fechasiniestro');
        $expediente->fechapoder=$request->get('fechapoder');
        $expediente->poder=$request->get('poder');
        $expediente->cuotalitis=$request->get('cuotalitis');
        $expediente->historiaclinica=$request->get('historiaclinica');
        $expediente->dni=$request->get('dni');
        $expediente->tarjeta=$request->get('tarjeta');
        $expediente->licencia=$request->get('licencia');
        $expediente->certificacion=$request->get('certificacion');
        $expediente->polizadenuncia=$request->get('polizadenuncia');
        $expediente->fechapedidohc=$request->get('fechapedidohc');
        $expediente->fechaentregahc=$request->get('fechaentregahc');
        $expediente->foto=$request->get('foto');
        $expediente->ampliarhc=$request->get('ampliarhc');
        $expediente->presupuesto=$request->get('presupuesto');
        $expediente->escrito=$request->get('escrito');
        $expediente->recibo=$request->get('recibo');
        $expediente->fecharecibohc=$request->get('fecharecibohc');
        $expediente->presentar=$request->get('presentar');
        $expediente->fechamedica=$request->get('fechamedica');
        $expediente->lugarmedica=$request->get('lugarmedica');
        $expediente->horamedica=$request->get('horamedica');
        $expediente->fechamecanica=$request->get('fechamecanica');
        $expediente->lugarmecanica=$request->get('lugarmecanica');
        $expediente->horamecanica=$request->get('horamecanica');
        $expediente->rechazomonto1=$request->get('rechazomonto1');
        $expediente->fechamonto1=$request->get('fechamonto1');
        $expediente->rechazomonto2=$request->get('rechazomonto2');
        $expediente->fechamonto2=$request->get('fechamonto2');
        $expediente->rechazomonto3=$request->get('rechazomonto3');
        $expediente->fechamonto3=$request->get('fechamonto3');
        $expediente->rechazomonto4=$request->get('rechazomonto4');
        $expediente->fechamonto4=$request->get('fechamonto4');
        $expediente->rechazomonto5=$request->get('rechazomonto5');
        $expediente->fechamonto5=$request->get('fechamonto5');
        $expediente->aceptamonto=$request->get('aceptamonto');
        $expediente->fechaacepta=$request->get('fechaacepta');
        $expediente->fechaconvenio=$request->get('fechaconvenio');
        $expediente->boleta=$request->get('boleta');
        $expediente->fechacheque=$request->get('fechacheque');
        $expediente->pago=$request->get('pago');
        $expediente->cobro=$request->get('cobro');
        $expediente->save();

        return Redirect::to('archivo/expediente');
    }
    public function destroy($id)
    {
        $expediente=Expediente::find($id);
        $expediente->estado='0';
        $mytime = Carbon::now('America/Argentina/Buenos_Aires');
        $expediente->fechafinalizado=$mytime->toDateString();
        $expediente->save();
        return Redirect::to('archivo/expediente');
    }
    public function reportec($id)
    {
        $expediente=DB::table('expediente as e')
        ->join('persona as p','e.id_persona','=','p.id_persona')
        ->select('e.id_exp','e.fecha_alta','e.caratula','e.obs','e.abogado',
            'e.cuij','e.tipo','e.nombre_contraria','e.abogado_contraria','p.nombre as cliente')
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
         $pdf::SetFont('Arial','B',9);
         $pdf::SetXY(15,70);
         $pdf::Cell(0,0,utf8_decode("Carátula: ".$expediente->caratula));
         $pdf::Ln();
         $pdf::SetFont('Arial','B',9);
         $pdf::SetXY(15,80);
         $pdf::Cell(0,0,utf8_decode("Obs: ".$expediente->obs));
         $pdf::Ln();
         $pdf::SetFont('Arial','B',9);
         $pdf::SetXY(15,60);
         $pdf::Cell(0,0,utf8_decode("Responsable: ".$expediente->abogado));
         $pdf::SetXY(120,60);
         $pdf::Cell(0,0,utf8_decode("Causa: ".$expediente->tipo));
         $pdf::Ln();
         $pdf::SetFont('Arial','B',10); 
         $pdf::SetXY(15,90);                
         $pdf::Cell(0,0,utf8_decode("PARTE CONTRARIA"),0,"","");
         $pdf::Ln();
         $nomcontraria = ($expediente->nombre_contraria);         
         if(!empty($nomcontraria))
         {
            $pdf::SetFont('Arial','B',9);
            $pdf::SetXY(15,100);
            $pdf::Cell(0,0,utf8_decode("Nombre: ".$nomcontraria));
         }
         else
         {
            $pdf::SetFont('Arial','B',9);
            $pdf::SetXY(15,100);
            $pdf::Cell(0,0,utf8_decode("Nombre: "."SIN DATOS"));
         } 
         $abocontraria = ($expediente->abogado_contraria);
         if(!empty($abocontraria))
         {
            $pdf::SetFont('Arial','B',9);
            $pdf::SetXY(120,100);
            $pdf::Cell(0,0,utf8_decode("Abogado: ".$abocontraria));
            $pdf::Ln();
         }
         else
         {
            $pdf::SetFont('Arial','B',9);
            $pdf::SetXY(120,100);
            $pdf::Cell(0,0,utf8_decode("Abogado: "."SIN DATOS"));
            $pdf::Ln();
         } 
         

         $y=120;
         foreach ($movimiento as $mov)
         {
            $pdf::SetFont('Arial','B',10); 
            $pdf::SetXY(15,110);                
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
