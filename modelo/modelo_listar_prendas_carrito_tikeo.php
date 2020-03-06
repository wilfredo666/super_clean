 <h4 align="center"> ORDENES TIQUEADAS </h4>
 
 <div id="panel_filtro_carrito_tikeo"></div>
 
 <div class="table-responsive">
	<table class="table table-condensed table-bordered table-hover table-striped">
		<tr>
			<th> Prenda </th>
			<th> Codigo Barras </th>
			<th> </th>
		</tr>
<?php

 require "../conector/conexion.php";
 $id_usuario = $_POST['id_usuario'];
 $id_sucursal = $_POST['id_sucursal'];

 $sql_tik = pg_query("SELECT * FROM carrito_tikeo WHERE id_usuario = '$id_usuario' AND id_sucursal='$id_sucursal' ORDER BY id_carrito_tikeo DESC");
 
 while ($row_tik = pg_fetch_array($sql_tik)) {
   
    $id_carrito_tikeo = $row_tik['id_carrito_tikeo'];
    $id_cliente = $row_tik['id_cliente'];
    $cliente = $row_tik['cliente'];
    $id_usuario = $row_tik['id_usuario'];
    $id_sucursal = $row_tik['id_sucursal'];
    $id_ot = $row_tik['id_ot'];
    $codigo_ot = $row_tik['codigo_ot'];
    $codigo_barras = $row_tik['codigo_barras'];
    $estado_tikeo = $row_tik['estado_tikeo'];
    $id_prenda = $row_tik['id_prenda'];

   ?>
    <tr>
    	<td style="text-align: center ;"> 
            	<?php 
            	$sql_prend = pg_query("SELECT * FROM prenda WHERE id_prenda='$id_prenda'");
            	$row_prend = pg_fetch_array($sql_prend);

            	echo $prenda = $row_prend['prenda']; echo "</br>";
            	$portada = $row_prend['portada'];
            	?>
            	<img src="../multimedia/imagenes/<?php echo $portada; ?>" style="width: 50px; height: 50px;">	
        </td>
    	<td> <?php echo $codigo_barras; ?></td>
    	<td> <button class="btn btn-danger btn-md" onclick="btn_eliminar_ordenes_tiket('<?php echo $id_carrito_tikeo; ?>');"> X </button></td>
    </tr>
   <?php
 }

?>

  </table>
</div>



