
<div class="table-responsive"> 
<table class="table table-condensed table-bordered table-hover table-striped"> 
 <thead>
 	<tr style="font-size: 11px;">
 		<th> # </th>
 		<th> PRENDA </th>
 		<th> TIPO </th>
 		<th> CANT </th>
 		<th> MEDIDA </th>
 		<th> PRECIO / uds </th>
 		<th> PRECIO / mtrs </th>
 		<th> </th>
 	</tr>
 </thead>
<?php

$id_usuario = $_POST['id_usuario']; 
$id_sucursal = $_POST['id_sucursal'];

require "../conector/conexion.php";

$sql_ot = pg_query("SELECT * FROM carrito_orden_trabajo WHERE id_usuario='$id_usuario' AND id_sucursal='$id_sucursal' ORDER BY id_carrito_orden_trabajo DESC");
$i=0;
while ($row_ot = pg_fetch_array($sql_ot)) {
  $i++; 
  $id_carrito_orden_trabajo = $row_ot['id_carrito_orden_trabajo'];
  $id_usuario = $row_ot['id_usuario']; 
  $id_sucursal = $row_ot['id_sucursal']; 
  $id_cliente = $row_ot['id_cliente']; 
  $cliente = $row_ot['cliente'];  
  $ci_nit = $row_ot['ci_nit'];  
  $id_prenda = $row_ot['id_prenda'];  
  $id_tipo_lavado = $row_ot['id_tipo_lavado'];  
  $cantidad_prenda = $row_ot['cantidad_prenda'];  
  $cantidad_peso = $row_ot['cantidad_peso'];  
  $medida_prenda = $row_ot['medida_prenda'];  
  $costo_prenda = $row_ot['costo_prenda'];  
  $costo_kilo = $row_ot['costo_kilo'];  
  $costo_metro = $row_ot['costo_metro'];  
  $total_servicio = $row_ot['total_servicio']; 
  $pago_servicio = $row_ot['pago_servicio'];  
  $saldo_servicio = $row_ot['saldo_servicio'];  
  $moneda = $row_ot['moneda']; 
  $descuento = $row_ot['descuento'];  
  $tipo_cliente = $row_ot['tipo_cliente'];  
  $estado = $row_ot['estado'];  
  $codigo_ot = $row_ot['codigo_ot'];
  ?>
 	<tr align="center">
 		<td> <?php echo $i; ?> </td>
 		<td> <?php 
 		$sql_prend = pg_query("SELECT * FROM prenda WHERE id_prenda='$id_prenda'");
 		$row_prend = pg_fetch_array($sql_prend);
 		$portada = $row_prend['portada'];
 		$prenda = $row_prend['prenda'];
 		echo $prenda;
 		?> 
 		<img src="../multimedia/imagenes/<?php echo $portada; ?>" style="width: 50px; height: 50px;">
 	    </td>
 		<td> <?php $id_tipo_lavado;
 		     $sql_tip = pg_query("SELECT * FROM tipo_prenda WHERE id_tipo_prenda='$id_tipo_lavado'");
 		     $row_tip = pg_fetch_array($sql_tip); 
 		     echo $tipo_prenda = $row_tip['tipo_prenda'];
 		?> </td>
 		<td> <?php echo $cantidad_prenda; ?> </td>
 		<td> <?php echo $medida_prenda; ?> </td>
 		<td> <?php echo $costo_prenda; ?> </td>
        <td> <?php echo $costo_metro; ?> </td>
 		<td> <button class="btn btn-danger btn-md" data-toggle="modal" data-target="#myModal_Eliminar_Prenda" onclick="btn_eliminar_prenda_general('<?php echo $id_carrito_orden_trabajo; ?>')"> X </button></td>
 	</tr>
  <?php
}

?>
</table>
</div>