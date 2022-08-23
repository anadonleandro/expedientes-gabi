<?php

namespace sisExpedientes\Http\Controllers;

use Illuminate\Http\Request;
use sisExpedientes\Http\Requests;
use sisExpedientes\Persona;
use Illuminate\Support\Facades\Redirect;
use Session;
use Carbon\Carbon;
use DB;
use Fpdf;

class ClienteController extends Controller
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
            $personas=DB::table('persona')->where('tipo','=','Cliente')
            ->select('id_persona','nombre','direccion','telefono','dni_nro','movil')
            ->where('nombre','LIKE','%'.$query.'%')
            ->orwhere('dni_nro','LIKE','%'.$query.'%')
            ->orderBy('id_persona','DESC')
            ->paginate(9);
            return view('archivo.cliente.index',["personas"=>$personas,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("archivo.cliente.create");
    }
    public function store (Request $request)
    {
        $persona=new Persona;
        $mytime = Carbon::now('America/Argentina/Buenos_Aires');
        $persona->fecha_alta=$mytime->toDateString();
        $persona->nombre=$request->get('nombre');
        $persona->direccion=$request->get('direccion');
        $persona->dni_tipo=$request->get('dni_tipo');
        $persona->dni_nro=$request->get('dni_nro');
        $persona->telefono=$request->get('telefono');
        $persona->movil=$request->get('movil');
        $persona->fax=$request->get('fax');
        $persona->email=$request->get('email'); 
        $persona->tipo='Cliente';
        $persona->save();
        return Redirect::to('archivo/cliente');

    }
    public function show($id)
    {
        $persona=DB::table('persona')        
        ->select('nombre','direccion','dni_nro','telefono','movil','fax','email','fecha_alta')
        ->where('id_persona','=',$id)
        ->get();
        $expediente=DB::table('expediente as e')  
        ->join('persona as p','p.id_persona','=','e.id_persona')      
        ->select('e.id_exp','e.fecha_alta as registrado','e.caratula','e.abogado','e.estado','e.fechafinalizado')
        ->where('e.id_persona','=',$id)
        ->orderBy('e.id_exp','desc')
        ->get();
        return view("archivo.cliente.show",["persona"=>$persona,"expediente"=>$expediente]);
    }
    public function edit($id)
    {
        return view("archivo.cliente.edit",["persona"=>Persona::find($id)]);
    }
    public function update(Request $request,$id)
    {
        $persona=Persona::find($id);
        $persona->nombre=$request->get('nombre');
        $persona->direccion=$request->get('direccion');
        $persona->dni_tipo=$request->get('dni_tipo');
        $persona->dni_nro=$request->get('dni_nro');
        $persona->telefono=$request->get('telefono');
        $persona->movil=$request->get('movil');
        $persona->fax=$request->get('fax');
        $persona->email=$request->get('email'); 
        $persona->tipo='Cliente';
        $persona->update();
        return Redirect::to('archivo/cliente');
    }
    public function reportec($id)
    {
       
        $persona=DB::table('persona')
        ->select('nombre','fecha_alta','direccion',
            'telefono','movil','email')
        ->where('id_persona','=',$id)
        ->first();
        $usuario=DB::table('users')
        ->select('name')
        ->get();
        $expediente=DB::table('expediente as e')
        ->join('persona as p','e.id_persona','=','p.id_persona')
        ->select('e.id_exp','e.fecha_alta as fecha_exp','e.caratula','e.abogado','e.estado')
        ->where('e.id_persona','=',$id)
        ->orderBy('e.id_exp','DESC')
        ->get();

       
        $pdf = new Fpdf('L','mm','A4');
         $pdf::AddPage();
        /* $pdf::SetTextColor(35,56,113);*/
         $pdf::SetFont('Arial','B',11); 
         $pdf::SetXY(15,20);                
         $pdf::Cell(0,0,utf8_decode("IMPRESION DE REPRESENTADOS"),0,"","C");
         $pdf::Ln();
         $pdf::SetFont('Arial','B',10); 
         $pdf::SetXY(15,30);                
         $pdf::Cell(0,0,utf8_decode("DATOS PERSONALES"),0,"","");
         $pdf::Ln();
         $pdf::SetFont('Arial','B',9);
         $pdf::SetXY(15,40);
         $pdf::Cell(0,0,utf8_decode("Fecha Alta: ".$persona->fecha_alta));
         $pdf::Ln();
         $pdf::SetFont('Arial','B',9);
         $pdf::SetXY(15,50);
         $pdf::Cell(0,0,utf8_decode("Apellido y Nombres: ".$persona->nombre));
         $direccion = ($persona->direccion);
         if(!empty($direccion))
         {
            $pdf::SetFont('Arial','B',9);
            $pdf::SetXY(15,60);
            $pdf::Cell(0,0,utf8_decode("Dirección: ".$direccion));
            $pdf::Ln();
         }
         else
         {
            $pdf::SetFont('Arial','B',9);
            $pdf::SetXY(15,60);
            $pdf::Cell(0,0,utf8_decode("Dirección: "."SIN DATOS"));
            $pdf::Ln();
         } 
         $tel = ($persona->telefono);
         if(!empty($tel))
         {
            $pdf::SetFont('Arial','B',9);
            $pdf::SetXY(15,70);
            $pdf::Cell(0,0,utf8_decode("Teléfono: ".$tel));
            $pdf::Ln();
         }
         else
         {
            $pdf::SetFont('Arial','B',9);
            $pdf::SetXY(15,70);
            $pdf::Cell(0,0,utf8_decode("Teléfono: "."SIN DATOS"));
            $pdf::Ln();
         } 
         $mov = ($persona->movil);
         if(!empty($mov))
         {
            $pdf::SetFont('Arial','B',9);
            $pdf::SetXY(15,80);
            $pdf::Cell(0,0,utf8_decode("Móvil: ".$mov));
            $pdf::Ln();
         }
         else
         {
            $pdf::SetFont('Arial','B',9);
            $pdf::SetXY(15,80);
            $pdf::Cell(0,0,utf8_decode("Móvil: "."SIN DATOS"));
            $pdf::Ln();
         } 
         $mail = ($persona->email);
         if(!empty($mail))
         {
            $pdf::SetFont('Arial','B',9);
            $pdf::SetXY(15,90);
            $pdf::Cell(0,0,utf8_decode("Email: ".$mail));
            $pdf::Ln();
         }
         else
         {
            $pdf::SetFont('Arial','B',9);
            $pdf::SetXY(15,90);
            $pdf::Cell(0,0,utf8_decode("Email: "."SIN DATOS"));
            $pdf::Ln();
         } 

         $pdf::Output();
         exit;
       
    }
}
