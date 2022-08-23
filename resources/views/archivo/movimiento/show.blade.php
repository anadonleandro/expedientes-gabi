@extends ('layouts.admin')

@section ('contenido')

<div class="row justify-content-center">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3>DATOS DEL MOVIMIENTO</h3>
    </div>
</div>

	@foreach($movimiento as $mov)

        <div class="row justify-content-center">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label for="id_exp">EXPEDIENTE</label>
                    <p>{{$mov->id_exp}}</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label for="fecha_alta">FECHA MVTO</label>
                    <p>
                        <?php
                            $fecha = ($mov->fecha_mov);
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
                    </p>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="form-group">
                    <label for="destino_mov">DATOS DEL MOVIMIENTO</label>
                    <p align="justify">
                        <?php
                            $destino = ($mov->destino_mov);
                            if(!empty($destino))
                            {
                            echo  $destino;
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="obs_mov">OBSERVACIONES DEL MOVIMIENTO</label>
                    <p align="justify">
                        <?php
                            $obs = ($mov->obs_mov);
                            if(!empty($obs))
                            {
                            echo  $obs;
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <a href="{{URL::action('MovimientoController@reportec',$mov->id_mov)}}" target="_blank" ><button class="btn btn-danger" title="Imprimir"><i class="fa fa-file-pdf-o"></i></button></a>
                </div>
            </div>
        </div>
    
    @endforeach

@endsection