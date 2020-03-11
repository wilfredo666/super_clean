
<h4 align="center"> CLIENTES </h4>

<div class="table-responsive">
	<table class="table table-bordered table-condensed table-hover table-striped">
		<tr>
			<th> Codigo / 
			 Cliente </th>
            <th> </th>
		</tr>

		<?php

		 $id_sucursal = $_POST['id_sucursal'];
		 $id_usuario = $_POST['id_usuario'];
		 
		 require "../conector/conexion.php";

		 $sql_ot = pg_query("SELECT DISTINCT id_cliente,cliente,codigo_ot FROM orden_trabajo WHERE id_usuario='$id_usuario' AND id_sucursal='$id_sucursal' AND estado='ACTIVO'");

		 while ($row_ot = pg_fetch_array($sql_ot)) {
		 	
		 	$id_cliente = $row_ot['id_cliente'];
		 	$cliente = $row_ot['cliente'];
		 	$codigo_ot = $row_ot['codigo_ot'];

		 	?>
            <tr>
            	<td> <?php echo $codigo_ot; ?></br>
                <?php echo $cliente; ?></td>
			    <td> <button class="btn btn-primary btn-md" onclick="btn_mostrar_prendas_orden_trabajo('<?php echo $codigo_ot; ?>');"> + </button></td>
		    </tr>
		 	<?php


		 }

		?>
	</table>
</div>