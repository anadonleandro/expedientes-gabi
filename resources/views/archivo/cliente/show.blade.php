@extends ('layouts.admin')

@section ('contenido')

    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>DATOS DEL REPRESENTADO</h3>
        </div>
    </div>

 	@foreach($persona as $per)
    <div class="row justify-content-center">
    	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
    		<div class="form-group">
            	<label for="nombre">NOMBRE O RAZÓN SOCIAL</label>
            	<p>{{$per->nombre}}</p>
            </div>
    	</div>
    </div>
    <div class="row justify-content-center">
    	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
    		<div class="form-group">
    			<label for="direccion">DIRECCIÓN</label>
    			<p>
                    <?php
                        $direccion = ($per->direccion);
                        if(!empty($direccion))
                        {
                        echo  $direccion;
                        }
                        else
                        {
                        echo "<font color='#FF0000'>SIN DATOS</font>";
                        } 
                    ?>  
                </p>
    		</div>
    	</div>
    </div>
    <div class="row justify-content-center">
    	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="fecha_alta">FECHA DE ALTA</label>
                <p><?php
                            $fecha = ($per->fecha_alta);
                            if ($fecha > 0)
                            {
                              $fecha=date("d-m-Y",strtotime($fecha));
                              echo  $fecha;
                            }
                            else
                            {
                            echo "<font color='#FF0000'>SIN DATOS</font>";
                            } 
                        ?>   
                </p>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="dni_nro">DOCUMENTO</label>
                <p>
                   <?php
                        $docum = ($per->dni_nro);
                        if(!empty($docum))
                        {
                        echo  $docum;
                        }
                        else
                        {
                        echo "<font color='#FF0000'>SIN DATOS</font>";
                        } 
                    ?>   
                </p>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="telefono">TELÉFONO</label>
                <p> 
                    <?php
                        $tel = ($per->telefono);
                        if(!empty($tel))
                        {
                        echo  $tel;
                        }
                        else
                        {
                        echo "<font color='#FF0000'>SIN DATOS</font>";
                        } 
                    ?>   
                </p>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="movil">MÓVIL</label>
                <p>
                    <?php
                        $movil = ($per->movil);
                        if(!empty($movil))
                        {
                        echo  $movil;
                        }
                        else
                        {
                        echo "<font color='#FF0000'>SIN DATOS</font>";
                        } 
                    ?>   
                </p>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="fax">FAX</label>
                <p>
                    <?php
                        $fax = ($per->fax);
                        if(!empty($fax))
                        {
                        echo  $fax;
                        }
                        else
                        {
                        echo "<font color='#FF0000'>SIN DATOS</font>";
                        } 
                    ?>   
                </p>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="email">EMAIL</label>
                <p>
                    <?php
                        $mail = ($per->email);
                        if(!empty($mail))
                        {
                        echo  $mail;
                        }
                        else
                        {
                        echo "<font color='#FF0000'>SIN DATOS</font>";
                        } 
                    ?>   
                </p>
            </div>
        </div>
    </div>
    @endforeach

    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>EXPEDIENTES DEL CLIENTE</h3>
        </div>
    </div>
    @if($expediente->count())
    <div class="row justify-content-center">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <table id="expedientes" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color:#A9D0F5">
                            <th>Expediente</th>
                            <th>Registrado</th>
                            <th>Carátula</th>
                            <th>Cerrado</th>
                        </thead>
                        <tbody>
                            @foreach($expediente as $exp)
                            @if($exp->abogado==Auth::user()->name)
                            <tr>
                                <td>{{$exp->id_exp}}</td>
                                <td>
                                    <?php
                                        $fecha = ($exp->registrado);
                                        if ($fecha > 0)
                                        {
                                          $fecha=date("d-m-Y",strtotime($fecha));
                                          echo  $fecha;
                                        }
                                        else
                                        {
                                        echo "<font color='#FF0000'>SIN DATOS</font>";
                                        } 
                                    ?> 
                                </td>
                                <td>{{$exp->caratula}}</td>
                                <td>
                                    <?php
                                        $fecha = ($exp->fechafinalizado);
                                        if ($fecha > 0)
                                        {
                                          $fecha=date("d-m-Y",strtotime($fecha));
                                          echo  $fecha;
                                        }
                                        else
                                        {
                                        echo "<font color='#FF0000'>SIN DATOS</font>";
                                        } 
                                    ?> 
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
    </div> 
    @else
    <h4><p class="text-danger">EL CLIENTE "{{$per->nombre}}" NO POSEE EXPEDIENTES...</p></h4>
    @endif  

@endsection