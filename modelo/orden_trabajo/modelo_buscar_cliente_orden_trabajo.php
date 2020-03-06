<div style="z-index: 1; position: absolute; background: white; width: 100%; border:1px solid #BDBDBD; padding: 1%;">
	<div align="right"> 
     <button class="btn btn-danger btn-xs" onclick="btn_cerrar_resultado_buscador();"> Cerrar </button>
	</div>
	<table class="table table-bordered table-condensed table-hover table-striped">
<?php

 $txt_buscar = trim($_POST['txt_buscar']);

 if($txt_buscar=="")
 {
 	echo "No se encontraron resultados";
 }

 else{ 
 require "../conector/conexion.php";

 $sql_cli = pg_query("SELECT * FROM cliente WHERE nombres ILIKE '%$txt_buscar%' OR apellidos ILIKE '%$txt_buscar%' OR ci_nit ILIKE '%$txt_buscar%' OR CONCAT('nombres',' ','apellidos') ILIKE '%$txt_buscar%' LIMIT 10");

 while ($row_cli = pg_fetch_array($sql_cli)) {

 	$id_cliente = $row_cli['id_cliente'];
 	$cliente = $row_cli['nombres']." ".$row_cli['apellidos'];
 	$ci_nit = $row_cli['ci_nit'];

 	//echo $cliente." - ".$ci_nit; echo "</br>";

 	?>
     <tr style="cursor: pointer;">
     	<td> <?php echo $cliente; ?></td>
     	<td> <?php echo $ci_nit; ?></td>
     	<td align="center" > <button class="btn btn-primary btn-md" onclick="btn_seleccion_cliente_ot('<?php echo $id_cliente; ?>');"> + </button></td>
     </tr>
 	<?php

 }

}

?>
</table>
</div>