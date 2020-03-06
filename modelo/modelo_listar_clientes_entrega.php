<div class="table-responsive">
<table class="table table-bordered table-hover table-condensed table-striped">
	<tr>
		<th> Cliente </th>
		<th> Estado </th>
		<th> </th>
	</tr>	

<?php

require "../conector/conexion.php";

$id_usuario = trim($_POST['id_usuario']);
$id_sucursal = trim($_POST['id_sucursal']);

 $sql_ot = pg_query("SELECT DISTINCT codigo_ot,id_cliente,cliente FROM orden_trabajo WHERE id_usuario = '$id_usuario' AND id_sucursal = '$id_sucursal'");

 while($row_ot = pg_fetch_array($sql_ot))
 {  
 	$codigo_ot = $row_ot['codigo_ot'];
 	$id_cliente = $row_ot['id_cliente'];
 	$cliente = $row_ot['cliente'];


 	?>
    <tr style="font-size: 11px;">
    	<td> <?php echo $cliente; echo "</br> <label style='color:black;'>"; echo $codigo_ot; echo "</label>"; ?> </td>
    	
    	<td> <?php  

    	//consulta a ot
    	$sql_ot_count = pg_query("SELECT count(*) AS numrows FROM orden_trabajo WHERE codigo_ot='$codigo_ot'");
    	$row_ot_count = pg_fetch_array($sql_ot_count);

    	$cont_ot = $row_ot_count['numrows']; 

    	//consulta a acomodado

    	$sql_acom_count = pg_query("SELECT count(*) AS numrows FROM acomodado WHERE codigo_ot='$codigo_ot'");
    	$row_acom_count = pg_fetch_array($sql_acom_count);

    	$cont_acom = $row_acom_count['numrows'];

    	$cont_acom = trim($cont_acom);
    	$cont_ot = trim($cont_ot);

    	if ($cont_acom == $cont_ot) {
    	  echo "<h6 align='center' style='color:green;'>  TERMINADO </h6>";
    	}
    	else
    	{
         echo "<h6 align='center' style='color:red;'>  INCOMPLETO </h6>";
    	}


    	?></td>
    	<td>
    		<button class="btn btn-primary btn-md" onclick="btn_listar_pedido_ot_desenglose('<?php echo $codigo_ot; ?>');"> + </button>
    	</td>
    </tr>
 	<?php
 }

?>

</table>
</div>