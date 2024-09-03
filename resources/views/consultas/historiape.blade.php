<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Historia Clínica | Admin</title>
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
  @include('layouts.navbar')
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
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
              <div class="row" style="margin-left:25px;">
                     <div class="col-md-3">
                    <label for="exampleInputEmail1">PACIENTE</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" disabled id="nombre" value="{{$paciente->apellidos}} {{$paciente->nombres}}" name="gestas" placeholder="">
                   </div>
                  
                    </div>

                            <br>
                @foreach($historias as $hist)
           
              
            
                @endforeach

                <!-- /.card-body -->

            </div>
            


              <form role="form" method="post" action="historiapp/guardar">
              {{ csrf_field() }}     
                    <div class="card-body">
                    <br>
                   <label for="exampleInputEmail1">DATOS DE FILIACIÓN</label>
                   <div class="row">
                     <div class="col-md-6">
                    <label for="exampleInputEmail1">Apellidos y Nombres</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="nombre" placeholder="" disabled value="{{$paciente->apellidos}} {{$paciente->nombres}}"> 
                   </div>
                   <div class="col-md-6">
                    <label for="exampleInputEmail1">Domicilio</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="domicilio" placeholder="" disabled value="{{$paciente->direccion}}">
                   </div>
               
                 
    
                    </div>
                    <br>
                   <div class="row">
                     <div class="col-md-4">
                    <label for="exampleInputEmail1">Sexo</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="sexo" placeholder="" disabled value="{{$paciente->sexo}}">
                   </div>
                   <div class="col-md-4">
                    <label for="exampleInputEmail1">Fecha de Nacimiento</label>
                    <input type="date" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="nac" placeholder="" disabled value="{{$paciente->fechanac}}">
                   </div>
                   <div class="col-md-4">
                    <label for="exampleInputEmail1">Teléfono</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="telef" placeholder="" disabled value="{{$paciente->telefono}}">
                   </div>
            
                    </div>
                    <br>
                    <div class="row">
                    <div class="col-md-4">
                    <label for="exampleInputEmail1">Edad</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="telef" placeholder="" disabled value="{{$edad}}">
                   </div>
                    
                   <div class="col-md-4">
                    <label for="exampleInputEmail1">Nombre de Madre o Padre</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="padres" placeholder="">
                   </div>
                 
            
                    </div>
                    <br>
                    <div class="row">
                     <div class="col-md-12">
                    <label for="exampleInputEmail1">Motivo de Consulta</label>
                    <textarea class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" rows="2"  name="motivo" placeholder="Motivo de Consulta"></textarea>

                   </div>
                    </div>
                    <br>
                    <div class="row">
                     <div class="col-md-12">
                    <label for="exampleInputEmail1">Relato</label>
                    <textarea class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" rows="2"  name="relato" placeholder="Relato"></textarea>

                   </div>
                    </div>
                    <br>
                  
                   <label for="exampleInputEmail1">FUNCIONES BIOLÓGICAS</label>
                   <div class="row">
                     <div class="col-md-2">
                    <label for="exampleInputEmail1">Apetito</label>
                    <select class="form-control" name="apetito">
                    <option value="AUMENTADO">AUMENTADO</option>
                    <option value="NORMAL">NORMAL</option>
                    <option value="DISMINUIDO">DISMINUIDO</option>
                    </select>
                   </div>
                   <div class="col-md-2">
                    <label for="exampleInputEmail1">Sed</label>
                    <select class="form-control" name="sed">
                    <option value="AUMENTADO">AUMENTADO</option>
                    <option value="NORMAL">NORMAL</option>
                    <option value="DISMINUIDO">DISMINUIDO</option>
                        </select>                   
                        </div>
                   <div class="col-md-2">
                    <label for="exampleInputEmail1">Animo</label>
                    <select class="form-control" name="animo">
                    <option value="NORMAL">NORMAL</option>
                    <option value="DEPRIMIDO">DEPRIMIDO</option>
                    <option value="EUFÓRICO">EUFÓRICO</option>
                    <option value="FREC LLANTO">FREC LLANTO</option>
                   </select>
                   </div>
                   <div class="col-md-2">
                    <label for="exampleInputEmail1">Orina</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="orina" placeholder="">
                   </div>
                   <div class="col-md-2">
                    <label for="exampleInputEmail1">Heces</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="heces" placeholder="">
                   </div>
                   

                    </div>
                    <br>
                   <label for="exampleInputEmail1">ANTECEDENTES</label>
                   <div class="row">
                     <div class="col-md-1">
                    <label for="exampleInputEmail1">Ram</label>
                    <select class="form-control" name="ram">
                    <option value="NO">NO</option>
                    <option value="SI">SI</option>
                   </select>                    
                   </div>
                   <div class="col-md-3">
                    <label for="exampleInputEmail1">Descrip.</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="desc_ram" placeholder="">
                   </div>
                   <div class="col-md-1">
                    <label for="exampleInputEmail1">Hospitaliz.</label>
                    <select class="form-control" name="hospi">
                    <option value="NO">NO</option>
                    <option value="SI">SI</option>
                   </select>                    
                   </div>
                   <div class="col-md-3">
                    <label for="exampleInputEmail1">Descrip.</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="desc_hosp" placeholder="">
                   </div>
                   <div class="col-md-1">
                    <label for="exampleInputEmail1">Cirugias</label>
                    <select class="form-control" name="cir">
                    <option value="NO">NO</option>
                    <option value="SI">SI</option>
                   </select>                    
                   </div>
                   <div class="col-md-3">
                    <label for="exampleInputEmail1">Descrip.</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="desc_cir" placeholder="">
                   </div>
                
    
                    </div>
                    <br>
                    <div class="row">
                     <div class="col-md-1">
                    <label for="exampleInputEmail1">Vacunas</label>
                    <select class="form-control" name="vac">
                    <option value="NO">NO</option>
                    <option value="SI">SI</option>
                   </select>                    
                   </div>
                   <div class="col-md-3">
                    <label for="exampleInputEmail1">Descrip.</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="desc_vac" placeholder="">
                   </div>
                  
                   <div class="col-md-8">
                    <label for="exampleInputEmail1">Antecedentes patológicos y edpidemiológicos.</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="ant_pat" placeholder="">
                   </div>
                
    
                    </div>
                    <br>
                    <label for="exampleInputEmail1">EXAMEN FÍSICO</label>
                   <div class="row">
                     <div class="col-md-2">
                    <label for="exampleInputEmail1">Peso</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();"  class="form-control" id="nombre" name="peso" placeholder="">
                   </div>
                   <div class="col-md-2">
                    <label for="exampleInputEmail1">Talla</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="talla" placeholder="">
                   </div>
                   <div class="col-md-2">
                    <label for="exampleInputEmail1">T</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="t" placeholder="">
                   </div>
                   <div class="col-md-2">
                    <label for="exampleInputEmail1">PA</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="pa" placeholder="">
                   </div>
                   <div class="col-md-2">
                    <label for="exampleInputEmail1">SAT</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="sat" placeholder="">
                   </div>
                 
    
                    </div>
                    
                
                    <br>

                    <div class="row">
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Aspecto General</label>
                        <select class="form-control" name="aspg">
                            <option value="NORMAL">NORMAL</option>
                            <option value="ANORMAL">ANORMAL</option>
                        </select>  
                    
                   </div>
                   <div class="col-md-3">
                        <label for="exampleInputEmail1">Cabeza</label>
                        <select class="form-control" name="cab">
                            <option value="NORMAL">NORMAL</option>
                            <option value="ANORMAL">ANORMAL</option>
                        </select>  
                    
                   </div>
                   <div class="col-md-3">
                        <label for="exampleInputEmail1">Aparato Digestivo</label>
                        <select class="form-control" name="dig">
                            <option value="NORMAL">NORMAL</option>
                            <option value="ANORMAL">ANORMAL</option>
                        </select>  
                    
                   </div>
                   <div class="col-md-3">
                        <label for="exampleInputEmail1">Sistema neurológico</label>
                        <select class="form-control" name="neuro">
                            <option value="NORMAL">NORMAL</option>
                            <option value="ANORMAL">ANORMAL</option>
                        </select>  
                    
                   </div>
                 
                 
    
                    </div>

                    <br>
                    <div class="row">
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Piel</label>
                        <select class="form-control" name="piell">
                            <option value="NORMAL">NORMAL</option>
                            <option value="ANORMAL">ANORMAL</option>
                        </select>  
                    
                   </div>
                   <div class="col-md-3">
                        <label for="exampleInputEmail1">Torax/Sist Resp.</label>
                        <select class="form-control" name="tor_resp">
                            <option value="NORMAL">NORMAL</option>
                            <option value="ANORMAL">ANORMAL</option>
                        </select>  
                    
                   </div>
                   <div class="col-md-3">
                        <label for="exampleInputEmail1">Sistema Circulatorio</label>
                        <select class="form-control" name="circ">
                            <option value="NORMAL">NORMAL</option>
                            <option value="ANORMAL">ANORMAL</option>
                        </select>  
                    
                   </div>
                   <div class="col-md-3">
                        <label for="exampleInputEmail1">Sistema Genitourinario</label>
                        <select class="form-control" name="genito">
                            <option value="NORMAL">NORMAL</option>
                            <option value="ANORMAL">ANORMAL</option>
                        </select>  
                    
                   </div>
                 
                 
    
                    </div>

                    <br>
                    <div class="row">
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Aparato Locomotor</label>
                        <select class="form-control" name="locomo">
                            <option value="NORMAL">NORMAL</option>
                            <option value="ANORMAL">ANORMAL</option>
                        </select>  
                    
                   </div>
                 
                
                    </div>

                    <br>
                   
                    <div class="row">
                     <div class="col-md-12">
                    <label for="exampleInputEmail1">Hallazgos</label>
                    <textarea class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" rows="3"  name="hallazg" placeholder="Describir obligatoriamente los hallazgos descritos anormales."></textarea>
                  </div>
                    </div>
                   <br>
                   <div class="row">
                     <div class="col-md-12">
                    <label for="exampleInputEmail1">Diagnóstico</label>
                    <textarea class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" rows="3"  name="diag" placeholder="Diagnóstico"></textarea>
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

                    <label for="exampleInputEmail1">DATOS DE ACOMPAÑANTE</label>
                    <br>
                    <label for="exampleInputEmail1">EXAMEN FÍSICO</label>

                   <div class="row">
                     <div class="col-md-2">
                    <label for="exampleInputEmail1">MAT</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();"  class="form-control" id="nombre" name="mat_a" placeholder="">
                   </div>
                   <div class="col-md-2">
                    <label for="exampleInputEmail1">Edad</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="edad_a" placeholder="">
                   </div>
                   <div class="col-md-2">
                    <label for="exampleInputEmail1">Peso</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="peso_a" placeholder="">
                   </div>
                   <div class="col-md-2">
                    <label for="exampleInputEmail1">Talla</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="talla_a" placeholder="">
                   </div>
                   <div class="col-md-2">
                    <label for="exampleInputEmail1">T</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="t_a" placeholder="">
                   </div>
                   <div class="col-md-2">
                    <label for="exampleInputEmail1">PA</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nombre" name="pa_a" placeholder="">
                   </div>
                 
                 
    
                    </div>
                    
                
                    <br>

                        <div class="row">
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Aspecto General</label>
                            <select class="form-control" name="ag_a">
                                <option value="NORMAL">NORMAL</option>
                                <option value="ANORMAL">ANORMAL</option>
                            </select>  

                        </div>
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Cabeza</label>
                            <select class="form-control" name="cab_a">
                                <option value="NORMAL">NORMAL</option>
                                <option value="ANORMAL">ANORMAL</option>
                            </select>  

                        </div>
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Aparato Digestivo</label>
                            <select class="form-control" name="dig_a">
                                <option value="NORMAL">NORMAL</option>
                                <option value="ANORMAL">ANORMAL</option>
                            </select>  

                        </div>
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Sistema neurológico</label>
                            <select class="form-control" name="neuro_a">
                                <option value="NORMAL">NORMAL</option>
                                <option value="ANORMAL">ANORMAL</option>
                            </select>  

                        </div>



                        </div>

                        <br>
                        <div class="row">
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Piel</label>
                            <select class="form-control" name="piell_a">
                                <option value="NORMAL">NORMAL</option>
                                <option value="ANORMAL">ANORMAL</option>
                            </select>  

                        </div>
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Torax/Sist Resp.</label>
                            <select class="form-control" name="tor_resp_a">
                                <option value="NORMAL">NORMAL</option>
                                <option value="ANORMAL">ANORMAL</option>
                            </select>  

                        </div>
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Sistema Circulatorio</label>
                            <select class="form-control" name="circ_a">
                                <option value="NORMAL">NORMAL</option>
                                <option value="ANORMAL">ANORMAL</option>
                            </select>  

                        </div>
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Sistema Genitourinario</label>
                            <select class="form-control" name="genito_a">
                                <option value="NORMAL">NORMAL</option>
                                <option value="ANORMAL">ANORMAL</option>
                            </select>  

                        </div>



                        </div>

                        <br>
                        <div class="row">
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Aparato Locomotor</label>
                            <select class="form-control" name="locomo_a">
                                <option value="NORMAL">NORMAL</option>
                                <option value="ANORMAL">ANORMAL</option>
                            </select>  

                        </div>


                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                            <label for="exampleInputEmail1">Examenes Auxiliares</label>
                            <textarea class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" rows="2"  name="ex_aux_a" placeholder="Examenes Auxiliares"></textarea>
                        </div>
                            </div>
                            <br>
                        <div class="row">
                            <div class="col-md-12">
                            <label for="exampleInputEmail1">Plan de Tratamiento</label>
                            <textarea class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" rows="2"  name="plan_a" placeholder="Plan de Tratamiento"></textarea>

                        </div>
                            </div>
                            <br>
            

                 
                                                      

                  <br>
                  <input type="hidden" name="consulta" value="{{$consulta->id}}">


               

                
                 
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