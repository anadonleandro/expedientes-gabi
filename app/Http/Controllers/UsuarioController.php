<?php

namespace sisExpedientes\Http\Controllers;

use Illuminate\Http\Request;
use sisExpedientes\Http\Requests;
use sisExpedientes\User;
use Illuminate\Support\Facades\Redirect;
use Session;
use Carbon\Carbon;
use DB;
use Fpdf;

class UsuarioController extends Controller
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
    		$usuarios=DB::table('users')
            ->where('name','LIKE','%'.$query.'%')
            ->orderBy('name','ASC')
    		->paginate(9);
    		return view('archivo.usuario.index',["usuarios"=>$usuarios,"searchText"=>$query]);
    	}
    }
    public function create()
    {  
        return view("archivo.usuario.create");
    } 
    public function store(Request $request)
    { 
        $usuario=new User;    
        $usuario->name=$request->get('name');
        $usuario->username=$request->get('username');
        $usuario->email=$request->get('email');
        $usuario->password=bcrypt($request->get('password'));
        $usuario->save();
        
        return Redirect::to('archivo/usuario');           
    }  
    public function show($id)
    {        
        //
    }
    public function edit($id)
    {
        return view("archivo.usuario.edit",["usuario"=>User::find($id)]);
    }
    public function update(Request $request,$id)
    {
        $usuario=User::find($id);    
        $usuario->name=$request->get('name');
        $usuario->username=$request->get('username');
        $usuario->email=$request->get('email');
        $usuario->password=bcrypt($request->get('password'));
        $usuario->save();

        return Redirect::to('archivo/usuario');
    }
    public function destroy($id)
    {
       	$usuario=User::find($id);
        $usuario->delete();
       	return Redirect::to('archivo/usuario');
    }
}
