@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Representado: {{ $persona->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>

	{!!Form::model($persona,['url'=>['archivo/cliente',$persona->id_persona],'method'=>'PATCH'])!!}
    {{Form::token()}}

    <div class="row justify-content-center">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
              <label for="nombre">Nombre o Razón Social</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                  <input type="text" name="nombre" maxlength="70" required value="{{$persona->nombre}}" class="form-control" autofocus placeholder="Nombre...">
              </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
              <label for="direccion">Dirección</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-home" aria-hidden="true"></i></span>
                  <input type="text" name="direccion" maxlength="70" value="{{$persona->direccion}}" class="form-control" placeholder="Dirección...">
              </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">    
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label>Tipo Documento</label>
                <select name="dni_tipo" class="form-control">
                    @if ($persona->dni_tipo=='DNI')
                        <option value="DNI" selected>DNI</option>
                        <option value="CUIT">CUIT</option>
                        <option value="CUIL">CUIL</option>
                        <option value="CI">CI</option>
                        <option value="LE">LE</option>
                        <option value="LC">LC</option>
                    @elseif ($persona->dni_tipo=='CUIT')
                       <option value="DNI">DNI</option>
                       <option value="CUIT" selected>CUIT</option>
                       <option value="CUIL">CUIL</option>
                       <option value="CI">CI</option>
                       <option value="LE">LE</option>
                       <option value="LC">LC</option>
                    @elseif ($persona->dni_tipo=='CUIL')
                       <option value="DNI">DNI</option>
                       <option value="CUIT">CUIT</option>
                       <option value="CUIL" selected>CUIL</option>
                       <option value="CI">CI</option>
                       <option value="LE">LE</option>
                       <option value="LC">LC</option>
                    @elseif ($persona->dni_tipo=='CI')
                       <option value="DNI">DNI</option>
                       <option value="CUIT">CUIT</option>
                       <option value="CUIL">CUIL</option>
                       <option value="CI" selected>CI</option>
                       <option value="LE">LE</option>
                       <option value="LC">LC</option>
                    @elseif ($persona->dni_tipo=='LE')
                       <option value="DNI">DNI</option>
                       <option value="CUIT">CUIT</option>
                       <option value="CUIL">CUIL</option>
                       <option value="CI">CI</option>
                       <option value="LE" selected>LE</option>
                       <option value="LC">LC</option>
                    @else
                       <option value="DNI">DNI</option>
                       <option value="CUIT">CUIT</option>
                       <option value="CUIL">CUIL</option>
                       <option value="CI">CI</option>
                       <option value="LE">LE</option>
                       <option value="LC" selected>LC</option>
                    @endif
                </select>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="dni_nro">Número</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sort" aria-hidden="true"></i></span>
                    <input type="text" name="dni_nro" maxlength="60" value="{{$persona->dni_nro}}" class="form-control" placeholder="Número...">
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                    <input type="tel" name="telefono" maxlength="60" value="{{$persona->telefono}}" class="form-control" placeholder="Teléfono...">
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center"> 
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="movil">Móvil</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-mobile" aria-hidden="true"></i></span>
                    <input type="tel" name="movil" maxlength="60" value="{{$persona->movil}}" class="form-control" placeholder="Móvil...">
                </div>
            </div>
        </div>   
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="fax">Fax</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-fax" aria-hidden="true"></i></span>
                    <input type="text" name="fax" maxlength="20" value="{{$persona->fax}}" class="form-control" placeholder="Fax...">
                </div>
            </div>
        </div>   
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="descripcion">Email</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                    <input type="email" name="email" maxlength="60" value="{{$persona->email}}" class="form-control" placeholder="Email...">
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <button class="btn btn-primary" type="submit"><i class="fa fa-check-square-o"></i> Guardar</button>
                <button class="btn btn-danger" type="reset"><i class="fa fa-close"></i> Cancelar</button>
            </div>
        </div>
    </div> 
			
    {!!Form::close()!!}		
            
@endsection