@extends ('layouts.admin')

@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Salidas / Reingresos</h3>
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

	{!! Form::open(array('url'=>'archivo/movimiento','method'=>'POST','autocomplete'=>'off')) !!}
	{{Form::token()}}

	<div class="row justify-content-center">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="form-group">
            <label for="id_exp">Expediente</label>
                <select name="id_exp" class="form-control selectpicker" id="id_exp" data-live-search="true" autofocus>
                    @foreach($expedientes as $expe)
                    	@if($expe->abogado==Auth::user()->name && $expe->estado=='1')
                    		<option value="{{$expe->id_exp}}">{{ $expe->id_exp}}</option>
                    	@endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		    <div class="form-group">
		        <label for="destino_mov">Datos del Movimiento</label>
		        <input type="text" align="justify" maxlength="70" name="destino_mov" class="form-control" placeholder="Datos...">
		    </div>        
		</div>
    </div>
    <div class="row justify-content-center">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		    <div class="form-group">
		        <label for="obs_mov">Observaciones del Movimiento</label>
		        <input type="text" align="justify" maxlength="90" name="obs_mov" class="form-control" placeholder="Observaciones...">
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

@endsection