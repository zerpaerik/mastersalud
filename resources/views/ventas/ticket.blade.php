<head>
    <style type="text/css">
      {
        margin: 0;
        padding: 0;
      }
      .table-main{
       margin-left:-55px;
       margin-right:-56px;
      }
      .truncate {
        width: 1px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
      }
      @page {
        header: page-header;
        footer: page-footer;
      }
      footer {
        border:solid red;
      }
    </style>

    <meta charset="utf-8">

  </head>

    <body style="width:100%; position:fixed: top: 1px; ">
    <div class="" style="font-size: 35px; text-align: center;margin-bottom: 15px;">
		<img src="/var/www/html/mastersalud/public/logo_negro.png"  style="width: 55%; color: black;"/>
	</div>

    <br><br>

    <div  style="font-size: 15px; text-align: center;margin-bottom:-60px;margin-top: -30px;">
    <p><strong>GRUPO MASTER SALUD</strong></p>
		<p style="margin-top: -20px;"><strong>RUC: 20600665562</strong></p>
    <p style="margin-top: -20px;"><strong>Telèfono: 01 3519855</strong></p>
    <p style="margin-top: -10px;"><strong>Dirección:Av. José Carlos Mariategui 1768 urb San Gregorio Ate Vitarte</strong></p>
  
	     <p style="margin-top: -20px;"><strong>NÚMERO DE RECIBO ELECTRÓNICO:{{$ventas_detalled->id}}</strong></p>

	</div>
    <br><br>
    <br><br>


    <div  style="font-size: 15px; text-align: left;margin-bottom:-60px;margin-top: -30px;">
    <p><strong>FECHA:</strong> {{$ventas_detalled->created_at}} </p>
		<p><strong>CLIENTE:</strong> {{$ventas_detalled->cliente}}</p>
	
	</div>
  <br><br><br>

    <table width="100%" class="table-main">
      <thead>
        <tr>
          <th style="font-size: 15px"><center>Cant.<center></th>
          <th style="font-size: 15px"><center>Desc.<center></th>
          <th style="font-size: 15px"><center>P.Unit.<center></th>
          <th style="font-size: 15px"><center>Total<center></th>
        </tr>
      </thead>
      <tbody>
        @foreach($ventas_detalle as $line)
          <tr>
            <td style="font-size: 15px; line-height: 30px;" align="center">{{$line->cantidad}}</td>
            <td style="font-size: 15px; line-height: 30px;" align="center">{{$line->producto}}</td>
            <td style="font-size: 15px; line-height: 30px;" align="center">{{$line->monto}}</td>
            <td style="font-size: 15px; line-height: 30px;" align="center">{{$line->monto * $line->cantidad}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <br>

    <table width="100%">
      <tbody>
        <tr>
          <td style="width: 100%;">
            <table width="100%">
              <tbody>
                   

                    <tr>
                      <td align="left" style="font-size: 15px">VALOR TOTAL</td>
                      <td align="right" style="font-size: 15px">{{$total->monto}} Soles</td>
                    </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>

    

    </body>
