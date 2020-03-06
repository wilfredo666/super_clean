<div class="table-responsive">
	<table class="table table-bordered table-condensed table-hover table-striped">
		
    <tr>
    	<th> Prenda </th>
    	<th> Cantidad </th>
    	<th> Lavado </th>
    </tr>
<?php
 
require "../conector/conexion.php";
$codigo_ot = trim($_POST['codigo_ot']);

$sql_acom = pg_query("SELECT * FROM orden_trabajo WHERE codigo_ot = '$codigo_ot'");
 

 while ($row_acom = pg_fetch_array($sql_acom))
 {
 	$id_prenda = $row_acom['id_prenda'];
 	$cantidad = $row_acom['cantidad_prenda'];
 	$id_tipo_lavado = $row_acom['id_tipo_lavado'];
 ?>
 	<tr>
 		<td> <?php 
 		        $sql_prend = pg_query("SELECT * FROM prenda WHERE id_prenda='$id_prenda'");
            	$row_prend = pg_fetch_array($sql_prend);

            	echo $prenda = $row_prend['prenda']; echo "</br>";
            	$portada = $row_prend['portada'];
            	?>
            	<img src="../multimedia/imagenes/<?php echo $portada; ?>" style="width: 50px; height: 50px;">
        </td>
 		<td align="center"> <?php 
 		        
 		       
            	echo $cantidad; echo " Uds. ";
             ?> 
        </td>
        <td><?php

        	$sql_tipo_lav = pg_query("SELECT * FROM tipo_prenda WHERE id_tipo_prenda='$id_tipo_lavado'");
            $row_tipo_lav = pg_fetch_array($sql_tipo_lav);

            	echo $tipo_lavado = $row_tipo_lav['tipo_prenda']; echo "</br>";
            ?>
        </td>
       
 	</tr>

   <?php
 }
?>
	</table>
</div>