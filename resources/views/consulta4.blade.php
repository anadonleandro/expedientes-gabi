@extends ('layouts.admin')

@section ('contenido')

{!! Form::open(array('url'=>'/resultado','method'=>'get','autocomplete'=>'off')) !!}
{{Form::token()}}

<div class="row justify-content-center">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		@if(Session::has('message'))
		<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-label="close"><spam aria-hidden="true">Aceptar</spam></button> 
			{{Session::get('message')}}
		</div>
		@endif
	</div>
</div>

<div class="row justify-content-center">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Ingrese Apellido y Nombres (Parte Contraria)</h3>
	</div>
</div>
<div class="row justify-content-center">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
				<input type="text"  pattern="[a-zA-Z]{1,60}" name="dato" class="form-control" value="" autofocus required>
				<input type="hidden" name="valor" value='4'>
			</div>
		</div>
	</div>
</div>
<div class="row justify-content-center">
	<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
	    <div class="form-group">
			<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Buscar</button>
		</div>
	</div>  
</div>

{!! Form::close() !!}

@endsection