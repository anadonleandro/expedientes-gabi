@extends ('layouts.admin')

@section ('contenido')

<div class="row justify-content-center">	
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Listado de Expedientes Cerrados</h3>
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
					<th>Cerrado</th>
					<th>Opciones</th>
				</thead>
				@foreach ($expedientes as $exp)
				@if($exp->abogado==Auth::user()->name && $exp->estado=='0' || Auth::user()->name=='Administrador' && $exp->estado=='0')
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
						<?php
                            $fechacierre = ($exp->fechafinalizado);
                            if ($fechacierre > 0)
                            {
                              $fechacierre=date("d-m-Y",strtotime($fechacierre));
                              echo  $fechacierre;
                            }
                            else
                            {
                            echo "SIN DATOS";
                            } 
                        ?>   
					</td>
					<td>
						<a href="{{URL::action('ExpedienteController@show',$exp->id_exp)}}"><button class="btn btn-primary" title="Ver Expediente"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
						<a href="{{URL::action('ExpedienteInacticoController@reportec',$exp->id_exp)}}" target="_blank"><button class="btn btn-danger" title="Imprimir"><i class="fa fa-file-pdf-o"></i></button></a>
					</td>
				</tr>
				@elseif(Auth::user()->name=='Administrador' && $exp->estado=='0')
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
						<?php
                            $fechacierre = ($exp->fechafinalizado);
                            if ($fechacierre > 0)
                            {
                              $fechacierre=date("d-m-Y",strtotime($fechacierre));
                              echo  $fechacierre;
                            }
                            else
                            {
                            echo "SIN DATOS";
                            } 
                        ?>   
					</td>
					<td>
						<a href="{{URL::action('ExpedienteController@show',$exp->id_exp)}}"><button class="btn btn-primary" title="Ver Expediente"><i class="fa fa-eye" aria-hidden="true"></i></button></a>											
						<a href="{{URL::action('ExpedienteInacticoController@reportec',$exp->id_exp)}}" target="_blank"><button class="btn btn-danger" title="Imprimir"><i class="fa fa-file-pdf-o"></i></button></a>
					</td>
				</tr>
				@endif
				@endforeach
			</table>
		</div>
		{{$expedientes->render()}} 
	</div>
</div>
		
@endsection