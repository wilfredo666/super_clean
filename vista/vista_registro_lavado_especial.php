<?php require "../conector/conexion.php"; ?>
<div class="row" style="margin: 0px; padding: 0px;">
	
	<div class="col-lg-6 col-md-6 col-xs-12">
	  <h4> Registro de Lavado Especial </h4>

	  <div class="row">
	   
	   <div class="col-lg-12 col-md-12 col-xs-12">
	   	
	   	<label> Cliente </label>
	   	<input type="text" class="form-control" placeholder="(*) Escriba su Cliente" id="txt_buscar_cliente" onkeyup="btn_buscar_cliente();" onkeypress='return valida_letras(event);'>
	   	
	   	<input type="hidden" id="cliente">
	   	<input type="hidden" id="ID_cliente">
	   	<div id="resp_cliente"></div>
	   	
	   </div>

	   <div class="col-lg-12 col-md-12 col-xs-12">
	   	
	   	<label> Prenda </label>
	   	<input type="text" class="form-control" placeholder="(*) Escriba su Prenda" id="txt_buscar_prenda" onkeyup="btn_buscar_prenda();" onkeypress='return valida_letras(event);'>
	   	
	   	<input type="hidden" id="prenda">
	   	<input type="hidden" id="portada">
	   	<input type="hidden" id="ID_prenda">

	   	<div id="resp_prenda"></div>
	   	
	   </div>

	   <div class="col-lg-12 col-md-12 col-xs-12">
	   	
	   	<label> Medida </label>
	   	<input type="text" class="form-control" placeholder="(*) Medida en Mtrs" id="medida" value="0" onkeypress='return valida_numeros(event);'>
 
	   	<div id="resp_cliente"></div>
	   	
	   </div>

	   <div class="col-lg-12 col-md-12 col-xs-12">
	   	
	   	<label> Fecha entrega </label>
	   	<p style="font-size: 9px;"> La entregas del lavado tardan de 5 a 7 días </p>
	   	<?php
	   	$fecha = date('Y-m-d'); ?>
	   	<input type="date" class="form-control" id="fecha_entrega" value="<?php echo $fecha; ?>">
 
	   	<div id="resp_cliente"></div>
	   	
	   </div>
	   <div class="col-lg-12 col-md-12 col-xs-12">
	   	
	   	<div style="padding: 3%; text-align: center;">
        <button class="btn btn-primary btn-md" onclick="btn_registrar_carrito_le()"> Agregar al carrito </button>
	   	<div id="panel_registro_lavado_especial"></div>
	   	</div>
	   	
	   </div>

	  </div>
		
	</div>

	<div class="col-lg-6 col-md-6 col-xs-12">

		<div id="panel_listado_prendas_lavado_especial" style="overflow-y: scroll; max-height: 350px;">
			
		</div>

		<div>
			<table class="table table-bordered table-condensed">
				<tr>
					<th> Total </th>
					<th> Pago </th>
					<th> Saldo </th>
				</tr>
				<tr>
					<td> <input type="text" placeholder="Total" class="form-control" id="total" disabled> </td>
					<td> <input type="text" placeholder="Pago" class="form-control" id="pago" onkeypress='return valida_numeros(event);' onkeyup="btn_calcular_pago();"> </td>
					<td> <input type="text" placeholder="Saldo" class="form-control" id="saldo" disabled> </td>
				</tr>
			</table>
		</div>

		<div id="panel_respuesta_prendas_lavado_especial">
			
		</div>
		
	</div>

</div>