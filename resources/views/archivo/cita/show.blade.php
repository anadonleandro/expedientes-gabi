@extends ('layouts.admin')

@section ('contenido')

    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>DATOS DE LA CITA</h3>
        </div>
    </div>

 	@foreach($cita as $cit)

    <div class="row justify-content-center">
    	<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
    		<div class="form-group">
            	<label for="fecha_cita">FECHA</label>
            	<p>
                    <?php
                        $fecha = ($cit->fecha_cita);
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
        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
            <div class="form-group">
                <label for="hora_cita">HORA</label>
                <p>
                    <?php
                        $horacita = ($cit->hora_cita);
                        if ($horacita > 0)
                        {
                        echo  $horacita;
                        }
                        else
                        {
                        echo "<font color='#FF0000'>SIN DATOS</font>";
                        } 
                    ?>   
                </p>
            </div>
        </div>
        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
            <div class="form-group">
                <label for="estado_cita">ESTADO</label>
                <p>{{$cit->estado_cita}}</p>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label for="texto_cita">TEXTO</label>
                <p>
                    <?php
                        $texto = ($cit->texto_cita);
                        if(!empty($texto))
                        {
                        echo  $texto;
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

    
@endsection