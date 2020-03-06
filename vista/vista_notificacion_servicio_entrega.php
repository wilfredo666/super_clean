<?php

echo "<label> CODIGO DE ENVIO : "; echo $codigo_ot = trim($_POST['codigo_ot']); echo "</label>";

require "../conector/conexion.php";

$sql_ot = pg_query("SELECT * FROM orden_trabajo WHERE codigo_ot = '$codigo_ot'");
$row_ot = pg_fetch_array($sql_ot);
$id_cliente = trim($row_ot['id_cliente']);
$cliente = trim($row_ot['cliente']);

$sql_cli = pg_query("SELECT * FROM cliente WHERE id_cliente='$id_cliente'");
$row_cli = pg_fetch_array($sql_cli);
$correo = trim($row_cli['email']);
$celular = trim($row_cli['celular']);


?>

<table class="table table-condensed">
	<tr>
		<td colspan="2">
        <textarea class="form-control" rows="5"><?php
            echo $texto = "SUPER CLEAN LE AVISA !!!\nSALUDOS ESTIMADO CLIENTE : ".$cliente." ESTE ES UN MENSAJE DE AVISO PARA QUE REALICE LA CONCLUSION DE SU PEDIDO EN EL AREA DE SERVICIO DE LAVADO \n APLICANDO CUALQUIER CONSULTA CON EL SIGUIENTE CODIGO : ".$codigo_ot." ";

            $texto_enviar = "SUPER CLEAN LE AVISA !!! SALUDOS ESTIMADO CLIENTE : ".$cliente." ESTE ES UN MENSAJE DE AVISO PARA QUE REALICE LA CONCLUSION DE SU PEDIDO EN EL AREA DE SERVICIO DE LAVADO APLICANDO CUALQUIER CONSULTA CON EL SIGUIENTE CODIGO : ".$codigo_ot;
        	?>
        </textarea>
		</td>
	</tr>
	<tr>
		<td> NOTIFICAR AL WHATSAPP </td>
		<td align="right">  
           <a class="btn btn-success" href="https://api.whatsapp.com/send?phone=591<?php echo $celular;?>&text=<?php echo $texto; ?>" target="_blank"> ENVIAR  </a>
		 </td>
	</tr>
	<tr>
		<td> NOTIFICAR AL CORREO ELECTRONICO </td>

		<td align="right"> <button class="btn btn-danger" onclick="btn_enviar_correo_notificacion('<?php echo $correo; ?>','<?php echo $texto_enviar; ?>');"> ENVIAR </button>

        <div id="panel_respuesta_envio_correo_electronico">
        	 
        </div>
		</td>
	</tr>

</table>