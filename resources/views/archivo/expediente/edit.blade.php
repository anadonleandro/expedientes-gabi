@extends ('layouts.admin')

@section ('contenido')

<div class="row justify-content-center">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3>Editar Expediente: {{ $expediente->id_exp}}</h3>
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

{!! Form::model($expediente,['url'=>['archivo/expediente',$expediente->id_exp],'method'=>'PATCH']) !!}
		{{Form::token()}}

		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		        <div class="form-group">
    				<label>Causa</label>
    				<select name="tipo" class="form-control" autofocus>
    				   @if ($expediente->tipo=='SINIESTRO')
    				   <option value="SINIESTRO" selected>SINIESTRO</option>
                       <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                       <option value="CIVIL">CIVIL</option>
                       <option value="LABORAL">LABORAL</option>
                       <option value="PENAL">PENAL</option>
                       <option value="FAMILIA">FAMILIA</option>
                       @elseif ($expediente->tipo=='ADMINISTRATIVO')
                       <option value="SINIESTRO">SINIESTRO</option>
                       <option value="ADMINISTRATIVO" selected>ADMINISTRATIVO</option>
                       <option value="CIVIL">CIVIL</option>
                       <option value="LABORAL">LABORAL</option>
                       <option value="PENAL">PENAL</option>
                       <option value="FAMILIA">FAMILIA</option>
                       @elseif ($expediente->tipo=='CIVIL')
                       <option value="SINIESTRO">SINIESTRO</option>
                       <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                       <option value="CIVIL" selected>CIVIL</option>
                       <option value="LABORAL">LABORAL</option>
                       <option value="PENAL">PENAL</option>
                       <option value="FAMILIA">FAMILIA</option>
                       @elseif ($expediente->tipo=='LABORAL')
                       <option value="SINIESTRO">SINIESTRO</option>
                       <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                       <option value="CIVIL">CIVIL</option>
                       <option value="LABORAL" selected>LABORAL</option>
                       <option value="PENAL">PENAL</option>
                       <option value="FAMILIA">FAMILIA</option>
                       @elseif ($expediente->tipo=='PENAL')
                       <option value="SINIESTRO">SINIESTRO</option>
                       <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                       <option value="CIVIL">CIVIL</option>
                       <option value="LABORAL">LABORAL</option>
                       <option value="PENAL" selected>PENAL</option>
                       <option value="FAMILIA">FAMILIA</option>
                       @else
                       <option value="SINIESTRO">SINIESTRO</option>
                       <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                       <option value="CIVIL">CIVIL</option>
                       <option value="LABORAL">LABORAL</option>
                       <option value="PENAL">PENAL</option>
                       <option value="FAMILIA" selected>FAMILIA</option>
                       @endif
    				</select>
    			</div>
		    </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label for="id_persona">Representado</label>
    				<select name="id_persona" class="form-control selectpicker" id="id_persona" data-live-search="true">
    				@foreach ($personas as $per)
    				   @if ($per->id_persona==$expediente->id_persona)
                       <option value="{{$per->id_persona}}" selected>{{$per->nombre}}</option>
                       @else
                       <option value="{{$per->id_persona}}">{{$per->nombre}}</option>
                       @endif
    				@endforeach
    				</select>
    			</div>
    		</div>
    	</div>
		<div class="row justify-content-center">
		    <div class="col-lg-12 col-md-12 col-sm-712 col-xs-12">
		        <div class="form-group">
		            <label for="caratula">Carátula</label>
		            <input type="text" align="justify" name="caratula" maxlength="90" class="form-control" value="{{$expediente->caratula}}" placeholder="Carátula...">
		        </div>
		    </div>
		</div>
		<div class="row justify-content-center">  
		    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		        <div class="form-group">
		            <label for="obs">Observaciones</label>
		            <input type="text" align="justify" name="obs" maxlength="90" class="form-control" value="{{$expediente->obs}}" placeholder="Observaciones...">
		        </div>   
		    </div>
		</div>
    <div class="row justify-content-center">  
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
              <label for="abogado">Responsable</label>
                <select name="abogado" class="form-control selectpicker" id="abogado" data-live-search="true">
                  @foreach ($usuarios as $usu)
                    @if ($usu->name==$expediente->abogado)
                      <option value="{{$usu->name}}" selected>{{$usu->name}}</option>
                    @else
                      <option value="{{$usu->name}}">{{$usu->name}}</option>
                    @endif
                  @endforeach
                </select>
            </div>   
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="cuij">Cuij</label>
                <input type="text" name="cuij" maxlength="15" class="form-control" value="{{$expediente->cuij}}" placeholder="Cuij...">
            </div>   
        </div>
    </div>
		<div class="row justify-content-center">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		    	<h4>PARTE CONTRARIA</h4>
		    </div>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		    	<div class="form-group">
		        	<label for="nombre_contraria">Apellido y Nombres</label>
		        	<input type="text" name="nombre_contraria" class="form-control" maxlength="30" value="{{$expediente->nombre_contraria}}" placeholder="Apellido y Nombres...">
		    	</div> 
		    </div>
		    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		    	<div class="form-group">
		      	 	<label for="abogado_contraria">Abogado</label>
		       		<input type="text" name="abogado_contraria" class="form-control" maxlength="30" value="{{$expediente->abogado_contraria}}" placeholder="Abogado...">
		   	 	</div> 
			</div>
		</div>
    <br>
  @if($expediente->tipo=='SINIESTRO')
    <div class="row justify-content-center"> 
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <button id="adicionalsiniestro" type="button" class="btn btn-success"
                 value="siniestro" onclick="mostrarAdicionalSiniestro()"/><i class="fa fa-sign-in"></i> Adicional SINIESTRO
                </button>
            </div>
    </div> 
    <br>
    <script type="text/javascript">
        {
            function mostrarAdicionalSiniestro()
            {
                document.getElementById("mostrarAdicionalSiniestro").style.display = 'block';
                document.getElementById("adicionalsiniestro").checked = true;
            }
             
        }
    </script>  
    <div id="mostrarAdicionalSiniestro" hidden>

      <div class="panel panel-default">
        <div class="panel-heading" align="center">
            <strong>
                    DATOS ADICIONALES DEL SINIESTRO
            </strong>
        </div>
      </div>
      <table class="table table-striped">
        <tr>
            <th width="265">Fecha Siniestro&nbsp;&nbsp;
                <input type="date" size="25" maxlength="25" 
                value="{{$expediente->fechasiniestro}}" name="fechasiniestro">
            </th>
            <th width="530">Fecha Poder&nbsp;&nbsp; 
                <input type="date" size="25" maxlength="25" 
                value="{{$expediente->fechapoder}}" name="fechapoder">
            </th>
        </tr>
      </table>
      <div class="panel panel-default">
        <div class="panel-heading" align="left">
          <strong>
           1° DIA) - DOCUMENTACION 
          </strong>
        </div>
      </div>
      <div class="row justify-content-center"> 
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <label>Poder [x3]</label>
                <select name="poder" class="form-control">
                  @if($expediente->poder=='SI')
                  <option value="SI" selected>SI</option>
                  <option value="NO">NO</option>
                  @else
                  <option value="SI">SI</option>
                  <option value="NO" selected>NO</option>
                  @endif
                </select>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <label>Pacto Cuota Litis [x3]</label>
                <select name="cuotalitis" class="form-control">
                  @if($expediente->cuotalitis=='SI')
                  <option value="SI" selected>SI</option>
                  <option value="NO">NO</option>
                  @else
                  <option value="SI">SI</option>
                  <option value="NO" selected>NO</option>
                  @endif
                </select>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <label>Pedido HC (Cullen [x3] / Samco [x2])</label>
                <select name="historiaclinica" class="form-control">
                  @if($expediente->historiaclinica=='SI')
                  <option value="SI" selected>SI</option>
                  <option value="NO">NO</option>
                  @else
                  <option value="SI">SI</option>
                  <option value="NO" selected>NO</option>
                  @endif
                </select>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <label>DNI</label>
                <select name="dni" class="form-control">
                  @if($expediente->dni=='SI')
                  <option value="SI" selected>SI</option>
                  <option value="NO">NO</option>
                  @else
                  <option value="SI">SI</option>
                  <option value="NO" selected>NO</option>
                  @endif
                </select>
            </div>
      </div>
      <br>
      <div class="row justify-content-center">
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <label>Tarjeta Verde, Azul, etc.</label>
              <select name="tarjeta" class="form-control">
                @if($expediente->tarjeta=='SI')
                <option value="SI" selected>SI</option>
                <option value="NO">NO</option>
                @else
                <option value="SI">SI</option>
                <option value="NO" selected>NO</option>
                @endif
              </select>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <label>Licencia de Conducir</label>
              <select name="licencia" class="form-control">
                @if($expediente->licencia=='SI')
                <option value="SI" selected>SI</option>
                <option value="NO">NO</option>
                @else
                <option value="SI">SI</option>
                <option value="NO" selected>NO</option>
                @endif
              </select>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <label>Certif. Policial (fotocopia u orig.)</label>
              <select name="certificacion" class="form-control">
                @if($expediente->certificacion=='SI')
                <option value="SI" selected>SI</option>
                <option value="NO">NO</option>
                @else
                <option value="SI">SI</option>
                <option value="NO" selected>NO</option>
                @endif
              </select>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <label>Póliza de Seguro + Denuncia Admin.</label>
              <select name="polizadenuncia" class="form-control">
                @if($expediente->polizadenuncia=='SI')
                <option value="SI" selected>SI</option>
                <option value="NO">NO</option>
                @else
                <option value="SI">SI</option>
                <option value="NO" selected>NO</option>
                @endif
              </select>
          </div>
      </div>
      <br>
      <div class="panel panel-default">
        <div class="panel-heading" align="left">
          <strong>
           2° DIA) - HISTORIA CLINICA 
          </strong>
        </div>
      </div>
      <table class="table table-striped">
        <tr>
            <th width="265">Fecha Pedido HC&nbsp;&nbsp;
                <input type="date" size="25" maxlength="25" 
                value="{{$expediente->fechapedidohc}}" name="fechapedidohc">
            </th>
            <th width="530">Fecha Entrega HC (estimativa)&nbsp;&nbsp;
                <input type="date" size="25" maxlength="25" 
                value="{{$expediente->fechaentregahc}}" name="fechaentregahc">
            </th>
        </tr>
      </table>
      <div class="panel panel-default">
        <div class="panel-heading" align="left">
          <strong>
           3° DIA) - AMPLIAR DOCUMENTACION (hasta que se reciba HC)
          </strong>
        </div>
      </div>
      <div class="row justify-content-center">
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <label>Fotos del Vehículo y del Lesionado</label>
              <select name="foto" class="form-control">
                @if($expediente->foto=='SI')
                <option value="SI" selected>SI</option>
                <option value="NO">NO</option>
                @else
                <option value="SI">SI</option>
                <option value="NO" selected>NO</option>
                @endif
              </select>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <label>Recibos (medicamentos, taxi, sueldo)</label>
              <select name="recibo" class="form-control">
                @if($expediente->recibo=='SI')
                <option value="SI" selected>SI</option>
                <option value="NO">NO</option>
                @else
                <option value="SI">SI</option>
                <option value="NO" selected>NO</option>
                @endif
              </select>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <label>Ampliación HC (con demás estudios)</label>
              <select name="ampliarhc" class="form-control">
                @if($expediente->ampliarhc=='SI')
                <option value="SI" selected>SI</option>
                <option value="NO">NO</option>
                @else
                <option value="SI">SI</option>
                <option value="NO" selected>NO</option>
                @endif
              </select>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <label>Confección de Presupuesto</label>
              <select name="presupuesto" class="form-control">
                @if($expediente->presupuesto=='SI')
                <option value="SI" selected>SI</option>
                <option value="NO">NO</option>
                @else
                <option value="SI">SI</option>
                <option value="NO" selected>NO</option>
                @endif
              </select>
          </div>              
      </div>
      <br>
      <div class="row justify-content-center">
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <label>Confección de Demanda</label>
              <select name="escrito" class="form-control">
                @if($expediente->escrito=='SI')
                <option value="SI" selected>SI</option>
                <option value="NO">NO</option>
                @else
                <option value="SI">SI</option>
                <option value="NO" selected>NO</option>
                @endif
              </select>
          </div>              
      </div>
      <br> 
      <div class="panel panel-default">
        <div class="panel-heading" align="left">
          <strong>
           LUEGO DE RECIBIR LA HISTORIA CLINICA 
          </strong>
        </div>
      </div>
      <div class="row justify-content-center">
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <label>Fecha Recepción HC</label>
              <input type="date" size="25" maxlength="25" 
              value="{{$expediente->fecharecibohc}}" name="fecharecibohc">
          </div> 
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <label>Presentación de Carpeta en Seguro</label>
              <select name="presentar" class="form-control">
                @if($expediente->presentar=='SI')
                <option value="SI" selected>SI</option>
                <option value="NO">NO</option>
                @else
                <option value="SI">SI</option>
                <option value="NO" selected>NO</option>
                @endif
              </select>
          </div>       
      </div>
      <br>
      <div class="panel panel-default">
        <div class="panel-heading" align="left">
          <strong>
           PERICIAS 
          </strong>
        </div>
      </div>   
      <table class="table table-striped">
        <tr>
            <th width="265">Fecha Médica&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="date" size="25" maxlength="25" 
                value="{{$expediente->fechamedica}}" name="fechamedica">
            </th>
            <th width="265">Lugar&nbsp;&nbsp;
                <input type="text" value="{{$expediente->lugarmedica}}" maxlength="60" name="lugarmedica" size="50">
            </th>
            <th width="265">Hora&nbsp;&nbsp;
                <input type="time" value="{{$expediente->horamedica}}" name="horamedica">
            </th>
        </tr>
      </table>
      <table class="table table-striped">
          <tr>
              <th width="265">Fecha Mecánica
                  <input type="date" size="25" maxlength="25" 
                  value="{{$expediente->fechamecanica}}" name="fechamecanica">
              </th>
              <th width="265">Lugar&nbsp;&nbsp;
                <input type="text" value="{{$expediente->lugarmecanica}}" maxlength="60" name="lugarmecanica" size="50">
              </th>
              <th width="265">Hora&nbsp;&nbsp;
                <input type="time" value="{{$expediente->horamecanica}}" name="horamecanica">
              </th>
          </tr>
      </table>
      <div class="panel panel-default">
          <div class="panel-heading" align="left">
            <strong>
           PERIODO DE NEGOCIACION 
            </strong>
          </div>
      </div>
      <table class="table table-striped">
              <tr>
                <th width="265">1) Rechazo de monto: $&nbsp;&nbsp;
                    <input type="text" value="{{$expediente->rechazomonto1}}" name="rechazomonto1" size="10">
                  </th>
                  <th width="730">Fecha&nbsp;&nbsp;
                      <input type="date" size="25" maxlength="25" 
                      value="{{$expediente->fechamonto1}}" name="fechamonto1">
                  </th>
              </tr>
              <tr>
                  <th width="265">2) Rechazo de monto: $&nbsp;&nbsp;
                    <input type="text" value="{{$expediente->rechazomonto2}}" name="rechazomonto2" size="10">
                  </th>
                  <th width="265">Fecha&nbsp;&nbsp;
                      <input type="date" size="25" maxlength="25" 
                      value="{{$expediente->fechamonto2}}" name="fechamonto2">
                  </th>
              </tr>
              <tr>
                  <th width="265">3) Rechazo de monto: $&nbsp;&nbsp;
                    <input type="text" value="{{$expediente->rechazomonto3}}" name="rechazomonto3" size="10">
                  </th>
                  <th width="265">Fecha&nbsp;&nbsp;
                      <input type="date" size="25" maxlength="25" 
                      value="{{$expediente->fechamonto3}}" name="fechamonto3">
                  </th>
              </tr>
              <tr>
                  <th width="265">4) Rechazo de monto: $&nbsp;&nbsp;
                    <input type="text" value="{{$expediente->rechazomonto4}}" name="rechazomonto4" size="10">
                  </th>
                  <th width="265">Fecha&nbsp;&nbsp;
                      <input type="date" size="25" maxlength="25" 
                      value="{{$expediente->fechamonto4}}" name="fechamonto4">
                  </th>
              </tr>
              <tr>
                  <th width="265">5) Rechazo de monto: $&nbsp;&nbsp;
                    <input type="text" value="{{$expediente->rechazomonto5}}" name="rechazomonto5" size="10">
                  </th>
                  <th width="265">Fecha&nbsp;&nbsp;
                      <input type="date" size="25" maxlength="25" 
                      value="{{$expediente->fechamonto5}}" name="fechamonto5">
                  </th>
              </tr>
              <tr>
                  <th width="265">Aceptación de monto: $&nbsp;&nbsp;
                    <input type="text" value="{{$expediente->aceptamonto}}" name="aceptamonto" size="10">
                  </th>
                  <th width="265">Fecha&nbsp;&nbsp;
                      <input type="date" size="25" maxlength="25" 
                      value="{{$expediente->fechaacepta}}" name="fechaacepta">
                  </th>
              </tr>
          </table>
          <div class="panel panel-default">
            <div class="panel-heading" align="left">
              <strong>
              CIERRE 
              </strong>
            </div>
          </div>
          <div class="row justify-content-center">
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                  <label>Fecha Firma Convenio</label>
                      <input type="date" size="25" maxlength="25" 
                      value="{{$expediente->fechaconvenio}}" name="fechaconvenio">
              </div> 
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                  <label>Presentación de Boleta</label>
                    <select name="boleta" class="form-control">
                        @if($expediente->boleta=='SI')
                        <option value="SI" selected>SI</option>
                        <option value="NO">NO</option>
                        @else
                        <option value="SI">SI</option>
                        <option value="NO" selected>NO</option>
                        @endif
                    </select>
              </div>  
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                  <label>Fecha Cobro Cheque</label>
                      <input type="date" size="25" maxlength="25" 
                      value="{{$expediente->fechacheque}}" name="fechacheque">
              </div>  
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                  <label>Pago a Damnificado (recibo x 3)</label>
                    <select name="pago" class="form-control">
                        @if($expediente->pago=='SI')
                        <option value="SI" selected>SI</option>
                        <option value="NO">NO</option>
                        @else
                        <option value="SI">SI</option>
                        <option value="NO" selected>NO</option>
                        @endif
                    </select>
              </div>      
          </div>
          <br>
          <div class="row justify-content-center">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                  <label>Cobro de Honorarios</label>
                    <select name="cobro" class="form-control">
                        @if($expediente->cobro=='SI')
                        <option value="SI" selected>SI</option>
                        <option value="NO">NO</option>
                        @else
                        <option value="SI">SI</option>
                        <option value="NO" selected>NO</option>
                        @endif
                    </select>
            </div>       
          </div>
          <br>
    </div>
  @endif

		<div class="row justify-content-center">  
		    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="form-group">
					<button class="btn btn-primary" type="submit"><i class="fa fa-check-square-o"></i> Guardar</button>
					<button class="btn btn-danger" type="reset"><i class="fa fa-close"></i> Cancelar</button>
				</div>   
		    </div>
		</div>

		{!! Form::close() !!} 
		
@endsection