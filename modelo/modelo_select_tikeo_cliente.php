<?php

require "../conector/conexion.php";

$opcion = trim($_POST['opcion']);

if ($opcion == "cliente") {
	$txt_buscar = $_POST['txt_buscar'];

	$sql_cli = pg_query("SELECT * FROM cliente WHERE nombres ILIKE '%$txt_buscar%' OR apellidos ILIKE '%$txt_buscar%' OR CONCAT(nombres,' ',apellidos) ILIKE '%$txt_buscar%' LIMIT 10");
?>

<div style="z-index: 1; position: absolute; background: white; border:1px solid #A4A4A4; padding: 1%; width: 100%; max-height: 200px; overflow-y: scroll;">
	<div align="right">
		<button class="btn btn-danger btn-xs" onclick="btn_cerrar_select_cliente();"> X Cerrar </button>
</div>

<table class="table table-bordered table-condensed table-hover table-striped">
<?php
	while ($row_cli = pg_fetch_array($sql_cli)) {
	 $id_cliente = $row_cli['id_cliente'];
	 $cliente = trim($row_cli['nombres'])." ".trim($row_cli['apellidos']);

	 ?>
     <tr align="center">
     	<td align="left"> <?php echo $cliente; ?></td>
     	<td> <button class="btn btn-info btn-md" onclick="btn_select_cliente_item('<?php echo $id_cliente; ?>','<?php echo $cliente; ?>');" > + </button></td>
     </tr>
	 <?php
	}
?>
</table>
</div>

<?php
}

if ($opcion == "prenda") {
	$txt_buscar = $_POST['txt_prenda'];

	$sql_prend = pg_query("SELECT * FROM prenda WHERE prenda ILIKE '%$txt_buscar%' LIMIT 10");
?>

<div style="z-index: 1; position: absolute; background: white; border:1px solid #A4A4A4; padding: 1%; width: 100%; max-height: 200px; overflow-y: scroll;">
	<div align="right">
		<button class="btn btn-danger btn-xs" onclick="btn_cerrar_select_prenda();"> X Cerrar </button>
</div>

<table class="table table-bordered table-condensed table-hover table-striped">
<?php
	while ($row_prend = pg_fetch_array($sql_prend)) {
	 $id_prenda = $row_prend['id_prenda'];
	 $prenda = $row_prend['prenda'];
	 $portada = $row_prend['portada'];

	 ?>
     <tr align="center">
     	<td align="left"> <?php echo $prenda; ?></td>
     	<td align="left"> 
     		<img src="../multimedia/imagenes/<?php echo $portada; ?>" style="width: 50px; height: 50px;">
     	</td>
     	<td> <button class="btn btn-info btn-md" onclick="btn_select_prenda_item('<?php echo $id_prenda; ?>','<?php echo $prenda; ?>');" > + </button></td>
     </tr>
	 <?php
	}
?>
</table>
</div>
<?php
}
?>