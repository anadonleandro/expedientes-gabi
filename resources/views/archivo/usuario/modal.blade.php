	<div class="modal fade modal-slide-in-right" aria-hidden="true"
	role="dialog" tabindex="-1" id="modal-delete-{{$usuario->id}}">
	{{Form::Open(array('action'=>array('UsuarioController@destroy',$usuario->id),'method'=>'delete'))}}	
	@if(Auth::user()->name=='Administrador')
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Eliminar Usuario</h4>
			</div>
			<div class="modal-body">
				<p>Confirme si desea ELIMINAR el usuario seleccionado</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
				<button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Confirmar</button>
			</div>
		</div>
	</div>	
	@else
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Eliminar Usuario</h4>
			</div>
			<div class="modal-body">
				<p class="text-danger">PROCESO CANCELADO..!!! NO ESTA AUTORIZADO PARA ELIMINAR USUARIOS...</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
			</div>
		</div>
	</div>	
    <!--<h4><p class="text-danger">PROCESO CANCELADO..!!! NO ESTA AUTORIZADO PARA ELIMINAR USUARIOS...</p></h4>-->
	@endif 
	{{Form::Close()}} 	

</div>