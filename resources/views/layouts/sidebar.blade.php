@if(\Auth::user()->rol == 1)

<a href="{{route('home')}}" class="brand-link">
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
                <a href="{{route('personal.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Personal</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('centros.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Centros</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('laboratorio.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laboratorios</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('profesionales.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profesionales</p>
                </a>
              </li>

           

              <li class="nav-item">
                <a href="{{route('analisis.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Analisis</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('servicios.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Servicios</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('paquetes.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Paquetes</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{route('pacientes.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pacientes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('roles.index')}}" class="nav-link">
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
                <a href="{{route('atenciones.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Atenciones</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('gastos.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Gastos</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('ingresos.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Otros Ingresos</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('cobrar.index')}}" class="nav-link">
                  <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Cuentas por Cobrar</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('historialc.index')}}" class="nav-link">
                  <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Historial de Cobros</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('pagosp.index')}}" class="nav-link">
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
                <a href="{{route('comisiones.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Personal</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('comisiones.index1')}}" class="nav-link">
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
                <a href="{{route('comisionesp.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Personal</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('comisionesp.index1')}}" class="nav-link">
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
               Resultados
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


            <li class="nav-item">
                <a href="{{route('resultados.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Pendientes Servicio</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('resultados.index1')}}" class="nav-link">
                  <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Pendientes Laboratorio</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('resultados.indexg')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Guardados Servicio</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('resultados.indexg1')}}" class="nav-link">
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
                <a href="{{route('consultas.index1')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Lista de Consultas</p>
                </a>
              </li>

              
            <li class="nav-item">
                <a href="{{route('historias.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Ver Historias</p>
                </a>
              </li>

                  
            <li class="nav-item">
                <a href="{{route('controles.index')}}" class="nav-link">
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
                Laboratorios por enviar
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            

            <li class="nav-item">
                <a href="{{route('labcheck.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Lista</p>
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
                <a href="{{route('metodos.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Lista de Métodos</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('llamar.index')}}" class="nav-link">
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
                <a href="{{route('comisionespe.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Comisiones por Entregar</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('comisionese.index')}}" class="nav-link">
                  <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Comisiones Entregadas</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('cumpleaños.index')}}" class="nav-link">
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
                Existencias
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


            <li class="nav-item">
                <a href="{{route('productos.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Productos</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('ingproductos.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ingresos</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('ventas.index')}}" class="nav-link">
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
                <a href="{{route('reporte_total.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Reporte Total</p>
                </a>
              </li> 

              <li class="nav-item">
                <a href="{{route('detallado.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Detallado por Sede</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('detalladob.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Detallado por Sede B</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('detalladoc.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Detallado por Sede C</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('reporte_servicios.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Items Total</p>
                </a>
              </li> 

              <li class="nav-item">
                <a href="{{route('reporte.individual')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Reporte Individual</p>
                </a>
              </li> 

            <li class="nav-item">
                <a href="{{route('cierre.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Cierre de Caja</p>
                </a>
              </li>


            <li class="nav-item">
                <a href="{{route('historial.pacientes')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Historial de Pacientes</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('compagar.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Comisiones Personal</p>
                </a>
              </li>

              
              <li class="nav-item">
                <a href="{{route('compagar1.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Comisiones Profesionales</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('materiales.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Materiales Usados</p>
                </a>
              </li> 

              <li class="nav-item">
                <a href="{{route('materialesm.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Materiales Malogrados</p>
                </a>
              </li> 

              
              <li class="nav-item">
                <a href="{{route('prod_serv.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Producción Servicios</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{route('prod_cons.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Producción Consultas</p>
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
                <a href="{{route('users.password')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modificar Contraseña</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{route('usuarios.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('roles.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('activos.index')}}" class="nav-link">
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
                <a href="{{route('creditos.b')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Creditos B</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('creditos.c')}}" class="nav-link">
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
                <a href="{{route('gastos.b')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Gastoss B</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('gastos.c')}}" class="nav-link">
                  <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Gastoss C</p>
                </a>
              </li>

            
            
              
            </ul>
          </li>


          
         
          
         
         
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    @endif

    @if(\Auth::user()->rol == 2)

<a href="{{route('home')}}" class="brand-link">
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
                <a href="{{route('pacientes.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pacientes</p>
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
                <a href="{{route('atenciones.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Atenciones</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('gastos.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Gastos</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('ingresos.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Otros Ingresos</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('cobrar.index')}}" class="nav-link">
                  <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Cuentas por Cobrar</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('pagosp.index')}}" class="nav-link">
                  <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Pagos a Personal</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('historialc.index')}}" class="nav-link">
                  <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Historial de Cobros</p>
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
                <a href="{{route('comisiones.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Personal</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('comisiones.index1')}}" class="nav-link">
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
                <a href="{{route('comisionesp.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Personal</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('comisionesp.index1')}}" class="nav-link">
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
               Resultados
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


            <li class="nav-item">
                <a href="{{route('resultados.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Pendientes Servicio</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('resultados.index1')}}" class="nav-link">
                  <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Pendientes Laboratorio</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('resultados.indexg')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Guardados Servicio</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('resultados.indexg1')}}" class="nav-link">
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
                <a href="{{route('consultas.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Lista de Consultas</p>
                </a>
              </li>

              
            <li class="nav-item">
                <a href="{{route('historias.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Ver Historias</p>
                </a>
              </li>

                  
            <li class="nav-item">
                <a href="{{route('controles.index')}}" class="nav-link">
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
                <a href="{{route('metodos.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Lista de Métodos</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{route('llamar.index')}}" class="nav-link">
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
                Reportes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

     

            <li class="nav-item">
                <a href="{{route('cierre.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Cierre de Caja</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('detalladob.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Detallado por Sede B</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('detalladoc.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Detallado por Sede C</p>
                </a>
              </li>


            <li class="nav-item">
                <a href="{{route('historial.pacientes')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Historial de Pacientes</p>
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
                <a href="{{route('users.password')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modificar Contraseña</p>
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
                <a href="{{route('creditos.b')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Creditos B</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('creditos.c')}}" class="nav-link">
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
                <a href="{{route('gastos.b')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Gastoss B</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('gastos.c')}}" class="nav-link">
                  <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Gastoss C</p>
                </a>
              </li>

            
            
              
            </ul>
          </li>



          
         
          
         
         
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    @endif

    @if(\Auth::user()->rol == 7)

