
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Historia Clínica Med General | Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<!-- DataTables -->
<link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
  <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
      <li class="nav-item d-none d-sm-inline-block" style="background-color: yellow;font-size: 30px;">
      Sede: PRINCIPAL
      </li>
    </ul>

   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
      <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    JOSE <span class="caret"></span>

                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="http://localhost:8000/logout"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="http://localhost:8000/logout" method="POST" style="display: none;">
                                        <input type="hidden" name="_token" value="Dwf6fblUu6zA4XBpb4fMi1I8rR9AVpwznaLw5nYt">                                    </form>
                                </div>
                            </li>
          
         
      
    </ul>  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="http://localhost:8000/home" class="brand-link">
<img src="master.png" class="img-circle elevation-2" alt="User Image" width="40">
      
      <span class="brand-text font-weight-light">ADMIN MasterSalud</span>
    </a>

<div class="sidebar">
      <!-- Sidebar user panel (optional) -->
    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-archive"></i>
              <p>
                Archivo
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

            <li class="nav-item">
                <a href="http://localhost:8000/personal" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Personal</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="http://localhost:8000/centros" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Centros</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="http://localhost:8000/profesionales" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profesionales</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="http://localhost:8000/laboratorio" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laboratorios</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="http://localhost:8000/analisis" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Analisis</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="http://localhost:8000/servicios" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Servicios</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="http://localhost:8000/paquetes" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Paquetes</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="http://localhost:8000/pacientes" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pacientes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="http://localhost:8000/roles" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
            
              
              
            </ul>
          </li>

          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Movimientos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


            <li class="nav-item">
                <a href="http://localhost:8000/atenciones" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Atenciones</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="http://localhost:8000/gastos" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Gastos</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="http://localhost:8000/ingresos" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Otros Ingresos</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="http://localhost:8000/cobrar" class="nav-link">
                  <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Cuentas por Cobrar</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="http://localhost:8000/historial_cobros" class="nav-link">
                  <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Historial de Cobros</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="http://localhost:8000/pagos-personal" class="nav-link">
                  <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Pagos a Personal</p>
                </a>
              </li>

            
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Comisiones Por Pagar
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


            <li class="nav-item">
                <a href="http://localhost:8000/comisiones" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Personal</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="http://localhost:8000/comisiones1" class="nav-link">
                  <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Profesional</p>
                </a>
              </li>

            
            
              
            </ul>
          </li>

          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Comisiones Pagadas
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


            <li class="nav-item">
                <a href="http://localhost:8000/comisionesp" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Personal</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="http://localhost:8000/comisionesp1" class="nav-link">
                  <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Profesional</p>
                </a>
              </li>

            
            
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Sesiones
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


            <li class="nav-item">
                <a href="http://localhost:8000/sesiones" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Por Atender</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="http://localhost:8000/sesiones-atendidas" class="nav-link">
                  <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Atendidos</p>
                </a>
              </li>

            
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
               Resultados
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


            <li class="nav-item">
                <a href="http://localhost:8000/resultados" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Pendientes Servicio</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="http://localhost:8000/resultadosl" class="nav-link">
                  <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Pendientes Laboratorio</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="http://localhost:8000/resultadosg" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Guardados Servicio</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="http://localhost:8000/resultadosgl" class="nav-link">
                  <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Guardados Laboratorio</p>
                </a>
              </li>

            
            
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Consultas
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


            <li class="nav-item">
                <a href="http://localhost:8000/consultas" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Lista de Consultas</p>
                </a>
              </li>

              
            <li class="nav-item">
                <a href="http://localhost:8000/historias" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Ver Historias</p>
                </a>
              </li>

                  
            <li class="nav-item">
                <a href="http://localhost:8000/controles" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Ver Controles</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Métodos Anticonceptivos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


            <li class="nav-item">
                <a href="http://localhost:8000/metodos" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Lista de Métodos</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="http://localhost:8000/metodos_llamar" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Pacientes por Llamar</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Visitador
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


            <li class="nav-item">
                <a href="http://localhost:8000/comisiones-por-entregar" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Comisiones por Entregar</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="http://localhost:8000/comisiones-entregadas" class="nav-link">
                  <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Comisiones Entregadas</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="http://localhost:8000/cumplea%C3%B1os" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Compleaños Profesionales</p>
                </a>
              </li>

            
            
              
            </ul>
          </li>

          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Laboratorios
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


            <li class="nav-item">
                <a href="http://localhost:8000/laboratorios_chequear" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Por Recepcionar</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="http://localhost:8000/laboratorios_ppgar" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Por Pagar</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="http://localhost:8000/laboratorios_ppgados" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Pagados</p>
                </a>
              </li>
              
            </ul>
          </li>

              
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Existencias
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


            <li class="nav-item">
                <a href="http://localhost:8000/productos" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Productos</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="http://localhost:8000/ingreso-productos" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ingresos</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="http://localhost:8000/ventas" class="nav-link">
                  <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Ventas</p>
                </a>
              </li>

            
            
              
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Reportes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
           

            <li class="nav-item">
                <a href="http://localhost:8000/reporte_total" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Reporte Total</p>
                </a>
              </li> 

              <li class="nav-item">
                <a href="http://localhost:8000/detallado" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Detallado por Sede</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="http://localhost:8000/detalladob" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Detallado por Sede B</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="http://localhost:8000/detalladoc" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Detallado por Sede C</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="http://localhost:8000/reporte_servicios" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Items Total</p>
                </a>
              </li> 

              <li class="nav-item">
                <a href="http://localhost:8000/reporte_individual" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Reporte Individual</p>
                </a>
              </li> 

            <li class="nav-item">
                <a href="http://localhost:8000/cierre-caja" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Cierre de Caja</p>
                </a>
              </li>


            <li class="nav-item">
                <a href="http://localhost:8000/historial_pacientes" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Historial de Pacientes</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="http://localhost:8000/reporte_compagar" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Comisiones Personal</p>
                </a>
              </li>

              
              <li class="nav-item">
                <a href="http://localhost:8000/reporte_compagar1" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Comisiones Profesionales</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="http://localhost:8000/materiales-usados" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Materiales Usados</p>
                </a>
              </li> 

              <li class="nav-item">
                <a href="http://localhost:8000/materiales-malogrados" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Materiales Malogrados</p>
                </a>
              </li> 

              
              <li class="nav-item">
                <a href="http://localhost:8000/produccion_servicios" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Producción Servicios</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="http://localhost:8000/produccion_consultas" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Producción Consultas</p>
                </a>
              </li> 

              <li class="nav-item">
                <a href="http://localhost:8000/produccion_sesiones" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Producción Sesiones</p>
                </a>
              </li> 
              
            </ul>
          </li>


        

       
         

        

        

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Administrativo
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

            <li class="nav-item">
                <a href="http://localhost:8000/users-password-edit" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modificar Contraseña</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="http://localhost:8000/usuarios" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="http://localhost:8000/roles" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="http://localhost:8000/activos" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Activos</p>
                </a>
              </li>
            
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Creditos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


            <li class="nav-item">
                <a href="http://localhost:8000/creditos_b" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Creditos B</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="http://localhost:8000/creditos_c" class="nav-link">
                  <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Creditos C</p>
                </a>
              </li>

            
            
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Gastoss
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


            <li class="nav-item">
                <a href="http://localhost:8000/gastos_b" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Gastoss B</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="http://localhost:8000/gastos_c" class="nav-link">
                  <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Gastoss C</p>
                </a>
              </li>

            
            
              
            </ul>
          </li>


          
         
          
         
         
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    
    
    
    
    

 
    







    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Historia de Paciente</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Historia</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Agregar</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="row" style="margin-left:10px;">
                     <div class="col-md-3">
                    <label for="exampleInputEmail1">PACIENTE</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" disabled id="nombre" value="MEZA LA ROSA JOSE LUIS " name="gestas" placeholder="">
                   </div>
                  
                    </div>

                            <br>
              <div class="card-body">
              
                    
                   <label for="exampleInputEmail1" style="margin-left:15px;">HISTORIAL BASE</label>

                   <div class="row" style="margin-left:10px;">
                
                   <div class="col-md-4">
                    <label for="exampleInputEmail1">Antecedentes Personales</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" disabled name="per" value="ANT PERSONALES">
                   </div>
                   <div class="col-md-4">
                    <label for="exampleInputEmail1">Antecedentes Familiares</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" disabled name="per" value="ANT FAMMM">
                   </div>
                   <div class="col-md-4">
                    <label for="exampleInputEmail1">Antecedentes Quirurgicos</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" disabled name="per" value="ANT QUIERI">
                   </div>
                   <div class="col-md-4">
                    <label for="exampleInputEmail1">Otros</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" disabled name="per" value="ANT OTROS">
                   </div>
                    </div>

              
              
              <div class="card-body">
                    <label for="exampleInputEmail1">Fecha: 2024-09-03 07:58:58</label>
                    <br>

                    <label for="exampleInputEmail1">Examen Físico y Clínico</label>
                   <div class="row">
                     <div class="col-md-6">
                    <label for="exampleInputEmail1">Piel/Mucosas</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();"  class="form-control" id="nombre" name="piel" placeholder="" disabled value="SFDFDSF">
                   </div>
                   <div class="col-md-6">
                    <label for="exampleInputEmail1">Torax</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="torax" placeholder="" disabled value="CGF">
                   </div>
                  
                    </div>
                    <br>
                    <div class="row">
                    <div class="col-md-6">
                    <label for="exampleInputEmail1">Corazon</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="corazon" placeholder="" disabled value="BCVBGFHFG">
                   </div>
                     <div class="col-md-6">
                    <label for="exampleInputEmail1">Abdomen</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();"  class="form-control" id="nombre" name="abdomen" placeholder="" disabled value="KJHK">
                   </div>
            
                    </div>
                    <br>

                    <div class="row">
                    <div class="col-md-6">
                    <label for="exampleInputEmail1">Otros</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="otros" placeholder="" disabled value="YTRYJN X">
                   </div>
                  
            
                    </div>

                    <br>
                    <div class="row">
                     <div class="col-md-12">
                    <label for="exampleInputEmail1">Examen Auxiliar</label>
                    <textarea class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" rows="3"  name="ex_aux" placeholder="Examen Auxiliar" disabled> TYRTHJHJJ</textarea>
                  </div>
                    </div>
 
                    <br>
                  
                    <div class="row">
                     <div class="col-md-6">
                    <label for="exampleInputEmail1">Diagnóstico</label>
                    <textarea class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" rows="2"  name="diag_fin" placeholder="Diagnóstico Final" disabled>YTRYtr</textarea>

                   </div>
                   <div class="col-md-6">
                    <label for="exampleInputEmail1">CIE X</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="otros" placeholder="" disabled value="">
         
                    </div>
                
                    </div>
                    <br>
                 
                   <div class="row">
                     <div class="col-md-12">
                    <label for="exampleInputEmail1">Plan de Tratamiento</label>
                    <textarea class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" rows="3"  name="plan" placeholder="Plan de Tratamiento" disabled>YTRYTR</textarea>

                  </div>
                    </div>
                    <br>
                   <div class="row">
                     <div class="col-md-12">
                    <label for="exampleInputEmail1">Observaciones</label>
                    <textarea class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" rows="3"  name="observaciones" placeholder="Observaciones" disabled>YYTUTYUTYUTYU</textarea>
                   </div>
                    </div>
                    <br>
                   


                </div>
                <!-- /.card-body -->

            </div>
            

              <form role="form" method="post" action="historiamm/guardar">
					<input type="hidden" name="_token" value="Dwf6fblUu6zA4XBpb4fMi1I8rR9AVpwznaLw5nYt">                
                    <div class="card-body" style="margin-left:15px;">
                  
                  
                    <label for="exampleInputEmail1">Examen Físico y Clínico</label>
                   <div class="row">
                     <div class="col-md-6">
                    <label for="exampleInputEmail1">Piel/Mucosas</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();"  class="form-control" id="nombre" name="piel" placeholder="">
                   </div>
                   <div class="col-md-6">
                    <label for="exampleInputEmail1">Torax</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="torax" placeholder="">
                   </div>
                  
                    </div>
                    <br>
                    <div class="row">
                    <div class="col-md-6">
                    <label for="exampleInputEmail1">Corazon</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="corazon" placeholder="">
                   </div>
                     <div class="col-md-6">
                    <label for="exampleInputEmail1">Abdomen</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();"  class="form-control" id="nombre" name="abdomen" placeholder="">
                   </div>
            
                    </div>
                    <br>

                    <div class="row">
                    <div class="col-md-6">
                    <label for="exampleInputEmail1">Otros</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="otros" placeholder="">
                   </div>
                  
            
                    </div>

                    <br>
                    <div class="row">
                     <div class="col-md-12">
                    <label for="exampleInputEmail1">Examen Auxiliar</label>
                    <textarea class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" rows="3"  name="ex_aux" placeholder="Examen Auxiliar"></textarea>
                  </div>
                    </div>
 
                    <br>
                  
                    <div class="row">
                     <div class="col-md-6">
                    <label for="exampleInputEmail1">Diagnóstico</label>
                    <textarea class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" rows="2"  name="diag_fin" placeholder="Diagnóstico Final"></textarea>

                   </div>
                   <div class="col-md-6">
                    <label for="exampleInputEmail1">CIE X</label>
                    <select class="form-control select2" name="cie_df">
                                       </select>           
                    </div>
                
                    </div>
                    <br>
                 
                   <div class="row">
                     <div class="col-md-12">
                    <label for="exampleInputEmail1">Plan de Tratamiento</label>
                    <textarea class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" rows="3"  name="plan" placeholder="Plan de Tratamiento"></textarea>

                  </div>
                    </div>
                    <br>
                   <div class="row">
                     <div class="col-md-12">
                    <label for="exampleInputEmail1">Observaciones</label>
                    <textarea class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" rows="3"  name="observaciones" placeholder="Observaciones"></textarea>
                   </div>
                    </div>
                    <br>
                 


                 
                                                      

                  <br>
                  <input type="hidden" name="consulta" value="19749">


               

                
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

         
            <!-- /.card -->

           
           
               


           
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div>
      <div class="modal fade" id="viewTicket">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div><!-- /.container-fluid -->
    </section>
    

  <!-- /.content-wrapper -->
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<script src="plugins/select2/js/select2.full.min.js"></script>

<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>

<script language="javascript">

function disableEnterKey(e) 
{ 
  var key; 
  if(window.event) 
     key = window.event.keyCode; 
   else key = e.which; //firefox 
   return (key != 13); 
  }

</script>

<script type="text/javascript">
		function viewh(e){
		    var id = $(e).attr('id');
		    
		    $.ajax({
		        type: "GET",
		        url: "/historia/reevaluar/"+id,
		        success: function (data) {
		            $("#viewTicket .modal-body").html(data);
		            $('#viewTicket').modal('show');
		        },
		        error: function (data) {
		            console.log('Error:', data);
		        }
		    });
		}

	
	</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>
<!-- page script -->

</body>
</html>