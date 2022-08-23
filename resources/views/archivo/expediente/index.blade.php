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
<div class="row justify-content-center">	
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Listado de Expedientes Activos</h3>
		@include('archivo.expediente.search')
	</div>
</div>
<div class="row justify-content-center">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead style="background-color:#A9D0F5">
					<th>Número</th>
					<th>Registrado</th>
					<th>Carátula</th>
					<th>Causa</th>
					<th>Opciones</th>
				</thead>
				@foreach ($expedientes as $exp)
				@if($exp->abogado==Auth::user()->name && $exp->estado=='1' || Auth::user()->name=='Administrador' && $exp->estado=='1')
				<tr>
					<td>{{ $exp->id_exp }}</td>
					<td>
						<?php
                            $fecha = ($exp->fecha_alta);
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
					<td>{{ $exp->caratula }}</td>
					<td>{{ $exp->tipo }}</td>
					<td>
						<a href="{{URL::action('ExpedienteController@edit',$exp->id_exp)}}"><button class="btn btn-success" title="Editar Expediente"><i class="fa fa-edit"></i></button></a>
						<a href="{{URL::action('ExpedienteController@show',$exp->id_exp)}}"><button class="btn btn-primary" title="Ver Expediente"><i class="fa fa-eye" aria-hidden="true"></i></button></a>											
						<a href="{{URL::action('ExpedienteController@reportec',$exp->id_exp)}}" target="_blank"><button class="btn btn-danger" title="Imprimir"><i class="fa fa-file-pdf-o"></i></button></a>
						<a href="" data-target="#modal-delete-{{$exp->id_exp}}" data-toggle="modal"><button class="btn btn-danger" title="Cerrar Expediente"><i class="fa fa-close"></i></button></a>
					</td>
				</tr>
				@include('archivo.expediente.modal')
				@endif
				@endforeach
			</table>
		</div>
		{{$expedientes->render()}} 
	</div>
</div>
		
@endsection
