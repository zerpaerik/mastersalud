<style>
	.row{
		width: 1024px;
		margin: 0 auto;
	}

	.col-12{
		width: 100%;
	}
	
	.col-6{
		width: 49%;
		float: left;
		padding: 8px 5px;
		font-size: 18px;
	}

	.text-center{
		text-align: center;
	}
	
	.text-right{
		text-align: right;
	}

	.title-header{
		font-size: 22px; 
		text-transform: uppercase; 
		padding: 12px 0;
	}
	table{
		width: 100%;
		text-align: center;
		margin: 10px 0;
	}
	
	tr th{
		font-size: 14px;
		text-transform: uppercase;
		padding: 8px 5px;
	}

	tr td{
		font-size: 14px;
		padding: 8px 5px;
	}
</style>

<div>
	<div class="text-center title-header col-12">
				<center><strong>REPORTE DE LABORATORIOS PAGADOS</strong> </center><
		<strong>GRUPO MASTER SALUD</strong> 
	</div>
</div>
<div>
	<div class="col-6">
		Fecha de Impresión: {{ Carbon\Carbon::now()->format('d/m/Y') }}
	</div>
</div>


<br>


<div style="margin-top:10px; background: #eaeaea;">
	<table style="">
		<tr>
			<th style="width: 30%;">PACIENTE</th>
			<th style="width: 30%;">ANALISIS</th>
			<th>F.ATEC</th>
			<th>F.PAG</th>
		    <th>COSTO</th>
			
		</tr>
		@foreach ($pagadas as $atec)
			<tr>
				<td style="padding: 0;text-overflow: ellipsis;">{{$atec->apellidos}} {{$atec->nombres}}</td>
				<td style="padding: 0;text-overflow: ellipsis;width: 30%;text-align: left;">{{$atec->nombre}}</td>
				<td style="padding: 0;text-overflow: ellipsis;">{{date('Y-m-d', strtotime($atec->fecha_atencion))}}</td>
				<td style="padding: 0;text-overflow: ellipsis;">{{date('Y-m-d', strtotime($atec->fecha_pago))}}</td>
				<td style="padding: 0;text-overflow: ellipsis;">{{$atec->costo}}</td>
			</tr>
		@endforeach

		<tr>
			<th>TOTAL ITEMS</th>
			<th>TOTAL COSTO</th>
		</tr>
		<tr>
			<td>{{$total_sobres->total}}</td>
			<td>{{$total_sobres->totalrecibo}}</td>
			
		</tr>
	
	</table>
</div>


