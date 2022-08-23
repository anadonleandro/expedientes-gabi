<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-delete-{{$exp->id_exp}}">
	{{Form::Open(array('action'=>array('ExpedienteController@destroy',$exp->id_exp),'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Cerrar Expediente</h4>
			</div>
			<div class="modal-body">
				<p>Confirma CERRAR el expediente</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
				<button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Confirmar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}

</div>
