<div class="row">
	<div class="col-lg-5 col-md-5 col-xs-12" style="overflow-y: scroll; max-height: 450px;">

	<h4 style="margin-bottom: 0px;"> LISTA DE PRENDAS REGISTRADAS </h4>
	<p style="margin-bottom:; font-size: 10px; "> Seleccione la prenda para asignarla al carrito </p>
	<div class="table-responsive">
	 <table class="table table-bordered table-condensed table-hover table-striped">
	  <tr align="center" >
		  <th> # </th>
		  <th> PRENDA </th>
		  <th> TIPO </th>
		  <th> </th>
	  </tr>
	<?php 
	require "../conector/conexion.php";

	$sql_prenda = pg_query("SELECT * FROM prenda WHERE tipo_prenda='1' ORDER BY prenda ASC");
	$i = 0; 
	while ($row_prenda = pg_fetch_array($sql_prenda)) { 
	  $i++;
	  $id_prenda = $row_prenda['id_prenda'];
	  $prenda = $row_prenda['prenda'];
	  $portada = $row_prenda['portada'];
	  $precio = $row_prenda['precio'];
	  $tipo_prenda = $row_prenda['tipo_prenda'];
	  $moneda = $row_prenda['moneda'];

	?>		
			<tr align="center">
				<td> <?php echo $i;  ?> </td>
				<td> <?php echo $prenda;  ?> </br>  
	            <img src="../multimedia/imagenes/<?php echo $portada; ?>" style="width: 100px; height: 100px;">
			    </td>
			 
				<td> <?php  echo "KILO"; ?> </td>
				 
				<td> <button class="btn btn-primary btn-md" onclick="btn_seleccionar_prenda_kilo('<?php echo $id_prenda; ?>','<?php echo $portada; ?>');"> + </button></td>

			</tr>
	<?php
	} 
	?>
		</table>
	</div>

		
	</div>
	<div class="col-lg-2 col-md-2 col-xs-12" >
		
		<table align="center">
			<tr>
			<td colspan="2"> 
				<h6 style="font-weight: bold; text-align: center;"> Cantidad </h6>
				<div id="mensaje_prenda_seleccionada"></div>
			</td>
		    </tr>

			<tr>
				<td> 
				<input type="text" id="cantidad_ropa_kilo" class="form-control"  placeholder="* Cantidad"  onkeypress="return valida_numeros(event);" maxlength="10" style="width: 100%;">
				<input type="hidden" id="id_prenda_seleccionada" style="width: 100%;">

			    </td>
				<td>
					<button class="btn btn-danger btn-md" onclick="btn_eliminar_teclado_numeros();" > <- </button>
				</td></tr>
		    <tr>
		</table> 

		  		<div align="center">
		  			<hr>
		  			<table>
		  				<tr>
		  					<td> <button class="btn btn-default btn-lg" onclick="btn_teclado_numeros(1);"> 1 </button></td>
		  					<td> <button class="btn btn-default btn-lg" onclick="btn_teclado_numeros(2);"> 2 </button></td>
		  					<td> <button class="btn btn-default btn-lg" onclick="btn_teclado_numeros(3);"> 3 </button></td>
		  					<td> <button class="btn btn-default btn-lg"  onclick="btn_teclado_numeros('.')"> . </button> </td>
		  				</tr>
		  				<tr>
		  					<td> <button class="btn btn-default btn-lg" onclick="btn_teclado_numeros(4);"> 4 </button></td>
		  					<td> <button class="btn btn-default btn-lg" onclick="btn_teclado_numeros(5);"> 5 </button></td>
		  					<td> <button class="btn btn-default btn-lg" onclick="btn_teclado_numeros(6);"> 6 </button></td>
		  					<td> <button class="btn btn-success btn-lg" style="background: green; color: white; padding-left: 35%; padding-top: 25%; padding-bottom: 25%; padding-right: 35%; "  onclick="btn_agregar_prenda_kilo();"> + </button> </td>
		  				</tr>
		  				<tr>
		  					<td> <button class="btn btn-default btn-lg" onclick="btn_teclado_numeros(7);"> 7 </button></td>
		  					<td> <button class="btn btn-default btn-lg" onclick="btn_teclado_numeros(8);"> 8 </button></td>
		  					<td> <button class="btn btn-default btn-lg" onclick="btn_teclado_numeros(9);"> 9 </button></td>
		  					<td> <button class="btn btn-default btn-lg"  onclick="btn_teclado_numeros(0);" style="padding-left: 35%; padding-top: 25%; padding-bottom: 25%; padding-right: 35%; "> 0 </button>  </td>
		  				</tr>
		  			</table>
		  		</div>
		   
	</div>
	<div class="col-lg-5 col-md-5 col-xs-12" style="overflow-y: scroll; max-height: 450px;">
		
		<h4 style="margin-bottom: 0px;"> CARRITO DE PRENDAS </h4>
		<p style="margin-bottom:; font-size: 10px; "> Prendas asignadas a la Orden de Trabajo </p>

		<div id="mensaje_carrito_orden_trabajo_kilo">  
		</div>

		<div id="panel_modal_carrito_orden_trabajo_kilo">
		 	  
		</div>

	</div>
</div>


<script type="text/javascript">
	
	function btn_teclado_numeros(valor)
	{
		var cantidad = $("#cantidad_ropa_kilo").val();
		cantidad = cantidad + valor;
		$("#cantidad_ropa_kilo").val(cantidad);
	}


	function btn_eliminar_teclado_numeros()
	{
	  var cantidad = $("#cantidad_ropa_kilo").val("");

	}
</script>