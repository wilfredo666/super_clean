    
<link rel='stylesheet' type='text/css' href='../libreria/bootstrap/css/bootstrap.min.css'>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<script type='text/javascript' src='../libreria/bootstrap/js/jquery.min.js'></script>
<script type='text/javascript' src='../libreria/bootstrap/js/bootstrap.min.js'></script>
<script type='text/javascript' src='../libreria/bootstrap/js/jquery-barcode.js'></script> 

<div class="row">
<div class="col-lg-4 col-md-4 col-xs-12" style="background: ;">
<?php

$codigo = trim($_GET['codigo']);
require "../conector/conexion.php";

?>

<h4 style="margin: 0px; font-size: 12px; font-weight: bold; margin-bottom: 3px; margin-top: 3px;"> ORDEN DE LAVADO SUPER CLEAN :  

<div id="codigo_barras_ot" style="margin: 0%; font-size: 20px; float: right;"></div>

</h4>

<table class="table table-bordered table-condensed" style="font-size: 10px; width: 100%; margin: :0px; margin-bottom: -5px;">

<tr>
  <th> Prenda </th>
  <th> Medida </th>
  <th> Costo </th>
  <th> Subtotal </th>
  <th> Fecha </th>
  <th> Hora </th>

</tr>

<?php
 $sql_le = pg_query("SELECT * FROM lavado_especial WHERE codigo='$codigo'");
 while($row = pg_fetch_array($sql_le))
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

  $sql_cli = pg_query("SELECT * FROM cliente WHERE id_cliente = '$id_cliente'");
  $row_cli = pg_fetch_array($sql_cli);
  $ci = trim($row_cli['ci_nit']);
?>
   <tr>
    
    <td> <?php echo $prenda; ?> </td>
    <td> <?php echo $medida; ?> </td>
    <td> <?php echo $costo; ?> </td>
    <td> <?php echo $cu = $medida*$costo; ?></td>
    <td> <?php echo $fecha; ?> </td>
    <td> <?php echo $hora; ?> </td>

  </tr>
  <?php
}

$sql_cobr = pg_query("SELECT * FROM cobro_lavado_especial WHERE codigo_lav = '$codigo'");
$row_cobr = pg_fetch_array($sql_cobr);
$total = trim($row_cobr['total']);
$pago = trim($row_cobr['pago']);
$saldo = trim($row_cobr['saldo']);
?>

<tr>
  <th colspan="2"> cliente </th>
  <th> ci </th>
  <th> total </th>
  <th> pago </th>
  <th> saldo </th>
</tr>

<tr>
  <td colspan="2"> <?php echo $cliente; ?></td>
  <td> <?php echo $ci; ?></td>
  <td> <?php echo $total; ?> </td>
  <td> <?php echo $pago; ?> </td>
  <td> <?php echo $saldo; ?> </td>
</tr>
</table>
<p style="font-size: 9px; margin-top: 1.5%; padding: 0.5%;"> El pago se lo realiza al entregar las prendas conjuntamente con el precio !!! gracias por su preferencia</p>

 </div>
 <div class="col-lg-4 col-md-4 col-xs-12"></div>

 
 </div>

<script type="text/javascript">
	
$(document).ready(function(){
  btn_generar_cb_entrega();
  window.print();
});

function btn_generar_cb_entrega()
{   

  var value = "<?php echo $codigo; ?>";
  var btype="code128";
             
  var settings = {
    output:'css',
    bgColor: '#FFFFFF',
    color: '#151515',
    barWidth: '1',
    barHeight: '20',
    moduleSize: '1',
    posX: '0',
    posY: '0',
    addQuietZone: '0'
  };
               
  $("#codigo_barras_ot").show().barcode(value, btype, settings);
}


 
</script>