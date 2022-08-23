@extends ('layouts.admin')

@section ('contenido')
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	@if(Session::has('message'))
	<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-label="close"><spam aria-hidden="true">Aceptar</spam></button> 
		{{Session::get('message')}}
	</div>
	@endif
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Listado de Citas</h3>
		@include('archivo.cita.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead style="background-color:#A9D0F5">
					<th>Fecha</th>
					<th>Hora</th>
					<th>Representado</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($citas as $cita)
				<tr>
					<td>
						<?php
                            $fecha = ($cita->fecha_cita);
                            if ($fecha > 0)
                            {
                              $fecha=date("d-m-Y",strtotime($fecha));
                              echo  $fecha;
                            }
                            else
                            {
                            echo "SIN DATOS";
                            } 
                        ?>   
					</td>
					<td>{{ $cita->hora_cita}}</td>
					<td>{{ $cita->cliente}}</td>
					<td>{{ $cita->estado_cita}}</td>
					<td>
						<a href="{{URL::action('CitaController@edit',$cita->id_cita)}}"><button class="btn btn-success" title="Editar Cita"><i class="fa fa-edit"></i></button></a>
						<a href="{{URL::action('CitaController@show',$cita->id_cita)}}"><button class="btn btn-primary" title="Ver Cita"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$citas->render()}}
	</div>
</div>

@endsection