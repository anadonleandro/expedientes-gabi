<?php

namespace sisExpedientes\Http\Controllers;

use Illuminate\Http\Request;
use sisExpedientes\Http\Requests;
use sisExpedientes\Expediente;
use sisExpedientes\Persona;
use sisExpedientes\Movimiento;
use sisExpedientes\Cita;
use Illuminate\Support\Facades\Redirect;
use Session;
use Carbon\Carbon;
use DB;

class CitaController extends Controller
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
    		$citas=DB::table('cita as c')
    		->join('persona as p','c.id_persona','=','p.id_persona')
            ->select('id_cita','fecha_cita','hora_cita','texto_cita','estado_cita','p.nombre as cliente','c.abogado')
            ->where('p.nombre','LIKE','%'.$query.'%')
            ->orWhere('fecha_cita','LIKE','%'.$query.'%')
            ->orderBy('fecha_cita','desc')
            ->orderBy('hora_cita','desc')
    		->paginate(6);
    		return view('archivo.cita.index',["citas"=>$citas,"searchText"=>$query]);
    	}
    }
    public function create()
    {
        $personas=DB::table('persona')->where('tipo','=','Cliente')->get(); 
        return view("archivo.cita.create",["personas"=>$personas]);
    }
    public function store (Request $request)
    {
        $cita=new Cita;
        $cita->id_persona=$request->get('id_persona');
        $cita->fecha_cita=$request->get('fecha_cita');
        $cita->hora_cita=$request->get('hora_cita');
        $cita->texto_cita=$request->get('texto_cita');
        $cita->estado_cita=$request->get('estado_cita');
        $cita->abogado=$request->get('abogado');
        $cita->save();
        return Redirect::to('archivo/cita');
    }
    public function show($id)
    {
        $cita=DB::table('cita')        
        ->select('id_cita','fecha_cita','hora_cita','texto_cita','estado_cita')
        ->where('id_cita','=',$id)
        ->get();
        return view("archivo.cita.show",["cita"=>$cita]);
    }
    public function edit($id)
    {
        $cita=Cita::find($id);
        $personas=DB::table('persona')->where('tipo','=','Cliente')->get();
        return view("archivo.cita.edit",["cita"=>$cita,"personas"=>$personas]);
    }
    public function update(Request $request,$id)
    {
        $cita=Cita::find($id);
        $cita->id_persona=$request->get('id_persona');
        $cita->fecha_cita=$request->get('fecha_cita');
        $cita->hora_cita=$request->get('hora_cita');
        $cita->texto_cita=$request->get('texto_cita');
        $cita->estado_cita=$request->get('estado_cita');
        $cita->abogado=$request->get('abogado');
        $cita->update();
        return Redirect::to('archivo/cita');
    }
    public function destroy($id)
    {
    	//
    }
}
