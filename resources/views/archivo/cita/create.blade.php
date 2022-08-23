@extends ('layouts.admin')

@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Cita</h3>
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

	{!!Form::open(array('url'=>'archivo/cita','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}

    <div class="row justify-content-center">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="id_persona">Representado </label>
                <select name="id_persona" class="form-control selectpicker" id="id_persona" data-live-search="true" autofocus required>
                @foreach ($personas as $per)
                    <option value="{{$per->id_persona}}">{{$per->nombre}}</option>
                @endforeach                
                </select>                
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <a href="{{url('archivo/cliente/create')}}"><i class="fa fa-users"></i> Nuevo Representado</a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <div class="form-group">
                <label for="fecha_cita">Fecha</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                    <input type="date" name="fecha_cita" class="form-control" required value="{{old('fecha_cita')}}">
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
            <div class="form-group">
                <label for="hora_cita">Hora</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                    <input type="time" name="hora_cita" class="form-control" required value="{{old('hora_cita')}}">
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label>Estado</label>
                <select name="estado_cita" class="form-control" required>
                    <option disabled selected>Seleccione una opción...</option>
                    <option value="ACTIVA">ACTIVA</option>
                    <option value="CANCELADA">CANCELADA</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
            <div class="form-group">
                <label for="texto_cita">Texto</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-file-text-o" aria-hidden="true"></i></span>
                    <input type="text" maxlength="60" name="texto_cita" value="{{old('texto_cita')}}" class="form-control" placeholder="Texto...">
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">  
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <input type="hidden"  align="justify" name="abogado" class="form-control" value="{{Auth::user()->name}}">
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