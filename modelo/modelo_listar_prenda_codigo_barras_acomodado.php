<div id="panel_filtro_carrito_acomodado"> </div>
 
 <div class="table-responsive">
	<table class="table table-condensed table-bordered table-hover table-striped">
		<tr>
			<th> Prenda </th>
			<th> Codigo Barras </th>
			<th> Lugar </th>
			<th> </th>
		</tr>
<?php

 require "../conector/conexion.php";
 $id_usuario = $_POST['id_usuario'];
 $id_sucursal = $_POST['id_sucursal'];

 $sql_aco = pg_query("SELECT * FROM carrito_acomodado WHERE id_usuario = '$id_usuario' AND id_sucursal='$id_sucursal' ORDER BY id_carrito_acomodado DESC");
 
 while ($row_aco = pg_fetch_array($sql_aco)) {
   
    $id_carrito_acomodado = $row_aco['id_carrito_acomodado'];
    $id_cliente = $row_aco['id_cliente'];
    $cliente = $row_aco['cliente'];
    $id_ot = $row_aco['id_ot'];
    $codigo_ot = $row_aco['codigo_ot'];
    $codigo_barras = $row_aco['codigo_tikeo'];
    $estado_acomodado = $row_aco['estado_acomodado'];
    $id_prenda = $row_aco['id_prenda'];
    $lugar = $row_aco['lugar']; 

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
    	<td> <?php echo $lugar; ?></td>
    	<td> <button class="btn btn-danger btn-md" onclick="btn_eliminar_ordenes_acomodado('<?php echo $id_carrito_acomodado; ?>');"> X </button></td>
    </tr>
   <?php
 }

?>

  </table>
</div>



