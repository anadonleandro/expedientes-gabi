@extends ('layouts.admin')

@section ('contenido')

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Listado de Usuarios</h3>
		@include('archivo.usuario.search')
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead style="background-color:#A9D0F5">
					<th>Apellido y Nombres</th>
					<th>Email</th>
					<th>Opciones</th>
				</thead>
               @foreach ($usuarios as $usuario)               
				<tr>
					<td>{{ $usuario->name}}</td>
					<td>{{ $usuario->email}}</td>
					<td>
						<a href="{{URL::action('UsuarioController@edit',$usuario->id)}}"><button class="btn btn-success" title="Editar Usuario"><i class="fa fa-edit"></i></button></a>
						<a href="" data-target="#modal-delete-{{$usuario->id}}" data-toggle="modal"><button class="btn btn-danger" title="Eliminar Usuario"><i class="fa fa-trash"></i></button></a>
					</td>
				</tr>
				@include('archivo.usuario.modal')
				@endforeach
			</table>
		</div>
		{{$usuarios->render()}}
	</div>
</div>

@endsection