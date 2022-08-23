@extends ('layouts.admin')

@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Usuario</h3>
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

	{!!Form::open(array('url'=>'archivo/usuario','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}

@if(Auth::user()->name=='Administrador')
    <div class="row justify-content-center">
    	<div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
    		<div class="form-group">
	        	<label for="name">Apellido y Nombres</label>
	        	<div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
			            <input id="name" type="text" maxlength="40" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Nombre de usuario...">
			            @if ($errors->has('name'))
			                <span class="invalid-feedback" role="alert">
			                    <strong>{{ $errors->first('name') }}</strong>
			                </span>
			            @endif
			    </div>
	        </div>
	    </div>
    </div>
    <div class="row justify-content-center">
    	<div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
    		<div class="form-group">
	        	<label for="email">Email</label>
	        	<div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                        <input id="email" type="email" maxlength="30" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email...">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
            <div class="form-group">
                <label for="username">Nombre de Usuario</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                        <input id="username" type="username" maxlength="10" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required placeholder="Nombre de Usuario...">
                        @if ($errors->has('username'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
    	<div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
    		<div class="form-group">
	        	<label for="name">Password</label>
	        	<div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                     	<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password...">
                     	@if ($errors->has('password'))
                         	<span class="invalid-feedback" role="alert">
                             	<strong>{{ $errors->first('password') }}</strong>
                         	</span>
                     	@endif
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
    	<div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
    		<div class="form-group">
	        	<label for="name">Confirmar Password</label>
	        	<div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                        <input id="password-confirm" type="password"class="form-control" name="password_confirmation" required placeholder="Confirmar password...">
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
    	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
    		<div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Guardar</button>
                <button class="btn btn-danger" type="reset"><i class="fa fa-close"></i> Cancelar</button>
            </div>
        </div>
    </div>
@else
    <h4><p class="text-danger">PROCESO CANCELADO..!!! NO ESTA AUTORIZADO PARA GENERAR NUEVOS USUARIOS...</p></h4>
@endif    

	{!!Form::close()!!}		

@endsection