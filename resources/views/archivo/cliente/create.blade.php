@extends ('layouts.admin')

@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Representado</h3>
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

	{!!Form::open(array('url'=>'archivo/cliente','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}

    <div class="row justify-content-center">
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="nombre">Nombre o Razón Social</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
            	       <input type="text" name="nombre" maxlength="70" required value="{{old('nombre')}}" class="form-control" autofocus placeholder="Nombre...">
                </div>
            </div>
    	</div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-home" aria-hidden="true"></i></span>
                        <input type="text" name="direccion" maxlength="70" value="{{old('direccion')}}" class="form-control" placeholder="Dirección...">
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
    	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
    		<div class="form-group">
    			<label>Tipo Documento</label>
    			<select name="dni_tipo" class="form-control">
                       <option disabled selected>Seleccione una opción...</option>
                       <option value="DNI">DNI</option>
                       <option value="CUIT">CUIT</option>
                       <option value="CUIL">CUIL</option>
                       <option value="CI">CI</option>
                       <option value="LE">LE</option>
                       <option value="LC">LC</option>
    			</select>
    		</div>
    	</div>
    	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
    		<div class="form-group">
            	<label for="dni_nro">Número</label>
                 <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-sort" aria-hidden="true"></i></span>
            	       <input type="text" name="dni_nro" maxlength="60" value="{{old('dni_nro')}}" class="form-control" placeholder="Número...">
                </div>
            </div>
    	</div>
    	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
    		<div class="form-group">                
            	<label for="telefono">Teléfono</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
            	       <input type="tel" name="telefono" maxlength="60" value="{{old('telefono')}}" class="form-control" placeholder="Teléfono...">
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
                        <input type="tel" name="movil" maxlength="60" value="{{old('movil')}}" class="form-control" placeholder="Móvil...">
                </div>
            </div>
        </div>
    	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
    		<div class="form-group">
            	<label for="fax">Fax</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-fax" aria-hidden="true"></i></span>
            	       <input type="text" name="fax" maxlength="20" value="{{old('fax')}}" class="form-control" placeholder="Fax...">
                </div>
            </div>
    	</div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                        <input type="email" name="email" maxlength="60" value="{{old('email')}}" class="form-control" placeholder="Email...">
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