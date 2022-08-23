@extends ('layouts.admin')

@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Movimiento</h3>
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

	{!!Form::model($movimiento,['url'=>['archivo/movimiento',$movimiento->id_mov],'method'=>'PATCH'])!!}
    {{Form::token()}}

    <div class="row justify-content-center">
    	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		    <div class="form-group">
		        <label for="destino_mov">Datos del Movimiento</label>
		        <input type="text" align="justify" maxlength="70" name="destino_mov" value="{{$movimiento->destino_mov}}" class="form-control" autofocus placeholder="Datos...">
		    </div>        
		</div>
    </div>
    <div class="row justify-content-center">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		    <div class="form-group">
		        <label for="obs_mov">Observaciones del Movimiento</label>
		        <input type="text" align="justify" maxlength="90" name="obs_mov" class="form-control" value="{{$movimiento->obs_mov}}" placeholder="Observaciones...">
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