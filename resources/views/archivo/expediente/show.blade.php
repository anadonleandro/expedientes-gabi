@extends ('layouts.admin')

@section ('contenido')

<div class="row justify-content-center">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3>DATOS DEL EXPEDIENTE</h3>
    </div>
</div>
   
    @foreach($expediente as $exp)

        <div class="row justify-content-center">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label for="id_exp">NÚMERO</label>
                    <p>{{$exp->id_exp}}</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label for="fecha_alta">REGISTRADO</label>
                    <p>
                        <?php
                            $fecha = ($exp->fecha_alta);
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
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label for="tipo">CAUSA</label>
                    <p>{{$exp->tipo}}</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="abogado">RESPONSABLE</label>
                    <p>{{$exp->abogado}}</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="id_persona">REPRESENTADO</label>
                    <p>{{$exp->cliente}}</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="cuij">CUIJ</label>
                    <p>
                        <?php
                            $cuij = ($exp->cuij);
                            if ($cuij > 0)
                            {
                              echo  $cuij;
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
                    <label for="caratula">CARÁTULA</label>
                    <p align="justify">{{$exp->caratula}}</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">  
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="obs">OBSERVACIONES</label>
                    <p align="justify">
                        <?php
                            $obs = ($exp->obs);
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
                <h3>PARTE CONTRARIA</h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="nombre_contraria">APELLIDO Y NOMBRES</label>
                    <p>
                        <?php
                            $nomcontraria = ($exp->nombre_contraria);
                            if(!empty($nomcontraria))
                            {
                            echo  $nomcontraria;
                            }
                            else
                            {
                            echo "<font color='#FF0000'>SIN DATOS</font>";
                            } 
                        ?>  
                    </p>
                </div> 
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="abogado_contraria">ABOGADO</label>
                    <p>
                        <?php
                            $abocontraria = ($exp->abogado_contraria);
                            if(!empty($abocontraria))
                            {
                            echo  $abocontraria;
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

    @if($exp->tipo=='SINIESTRO')
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
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3>ADICIONAL SINIESTRO</h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label>FECHA SINIESTRO</label>
                    <p>
                        <?php
                            $fechasiniestro = ($exp->fechasiniestro);
                            if ($fechasiniestro > 0)
                            {
                              $fechasiniestro=date("d-m-Y",strtotime($fechasiniestro));
                              echo  $fechasiniestro;
                            }
                            else
                            {
                              echo "<font color='#FF0000'>SIN DATOS</font>";
                            } 
                        ?>  
                    </p>
                </div> 
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label>FECHA PODER</label>
                    <p>
                        <?php
                            $fechapoder = ($exp->fechapoder);
                            if ($fechapoder > 0)
                            {
                              $fechapoder=date("d-m-Y",strtotime($fechapoder));
                              echo  $fechapoder;
                            }
                            else
                            {
                              echo "<font color='#FF0000'>SIN DATOS</font>";
                            } 
                        ?>  
                    </p>
                </div> 
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label>PODER</label>
                    <p>
                        @if ($exp->poder=='SI')
                            <?php
                                echo  $exp->poder;
                            ?>
                        @else
                            <?php
                                echo "<font color='#FF0000'>SIN DATOS</font>";
                            ?>
                        @endif
                    </p>
                </div> 
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label>PACTO CUOTA LITIS</label>
                    <p>
                        @if ($exp->cuotalitis=='SI')
                            <?php
                                echo  $exp->cuotalitis;
                            ?>
                        @else
                            <?php
                                echo "<font color='#FF0000'>SIN DATOS</font>";
                            ?>
                        @endif
                    </p>
                </div> 
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label>PEDIDO HC</label>
                    <p>
                        @if ($exp->historiaclinica=='SI')
                            <?php
                                echo  $exp->historiaclinica;
                            ?>
                        @else
                            <?php
                                echo "<font color='#FF0000'>SIN DATOS</font>";
                            ?>
                        @endif
                    </p>
                </div> 
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label>DNI</label>
                    <p>
                        @if ($exp->dni=='SI')
                            <?php
                                echo  $exp->dni;
                            ?>
                        @else
                            <?php
                                echo "<font color='#FF0000'>SIN DATOS</font>";
                            ?>
                        @endif
                    </p>
                </div> 
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label>TARJETA VERDE, AZUL, ETC</label>
                    <p>
                        @if ($exp->tarjeta=='SI')
                            <?php
                                echo  $exp->tarjeta;
                            ?>
                        @else
                            <?php
                                echo "<font color='#FF0000'>SIN DATOS</font>";
                            ?>
                        @endif
                    </p>
                </div> 
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label>LICENCIA DE CONDUCIR</label>
                    <p>
                        @if ($exp->licencia=='SI')
                            <?php
                                echo  $exp->licencia;
                            ?>
                        @else
                            <?php
                                echo "<font color='#FF0000'>SIN DATOS</font>";
                            ?>
                        @endif
                    </p>
                </div> 
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label>CERTIFICACION POLICIAL</label>
                    <p>
                        @if ($exp->certificacion=='SI')
                            <?php
                                echo  $exp->certificacion;
                            ?>
                        @else
                            <?php
                                echo "<font color='#FF0000'>SIN DATOS</font>";
                            ?>
                        @endif
                    </p>
                </div> 
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label>POLIZA SEGURO + DENUNCIA ADMIN.</label>
                    <p>
                        @if ($exp->polizadenuncia=='SI')
                            <?php
                                echo  $exp->polizadenuncia;
                            ?>
                        @else
                            <?php
                                echo "<font color='#FF0000'>SIN DATOS</font>";
                            ?>
                        @endif
                    </p>
                </div> 
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label>FECHA PEDIDO HC</label>
                    <p>
                        <?php
                            $fechapedidohc = ($exp->fechapedidohc);
                            if ($fechapedidohc > 0)
                            {
                              $fechapedidohc=date("d-m-Y",strtotime($fechapedidohc));
                              echo  $fechapedidohc;
                            }
                            else
                            {
                              echo "<font color='#FF0000'>SIN DATOS</font>";
                            } 
                        ?>  
                    </p>
                </div> 
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label>FECHA ENTREGA HC (estimativa)</label>
                    <p>
                        <?php
                            $fechaentregahc = ($exp->fechaentregahc);
                            if ($fechaentregahc > 0)
                            {
                              $fechaentregahc=date("d-m-Y",strtotime($fechaentregahc));
                              echo  $fechaentregahc;
                            }
                            else
                            {
                              echo "<font color='#FF0000'>SIN DATOS</font>";
                            } 
                        ?>  
                    </p>
                </div> 
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label>FOTOS (VEHÍCULO/LESIONADO)</label>
                    <p>
                        @if ($exp->foto=='SI')
                            <?php
                                echo  $exp->foto;
                            ?>
                        @else
                            <?php
                                echo "<font color='#FF0000'>SIN DATOS</font>";
                            ?>
                        @endif
                    </p>
                </div> 
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label>AMPLIACIÓN HC (MÁS ESTUDIOS)</label>
                    <p>
                        @if ($exp->ampliarhc=='SI')
                            <?php
                                echo  $exp->ampliarhc;
                            ?>
                        @else
                            <?php
                                echo "<font color='#FF0000'>SIN DATOS</font>";
                            ?>
                        @endif
                    </p>
                </div> 
            </div>
        </div>  
        <div class="row justify-content-center">  
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label>RECIBOS (MEDICOS, TAXI, SUELDO)</label>
                    <p>
                        @if ($exp->recibo=='SI')
                            <?php
                                echo  $exp->recibo;
                            ?>
                        @else
                            <?php
                                echo "<font color='#FF0000'>SIN DATOS</font>";
                            ?>
                        @endif
                    </p>
                </div> 
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label>CONFECCIÓN DE PRESUPUESTO</label>
                    <p>
                        @if ($exp->presupuesto=='SI')
                            <?php
                                echo  $exp->presupuesto;
                            ?>
                        @else
                            <?php
                                echo "<font color='#FF0000'>SIN DATOS</font>";
                            ?>
                        @endif
                    </p>
                </div> 
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label>CONFECCIÓN DE DEMANDA</label>
                    <p>
                        @if ($exp->escrito=='SI')
                            <?php
                                echo  $exp->escrito;
                            ?>
                        @else
                            <?php
                                echo "<font color='#FF0000'>SIN DATOS</font>";
                            ?>
                        @endif
                    </p>
                </div> 
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label>FECHA RECIBIDA HC</label>
                    <p>
                        <?php
                            $fecharecibohc = ($exp->fecharecibohc);
                            if ($fecharecibohc > 0)
                            {
                              $fecharecibohc=date("d-m-Y",strtotime($fecharecibohc));
                              echo  $fecharecibohc;
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
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label>PRESENTAR CARPETA EN SEGURO</label>
                    <p>
                        @if ($exp->presentar=='SI')
                            <?php
                                echo  $exp->presentar;
                            ?>
                        @else
                            <?php
                                echo "<font color='#FF0000'>SIN DATOS</font>";
                            ?>
                        @endif
                    </p>
                </div> 
            </div>
        </div>
        <div class="row justify-content-center"> 
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label>FECHA PERICIA MEDICA</label>
                    <p>
                        <?php
                            $fechamedica = ($exp->fechamedica);
                            if ($fechamedica > 0)
                            {
                              $fechamedica=date("d-m-Y",strtotime($fechamedica));
                              echo  $fechamedica;
                            }
                            else
                            {
                              echo "<font color='#FF0000'>SIN DATOS</font>";
                            } 
                        ?>  
                    </p>
                </div> 
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                    <label>LUGAR PERICIA MEDICA</label>
                    <p>
                        <?php
                            $lugarmedica = ($exp->lugarmedica);
                            if(!empty($lugarmedica))
                            {
                            echo  $lugarmedica;
                            }
                            else
                            {
                            echo "<font color='#FF0000'>SIN DATOS</font>";
                            } 
                        ?>  
                    </p>
                </div> 
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label>HORA PERICIA MEDICA</label>
                    <p>
                        <?php
                            $horamedica = ($exp->horamedica);
                            if(!empty($horamedica))
                            {
                            echo  $horamedica;
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
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label>FECHA PERICIA MECANICA</label>
                    <p>
                        <?php
                            $fechamecanica = ($exp->fechamecanica);
                            if ($fechamecanica > 0)
                            {
                              $fechamecanica=date("d-m-Y",strtotime($fechamecanica));
                              echo  $fechamecanica;
                            }
                            else
                            {
                              echo "<font color='#FF0000'>SIN DATOS</font>";
                            } 
                        ?>  
                    </p>
                </div> 
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                    <label>LUGAR PERICIA MECANICA</label>
                    <p>
                        <?php
                            $lugarmecanica = ($exp->lugarmecanica);
                            if(!empty($lugarmecanica))
                            {
                            echo  $lugarmecanica;
                            }
                            else
                            {
                            echo "<font color='#FF0000'>SIN DATOS</font>";
                            } 
                        ?>  
                    </p>
                </div> 
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label>HORA PERICIA MECANICA</label>
                    <p>
                        <?php
                            $horamecanica = ($exp->horamecanica);
                            if(!empty($horamecanica))
                            {
                            echo  $horamecanica;
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
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label>1) RECHAZO MONTO</label>
                    <p>
                        <?php
                            $rechazomonto1 = ($exp->rechazomonto1);
                            if(!empty($rechazomonto1))
                            {
                            echo  $rechazomonto1;
                            }
                            else
                            {
                            echo "<font color='#FF0000'>SIN DATOS</font>";
                            } 
                        ?>  
                    </p>
                </div> 
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label>FECHA</label>
                    <p>
                        <?php
                            $fechamonto1 = ($exp->fechamonto1);
                            if ($fechamonto1 > 0)
                            {
                              $fechamonto1=date("d-m-Y",strtotime($fechamonto1));
                              echo  $fechamonto1;
                            }
                            else
                            {
                              echo "<font color='#FF0000'>SIN DATOS</font>";
                            } 
                        ?>  
                    </p>
                </div> 
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label>2) RECHAZO MONTO</label>
                    <p>
                        <?php
                            $rechazomonto2 = ($exp->rechazomonto2);
                            if(!empty($rechazomonto2))
                            {
                            echo  $rechazomonto2;
                            }
                            else
                            {
                            echo "<font color='#FF0000'>SIN DATOS</font>";
                            } 
                        ?>  
                    </p>
                </div> 
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label>FECHA</label>
                    <p>
                        <?php
                            $fechamonto2 = ($exp->fechamonto2);
                            if ($fechamonto2 > 0)
                            {
                              $fechamonto2=date("d-m-Y",strtotime($fechamonto2));
                              echo  $fechamonto2;
                            }
                            else
                            {
                              echo "<font color='#FF0000'>SIN DATOS</font>";
                            } 
                        ?>  
                    </p>
                </div> 
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label>3) RECHAZO MONTO</label>
                    <p>
                        <?php
                            $rechazomonto3 = ($exp->rechazomonto3);
                            if(!empty($rechazomonto3))
                            {
                            echo  $rechazomonto3;
                            }
                            else
                            {
                            echo "<font color='#FF0000'>SIN DATOS</font>";
                            } 
                        ?>  
                    </p>
                </div> 
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label>FECHA</label>
                    <p>
                        <?php
                            $fechamonto3 = ($exp->fechamonto3);
                            if ($fechamonto3 > 0)
                            {
                              $fechamonto3=date("d-m-Y",strtotime($fechamonto3));
                              echo  $fechamonto3;
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
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label>4) RECHAZO MONTO</label>
                    <p>
                        <?php
                            $rechazomonto4 = ($exp->rechazomonto4);
                            if(!empty($rechazomonto4))
                            {
                            echo  $rechazomonto4;
                            }
                            else
                            {
                            echo "<font color='#FF0000'>SIN DATOS</font>";
                            } 
                        ?>  
                    </p>
                </div> 
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label>FECHA</label>
                    <p>
                        <?php
                            $fechamonto4 = ($exp->fechamonto4);
                            if ($fechamonto4 > 0)
                            {
                              $fechamonto4=date("d-m-Y",strtotime($fechamonto4));
                              echo  $fechamonto4;
                            }
                            else
                            {
                              echo "<font color='#FF0000'>SIN DATOS</font>";
                            } 
                        ?>  
                    </p>
                </div> 
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label>5) RECHAZO MONTO</label>
                    <p>
                        <?php
                            $rechazomonto5 = ($exp->rechazomonto5);
                            if(!empty($rechazomonto5))
                            {
                            echo  $rechazomonto5;
                            }
                            else
                            {
                            echo "<font color='#FF0000'>SIN DATOS</font>";
                            } 
                        ?>  
                    </p>
                </div> 
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label>FECHA</label>
                    <p>
                        <?php
                            $fechamonto5 = ($exp->fechamonto5);
                            if ($fechamonto5 > 0)
                            {
                              $fechamonto5=date("d-m-Y",strtotime($fechamonto5));
                              echo  $fechamonto5;
                            }
                            else
                            {
                              echo "<font color='#FF0000'>SIN DATOS</font>";
                            } 
                        ?>  
                    </p>
                </div> 
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label>ACEPTA MONTO</label>
                    <p>
                        <?php
                            $aceptamonto = ($exp->aceptamonto);
                            if(!empty($aceptamonto))
                            {
                            echo  $aceptamonto;
                            }
                            else
                            {
                            echo "<font color='#FF0000'>SIN DATOS</font>";
                            } 
                        ?>  
                    </p>
                </div> 
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label>FECHA</label>
                    <p>
                        <?php
                            $fechaacepta = ($exp->fechaacepta);
                            if ($fechaacepta > 0)
                            {
                              $fechaacepta=date("d-m-Y",strtotime($fechaacepta));
                              echo  $fechaacepta;
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
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label>FECHA CONVENIO</label>
                    <p>
                        <?php
                            $fechaconvenio = ($exp->fechaconvenio);
                            if ($fechaconvenio > 0)
                            {
                              $fechaconvenio=date("d-m-Y",strtotime($fechaconvenio));
                              echo  $fechaconvenio;
                            }
                            else
                            {
                              echo "<font color='#FF0000'>SIN DATOS</font>";
                            } 
                        ?>  
                    </p>
                </div> 
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label>PRESENTACIÓN DE BOLETA</label>
                    <p>
                        @if ($exp->boleta=='SI')
                            <?php
                                echo  $exp->boleta;
                            ?>
                        @else
                            <?php
                                echo "<font color='#FF0000'>SIN DATOS</font>";
                            ?>
                        @endif
                    </p>
                </div> 
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label>FECHA COBRO CHEQUE</label>
                    <p>
                        <?php
                            $fechacheque = ($exp->fechacheque);
                            if ($fechacheque > 0)
                            {
                              $fechacheque=date("d-m-Y",strtotime($fechacheque));
                              echo  $fechacheque;
                            }
                            else
                            {
                              echo "<font color='#FF0000'>SIN DATOS</font>";
                            } 
                        ?>  
                    </p>
                </div> 
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label>PAGO DAMNIFICADO</label>
                    <p>
                        @if ($exp->pago=='SI')
                            <?php
                                echo  $exp->pago;
                            ?>
                        @else
                            <?php
                                echo "<font color='#FF0000'>SIN DATOS</font>";
                            ?>
                        @endif
                    </p>
                </div> 
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label>COBRO HONORARIOS</label>
                    <p>
                        @if ($exp->cobro=='SI')
                            <?php
                                echo  $exp->cobro;
                            ?>
                        @else
                            <?php
                                echo "<font color='#FF0000'>SIN DATOS</font>";
                            ?>
                        @endif
                    </p>
                </div> 
            </div>
        </div> 
    </div>

    @endif    
    
    @endforeach

    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>MOVIMIENTOS DEL EXPEDIENTES</h3>
        </div>
    </div>
    @if($movimiento->count())
    <div class="row justify-content-center">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <table id="expedientes" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color:#A9D0F5">
                            <th>Fecha</th>
                            <th>Destino</th>
                            <th>Opciones</th>
                        </thead>
                        <tbody>
                            @foreach($movimiento as $mov)                            
                            <tr>
                                <td>
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
                                </td>
                                <td>{{$mov->destino_mov}}</td>                                
                                <td>
                                    <a href="{{URL::action('MovimientoController@edit',$mov->id_mov)}}"><button class="btn btn-success" title="Editar Movimiento"><i class="fa fa-edit"></i></button></a>
                                    <a href="{{URL::action('MovimientoController@show',$mov->id_mov)}}"><button class="btn btn-primary" title="Ver Movimiento"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
    </div>
    @else
    <h4><p class="text-danger">EL EXPEDIENTE N° {{$exp->id_exp}} NO POSEE MOVIMIENTOS...</p></h4>
    @endif
       

@endsection    