<div class="row">
	<div class="col-xs-12">
		<div class="box">
			

            <form method="post" action="analisis/enviar">					
              {{ csrf_field() }}  


                    <div class="card-body">
                    <span>
                    <center> <strong>ENVIO DE MUESTRA A LABORATORIO</strong></center><br>
				          	</span>
                    <div class="row">
                   
                  <div class="col-md-12">
                    <label for="exampleInputEmail1">Seleccione el laboratorio</label>
                    <select class="form-control select2" name="laboratorio">
                    @foreach($centros as $c1)
                    <option value="{{$c1->nombre}}">{{$c1->nombre}}</option>
                    @endforeach
                   </select> 

                  </div>
                 
                
                  </div>
                
                  <br>
                </div>

                <input type="hidden" name="id" value="{{$labs->id}}">


                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Procesar</button>
                </div>
              </form>
				

               
               				
		</div>
	</div>
</div>