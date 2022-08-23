@extends ('layouts.admin')

@section ('contenido')

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Listado de Representados</h3>
		@include('archivo.cliente.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead style="background-color:#A9D0F5">
					<th>Número</th>
					<th>Apellido y Nombres / Razón Social</th>
					<th>Documento</th>
					<th>Celular</th>
					<th>Opciones</th>
				</thead>
               @foreach ($personas as $per)
				<tr>
					<td>{{ $per->id_persona }}</td>
					<td>{{ $per->nombre }}</td>
					<td>{{ $per->dni_nro }}</td>
					<td>{{ $per->movil }}</td>
					<td>
						<a href="{{URL::action('ClienteController@edit',$per->id_persona)}}"><button class="btn btn-success" title="Editar Representado"><i class="fa fa-edit"></i></button></a>
						<a href="{{URL::action('ClienteController@show',$per->id_persona)}}"><button class="btn btn-primary" title="Ver Representado"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
						<a href="{{URL::action('ClienteController@reportec',$per->id_persona)}}" target="_blank" ><button class="btn btn-danger" title="Imprimir"><i class="fa fa-file-pdf-o"></i></button></a>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$personas->render()}}
	</div>
</div>

@endsection