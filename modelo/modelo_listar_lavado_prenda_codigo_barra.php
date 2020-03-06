 <h4 align="center"> PRENDAS ASIGNADAS </h4>
 
 <div id="panel_filtro_carrito_lavado"></div>
 
 <div class="table-responsive">
	<table class="table table-condensed table-bordered table-hover table-striped">
		<tr>
			<th> Prenda </th>
            <th> Imagen </th>
			<th> Codigo Bar </th>
			<th> Lavado </th>
            <th> </th>
		</tr>
<?php

 require "../conector/conexion.php";
 $id_usuario = $_POST['id_usuario'];
 $id_sucursal = $_POST['id_sucursal'];

 $sql_tik = pg_query("SELECT * FROM carrito_lavado WHERE id_usuario = '$id_usuario' AND id_sucursal='$id_sucursal' ORDER BY id_carrito_lavado DESC");
 
 while ($row_tik = pg_fetch_array($sql_tik)) {
   
    $id_carrito_lavado = $row_tik['id_carrito_lavado'];
    $id_cliente = $row_tik['id_cliente'];
    $cliente = $row_tik['cliente'];
    $id_usuario = $row_tik['id_usuario'];
    $id_sucursal = $row_tik['id_sucursal'];
    $id_ot = $row_tik['id_ot'];
    $codigo_ot = $row_tik['codigo_ot'];
    $codigo_tikeo = $row_tik['codigo_tikeo'];
    $estado_tikeo = $row_tik['estado_lavado'];
    $id_prenda = $row_tik['id_prenda'];
    $tipo_lavado = $row_tik['tipo_lavado'];

   ?>
    <tr style="font-size: 12px;">
    	<td style="text-align: center ;"> 
            	<?php 
            	$sql_prend = pg_query("SELECT * FROM prenda WHERE id_prenda='$id_prenda'");
            	$row_prend = pg_fetch_array($sql_prend);

            	echo $prenda = $row_prend['prenda']; echo "</br>";
            	$portada = $row_prend['portada'];
            	?>
        </td>
        <td>
            <img src="../multimedia/imagenes/<?php echo $portada; ?>" style="width: 50px; height: 50px;">   
        </td>
    	<td> <?php echo $codigo_tikeo; ?></td>
        <td align="center"> <?php

            if ($tipo_lavado==1) 
            { echo "SECO"; }
            
            else{ echo "VAPOR";}

        ?></td>

    	<td> <button class="btn btn-danger btn-md" onclick="btn_eliminar_prenda_carrito_lavado('<?php echo $id_carrito_lavado; ?>');"> X </button></td>
    </tr>
   <?php
 }

?>

  </table>
</div>



