<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MasterSalud | Admin</title>
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
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<!-- DataTables -->
<link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> 

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
  @include('layouts.navbar')
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    @include('layouts.sidebar')
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Historias de Pacientes</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Historias de Pacientes</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    @include('flash-message')
      <div class="container-fluid">
      <div class="card">
              <div class="card-header">
              <form method="get" action="historias">					
                  <label for="exampleInputEmail1">Filtros de Busqueda</label>

                    <div class="row">
                    <form method="get" action="historias">					
                  <div class="col-md-3">
                    <label for="exampleInputEmail1">Buscar por Apellidos</label>
                    <input type="text" class="form-control"  name="filtro">
                  </div>

                  <div class="col-md-2" style="margin-top: 30px;">
                  <button type="submit" class="btn btn-primary">Buscar</button>
                  </div>
                  </form>

                  </div>


                  <form method="get" action="historias">					
                  <label for="exampleInputEmail1">Seleccione el Paciente</label>

                    <div class="row">
                  <div class="col-md-3">
                  <select class="form-control" name="id_paciente">
                    @foreach($pacientes as $role)
                      <option value="{{$role->id}}">{{$role->apellidos}},{{$role->nombres}}-{{$role->dni}}</option>
                    @endforeach
                  </select>
                   
                  </div>

                  <div class="col-md-2" style="margin-top: 1px;">
                  <button type="submit" class="btn btn-primary">Buscar</button>

                  </div>
                  </form>
              
              </div>

              <br>


              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#gin">Ginecológica</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#ped">Pediatrica</a>
                  
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#med">Medicina General</a>
                </li>
              
              </ul>

              <div class="tab-content">


              <div class="tab-pane container active" id="gin">
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                   <th>Fecha</th>
                    <th>Paciente</th>
                    <th>DNI</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>

                  
                  @foreach($historias as $an)
                  <tr>
                    <td>{{date('d-M-y H:i', strtotime($an->created_at))}}</td>
                    <td>{{$an->apellidos}} {{$an->nombres}}</td>
                    <td>{{$an->dni}}</td>
                
                   
                    <td>
                    <a class="btn btn-primary btn-sm" href="historias-ver-{{$an->id}}">
                              <i class="fas fa-eye">
                              </i>
                              Ver Historia
                          </a>
                          <a class="btn btn-secondary btn-sm" href="historias-editar-{{$an->id}}">
                              <i class="fas fa-edit">
                              </i>
                              Editar Historia
                          </a>
                          
                          <a class="btn btn-info btn-sm" href="historias-pdf-{{$an->id}}" target="_blank">
                              <i class="fas fa-print">
                              </i>
                              Ver PDF
                          </a>
                          @if($an->reevalua == 1)

                         <a class="btn btn-success btn-sm" id="{{$an->id}}" onclick="viewh(this)">
                              <i class="fas fa-edit">
                              </i>
                              Reevaluar
                          </a>
                          @endif
                  
                    </td>
                  
                  </tr>
                  @endforeach
                 
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Fecha</th>
                    <th>Paciente</th>
                    <th>DNI</th>
                
                    <th>Acciones</th>
                  </tr>
                  </tr>
                 
                  </tfoot>

                </table>
              </div>
              </div>

              <div class="tab-pane container" id="ped">

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                   <th>Fecha</th>
                    <th>Paciente</th>
                    <th>DNI</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>

                  
                  @foreach($historias_p as $anp)
                  <tr>
                    <td>{{date('d-M-y H:i', strtotime($anp->created_at))}}</td>
                    <td>{{$anp->apellidos}} {{$anp->nombres}}</td>
                    <td>{{$anp->dni}}</td>
                
                   
                    <td>
                    <a class="btn btn-primary btn-sm" href="historiasp-ver-{{$anp->id}}">
                              <i class="fas fa-eye">
                              </i>
                              Ver Historia
                          </a>

                          <a class="btn btn-secondary btn-sm" href="historiasp-editar-{{$anp->id}}">
                              <i class="fas fa-edit">
                              </i>
                              Editar Historia
                          </a>

                 
                       
                        
                  
                    </td>
                  
                  </tr>
                  @endforeach
                 
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Fecha</th>
                    <th>Paciente</th>
                    <th>DNI</th>
                
                    <th>Acciones</th>
                  </tr>
                  </tr>
                 
                  </tfoot>

                </table>
              </div>
              
              </div>

              
              <div class="tab-pane container" id="med">

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                   <th>Fecha</th>
                    <th>Paciente</th>
                    <th>DNI</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>

                  
                  @foreach($historias_m as $anm)
                  <tr>
                    <td>{{date('d-M-y H:i', strtotime($anm->created_at))}}</td>
                    <td>{{$anm->apellidos}} {{$anm->nombres}}</td>
                    <td>{{$anm->dni}}</td>
                
                   
                    <td>
                    <a class="btn btn-primary btn-sm" href="historiasm-ver-{{$anm->id}}">
                              <i class="fas fa-eye">
                              </i>
                              Ver Historia
                          </a>

                          
                          <a class="btn btn-secondary btn-sm" href="historiasm-editar-{{$anm->id}}">
                              <i class="fas fa-edit">
                              </i>
                              Editar Historia
                          </a>


                       
                       
                          
                          
                        
                        
                  
                    </td>
                  
                  </tr>
                  @endforeach
                 
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Fecha</th>
                    <th>Paciente</th>
                    <th>DNI</th>
                
                    <th>Acciones</th>
                  </tr>
                  </tr>
                 
                  </tfoot>

                </table>
              </div>
              
              
              </div>

            </div>



            
              <!-- /.card-header -->
             
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
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
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  </div>
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

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>

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
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
