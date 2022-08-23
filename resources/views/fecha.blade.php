@extends ('layouts.admin')

@section ('contenido')

{!! Form::open(array('url'=>'/fecharesultado','method'=>'get','autocomplete'=>'off')) !!}
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
	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
		<h3>Búsqueda por Fecha</h3>
	</div>
</div>
<div class="row justify-content-center">
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
		<div class="form-group">
			<label>Desde</label>
			<div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
				<input type="date" name="fecha_desde" class="form-control" maxDate="+0D" autofocus required>
			</div>
		</div>
	</div>
</div>
<div class="row justify-content-center">
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
		<div class="form-group">
			<label>Hasta</label>
			<div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
		        <input type="date" name="fecha_hasta" class="form-control" required>
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