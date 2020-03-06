<?php
require "../conector/conexion.php";
$codigo = trim($_POST['codigo']);
?>	
<input type="hidden" id="codigo" value="<?php echo $codigo; ?>">

<table class="table table-bordered table-condensed table-hover">
<tr>
	<th> Cliente </th>
	<th> Prenda </th>
	<th> Medida </th>
	<th> Costo </th>
	<th> Fecha </th>
	<th> Hora </th>

</tr>
<?php
$sql_le = pg_query("SELECT * FROM lavado_especial WHERE codigo='$codigo'");
while ($row = pg_fetch_array($sql_le)) 
{
  $id_lavado_especial = trim($row['id_lavado_especial']);
  $cliente = trim($row['cliente']);
  $id_cliente = trim($row['id_cliente']);
  $prenda = trim($row['prenda']);
  $id_prenda = trim($row['id_prenda']);
  $medida = trim($row['medida']);
  $total = trim($row['total']);
  $pago = trim($row['pago']);
  $saldo = trim($row['saldo']);
  $id_usuario = trim($row['id_usuario']);
  $fecha = trim($row['fecha']);
  $hora = trim($row['hora']);

  $sql_prend = pg_query("SELECT * FROM prenda WHERE id_prenda = '$id_prenda'");
  $row_prend = pg_fetch_array($sql_prend);
  $costo = trim($row_prend['precio']);

  ?>
  <script type="text/javascript">
  	var cobro_lav = new cobro_lavado('<?php echo $id_lavado_especial; ?>',
  	'<?php echo $costo; ?>');
  	lista_cobro.push(cobro_lav);
  </script>
  <tr>
  	<td> <?php echo $cliente; ?> </td>
   	<td> <?php echo $prenda; ?> </td>
  	<td> <input type="text" onkeyup="btn_calcular_medida('<?php echo $id_lavado_especial; ?>');" class="form-control" id="medida_<?php echo $id_lavado_especial; ?>" value="<?php echo $medida; ?>" > </td>
  	<td> <?php echo $costo; echo " Bs. "; ?> </td>
  	<td> <?php echo $fecha; ?> </td>
  	<td> <?php echo $hora; ?> </td>

  </tr>
  <?php
	
}
?>
<tr>
  <th> <label> TOTAL </label> </th>
  <th> <label> PAGO </label> </th>
  <th> <label> CAMBIO </label> </th>
  <th> <label> SALDO </label> </th>
  <th colspan="2"> </th>
</tr>
<tr>
	<td> <input type="text" class="form-control" id="total" value="<?php echo $total; ?>" disabled ></td>
	
  <td> <input type="text" class="form-control" id="pago" value="<?php echo $pago; ?>" onkeyup="btn_calcular_total();" ></td>

  <td> <input type="text" class="form-control" id="cambio" value="0" disabled ></td>

  <td> <input type="text" class="form-control" id="saldo" value="<?php echo $saldo; ?>" disabled ></td>
  <td colspan="2">
    
  </td>
</tr>
</table>

<div id="panel_resultado_cobro_le"></div>