<a href="{{route('home')}}" class="brand-link">
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
                <a href="{{route('pacientes.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pacientes</p>
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
                <a href="{{route('atenciones.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Atenciones</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('gastos.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Gastos</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('ingresos.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Otros Ingresos</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('cobrar.index')}}" class="nav-link">
                  <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Cuentas por Cobrar</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('historialc.index')}}" class="nav-link">
                  <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Historial de Cobros</p>
                </a>
              </li>

            
              
            </ul>
          </li>

          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Laboratorios por enviar
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            

            <li class="nav-item">
                <a href="{{route('labcheck.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Lista</p>
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
                <a href="{{route('resultados.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Pendientes Servicio</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('resultados.index1')}}" class="nav-link">
                  <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Pendientes Laboratorio</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('resultados.indexg')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Guardados Servicio</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('resultados.indexg1')}}" class="nav-link">
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
                <a href="{{route('consultas.index1')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Lista de Consultas</p>
                </a>
              </li>


          
            <li class="nav-item">
                <a href="{{route('historias.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Ver Historias</p>
                </a>
              </li>

                  
            <li class="nav-item">
                <a href="{{route('controles.index')}}" class="nav-link">
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
                Existencias
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


            <li class="nav-item">
                <a href="{{route('productos.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Productos</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('ingproductos.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ingresos</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('ventas.index')}}" class="nav-link">
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
                Métodos Anticonceptivos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


            <li class="nav-item">
                <a href="{{route('metodos.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Lista de Métodos</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('llamar.index')}}" class="nav-link">
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
                Reportes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

            <li class="nav-item">
                <a href="{{route('cierre.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Cierre de Caja</p>
                </a>
              </li>


            <li class="nav-item">
                <a href="{{route('historial.pacientes')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Historial de Pacientes</p>
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
                <a href="{{route('users.password')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modificar Contraseña</p>
                </a>
              </li>
              
              
            </ul>
          </li>


          
         
          
         
         
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    @endif

    @if(\Auth::user()->rol == 10)

<a href="{{route('home')}}" class="brand-link">
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
                <a href="{{route('pacientes.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pacientes</p>
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
                <a href="{{route('resultados.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Pendientes Servicio</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('resultados.index1')}}" class="nav-link">
                  <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Pendientes Laboratorio</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('resultados.indexg')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Guardados Servicio</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('resultados.indexg1')}}" class="nav-link">
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
                <a href="{{route('consultas.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Lista de Consultas</p>
                </a>
              </li>

          

              
            <li class="nav-item">
                <a href="{{route('historias.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Ver Historias</p>
                </a>
              </li>

                  
            <li class="nav-item">
                <a href="{{route('controles.index')}}" class="nav-link">
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
                <a href="{{route('metodos.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Lista de Métodos</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{route('llamar.index')}}" class="nav-link">
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
                Reportes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

           


            <li class="nav-item">
                <a href="{{route('historial.pacientes')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Historial de Pacientes</p>
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
                <a href="{{route('users.password')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modificar Contraseña</p>
                </a>
              </li>
              
              
            </ul>
          </li>


      </nav>
      <!-- /.sidebar-menu -->
    </div>
    @endif

    @if(\Auth::user()->rol == 11)

    
<a href="{{route('home')}}" class="brand-link">
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
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Comisiones Pagadas
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


            <li class="nav-item">
                <a href="{{route('comisionesp.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Personal</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('comisionesp.index1')}}" class="nav-link">
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
                Visitador
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


            <li class="nav-item">
                <a href="{{route('comisionespe.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Comisiones por Entregar</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('comisionese.index')}}" class="nav-link">
                  <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Comisiones Entregadas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('cumpleaños.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Compleaños Profesionales</p>
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
                <a href="{{route('users.password')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modificar Contraseña</p>
                </a>
              </li>
              
              
            </ul>
          </li>


          
         
          
         
         
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    @endif


 @if(\Auth::user()->rol == 12)

    
<a href="{{route('home')}}" class="brand-link">
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
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Reportes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
           

              <li class="nav-item">
                <a href="{{route('detalladoc.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Detallado por Sede C</p>
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
                <a href="{{route('creditos.c')}}" class="nav-link">
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
                <a href="{{route('gastos.c')}}" class="nav-link">
                  <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Gastoss C</p>
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
                <a href="{{route('users.password')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modificar Contraseña</p>
                </a>
              </li>
              
              
            </ul>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    @endif

    @if(\Auth::user()->rol == 13)

    
<a href="{{route('home')}}" class="brand-link">
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
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Administrativo
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

            <li class="nav-item">
                <a href="{{route('users.password')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modificar Contraseña</p>
                </a>
              </li>
              
              
            </ul>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    @endif








