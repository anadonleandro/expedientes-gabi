<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TS-Expedientes</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">    

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="{{url('/archivo/expediente')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>TS</b>E</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Expedientes</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="group-addon"><i class="fa fa-user" aria-hidden="true"></i>  USUARIO ON-LINE:  </span>
                   {{ Auth::user()->name }} 
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    
                    <p>
                      SISTEMA DE GESTION PARA REGISTRO DE EXPEDIENTES         
                      <small>CONTACTO</small>
                      <small>Email: anadonleandro@gmail.com</small>
                      <small>Tel: 0342-154789156 Santa Fe, Argentina</small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            CERRAR SESION
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                      </form>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Representados</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('archivo/cliente')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Listado General</a></li>
                <li><a href="{{url('archivo/cliente/create')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Nuevo Representado</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar"></i>
                <span> Citas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('archivo/cita')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Listado General</a></li>
                <li><a href="{{url('archivo/cita/create')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Nueva Cita</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder-open"></i>
                <span>Expedientes</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('archivo/expediente')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Listado Activos</a></li>
                <li><a href="{{url('archivo/expediente/create')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Nuevo Expediente</a></li>
                <li><a href="{{url('archivo/movimiento/create')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Salidas/Reingresos</a></li>
                <li><a href="{{url('/inactivo')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Listado Cerrados</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-binoculars"></i>
                <span>Consultas</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('/consulta')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Por Número de Expte</a></li>
                <li><a href="{{url('/consulta3')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Por Número CUIJ</a></li>
                <li><a href="{{url('/fecha')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Por Fechas</a></li> 
                <li><a href="{{url('/consulta6')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Por Carátula</a></li> 
                <li><a href="{{url('/consulta7')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Por Causa</a></li>
                @if(Auth::user()->name=='Administrador')
                <li><a href="{{url('/consulta8')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Por Responsable</a></li>
                @endif
                <li><a href="{{url('/consulta4')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Por Parte Contraria</a></li> 
                <li><a href="{{url('/consulta5')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Por Abogado Contraria</a></li>               
              </ul>
            </li>
                       
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user-plus"></i> <span>Usuarios</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('archivo/usuario')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Listado General</a></li>
                <li><a href="{{url('archivo/usuario/create')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Nuevo Usuario</a></li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema de Gestión de Expedientes</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <!--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
		                          <!--Contenido-->
                              @yield('contenido')
		                          <!--Fin Contenido-->
                           </div>
                        </div>
		                    
                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Versión</b> 1.1.2018
        </div>
        <strong>Copyright &copy; TecnoSystems 2.0</strong> All rights reserved.
      </footer>

      
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
    
  </body>
</html>
