<?php
$codigo_ot = trim($_POST['codigo_ot']);
require "../conector/conexion.php";
?>
<input type="hidden" id="codigo_ot" value="<?php echo $codigo_ot; ?>">
<h5 style="font-weight: bold;"> N° de Orden de Servicio : <?php echo $codigo_ot; ?> </h5>
<h5> Chofer : </h5>
<select class="form-control" id="select_chofer"  style="margin-bottom: 1.5%;">
	<option value=""> Seleccione el Chofer </option>
	<?php
     $sql_chof = pg_query("SELECT * FROM chofer");
     while ($row_chof = pg_fetch_array($sql_chof)) {
     	$id_chofer = $row_chof['id_chofer'];
     	$chofer = $row_chof['nombre_completo'];
     	?>
        <option value="<?php echo $id_chofer; ?>"> <?php echo $chofer; ?></option>
     	<?php
     }
	?>
</select>
<div id="resp_id_chofer"></div>
<div class="table-responsive" style="max-height: 300px; border: 1px solid #BDBDBD;">
<table class="table table-bordered table-condensed table-hover">
<tr>
	<th> PRENDA </th>
	<th> TIPO </th>
	<th> CANTIDAD </th>
	<th> PESO </th>
	<th> METRO </th>
	<th> ESTADO </th>
</tr>
	
<?php
$sql_ot = pg_query("SELECT * FROM orden_trabajo WHERE codigo_ot = '$codigo_ot'");

while ($row_ot = pg_fetch_array($sql_ot)) {
  
  $id_prenda = $row_ot['id_prenda'];

  $sql_prend = pg_query("SELECT * FROM prenda WHERE id_prenda = '$id_prenda'");
  $row_prend = pg_fetch_array($sql_prend);

  $prenda = $row_prend['prenda'];
  $img = $row_prend['portada'];
  $id_tipo_lavado = $row_ot['id_tipo_lavado'];

  $sql_tipo = pg_query("SELECT * FROM tipo_prenda WHERE id_tipo_prenda = '$id_tipo_lavado'");
  $row_tipo = pg_fetch_array($sql_tipo);

  $tipo = $row_tipo['tipo_prenda'];
  $cantidad_prenda = $row_ot['cantidad_prenda'];

  $cantidad_peso = $row_ot['cantidad_peso'];
  $medida_prenda = $row_ot['medida_prenda'];
  $estado = $row_ot['estado'];

  ?>
    <tr>
    	<td style="font-size: 10px; text-align: center; "> <img src="../multimedia/imagenes/<?php echo $img; ?>" style="width: 50px; height: 50px;"> </br> <?php echo $prenda; ?></td>
    	<td> <?php echo $tipo; ?></td>
    	<td> <?php echo $cantidad_prenda; ?></td>
    	<td> <?php echo $cantidad_peso; ?></td>
    	<td> <?php echo $medida_prenda; ?></td>
    	<td> <?php echo $estado ; ?></td>
    </tr>
  <?php

}

?>

</table>
</div>

<table class="table table-condensed" style="margin-bottom: 0px;">
	<tr>
		<td> Costo de Envio </td>
		<td> <input type="text" class="form-control" id="costo_envio" placeholder="* Costo de Envio en Bs">
		<div id="resp_precio_envio"></div>
	    </td>
		<td> <label> Bs. </label></td>
	</tr>
	<tr>
		<td> <input type="text" id="fecha_reg" disabled style="border:none; background: transparent;"> </td> 
		<td> <input type="text" id="hora" disabled style="border:none; background: transparent;"> </td>
		<td> </td>
	</tr>
</table>

<div align="center" style="padding-top: 0%;">
    <div id="panel_registro_envio_domiciolio"> </div>
	<button class="btn btn-info" onclick="btn_registrar_ot_chofer();"> Registrar </button>
	
</div>