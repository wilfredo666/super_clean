<div class="table-responsive">
	<table class="table table-bordered table-condensed table-hover table-striped">
		
    <tr>
    	<th> Prenda </th>
    	<th> Lugar </th>
    	<th> Cantidad </th>
    	<th> </th>
    </tr>
<?php
 require "../conector/conexion.php";
$codigo_ot = trim($_POST['codigo_ot']);

$sql_acom = pg_query("SELECT * FROM acomodado WHERE codigo_ot = '$codigo_ot'");
 

 while ($row_acom = pg_fetch_array($sql_acom))
 {
 	$id_prenda = $row_acom['id_prenda'];
 	$id_lugar = $row_acom['id_lugar'];
 	$id_ot = $row_acom['id_ot'];
 	$codigo_barra = $row_acom['codigo_tikeo'];
 	?>
 	<tr>
 		<td align="center"> <?php 
 		        $sql_prend = pg_query("SELECT * FROM prenda WHERE id_prenda='$id_prenda'");
            	$row_prend = pg_fetch_array($sql_prend);

            	echo $prenda = $row_prend['prenda']; echo "</br>";
            	$portada = $row_prend['portada'];
            	?>
            	<img src="../multimedia/imagenes/<?php echo $portada; ?>" style="width: 50px; height: 50px;">
            	<?php
            	echo "</br>";
            	echo "<label> "; echo $codigo_barra; echo "</label>"; ?>
        </td>
 		<td> <?php 
 		        
 		        $sql_lugar = pg_query("SELECT * FROM area_acomodado WHERE id_area_acomodado='$id_lugar'");
            	$row_lugar = pg_fetch_array($sql_lugar);

            	echo $lugar = $row_lugar['area_acomodado'];
             ?> 
        </td>
        <td>
        	<?php
        	
        	$sql_ot = pg_query("SELECT * FROM orden_trabajo WHERE id_orden_trabajo='$id_ot'");
            	$row_ot = pg_fetch_array($sql_ot);

            echo $cantidad = $row_ot['cantidad_prenda']; echo " uds.";

        	?>
        </td>
        <td align="center">
        	<button class="btn btn-success btn-md" onclick="btn_examinar_ot_entrega('<?php echo $codigo_ot; ?>')"> + </button>
        </td>
 	</tr>

   <?php
 }
?>
	</table>
</div>