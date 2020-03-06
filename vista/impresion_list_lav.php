    
<link rel='stylesheet' type='text/css' href='../libreria/bootstrap/css/bootstrap.min.css'>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<script type='text/javascript' src='../libreria/bootstrap/js/jquery.min.js'></script>
<script type='text/javascript' src='../libreria/bootstrap/js/bootstrap.min.js'></script>
<script type='text/javascript' src='../libreria/bootstrap/js/jquery-barcode.js'></script> 

<div class="row">
<div class="col-lg-4 col-md-4 col-xs-12" style="background: ;">
<?php

 $codigo_lavado = trim($_GET['codigo_lav']);
require "../conector/conexion.php";
?>

<h5 style="margin: 0px; font-weight: bold;"> Servicio de Lavado SUPER CLEAN :   
<div id="codigo_barras_lav" style="margin: 0%; font-size: 10px; width: 100px; float: right;"></div> </h5>
 
<table class="table table-bordered table-condensed" style="font-size: 10px; margin: 0px;">
  <tr>
    <th class="col-lg-1"> Codigo Lav </th>
    <th> Prenda </th>
    <th> tipo </th>
    <th> cliente </th>
   
    <th class="col-lg-2"> fecha </th>
    <th class="col-lg-2"> hora </th>
  </tr>

 <?php
 
 $query = pg_query("SELECT * FROM lavado WHERE codigo_lavado='$codigo_lavado' ORDER BY codigo_tikeo ASC");
 while($row = pg_fetch_array($query))
 {
 
  $id_lavado = $row['id_lavado']; 
  $id_usuario = $row['id_usuario'];
  $id_cliente = $row['id_cliente'];

  $id_sucursal = $row['id_sucursal'];
  $id_ot = $row['id_ot'];
  $codigo_ot = $row['codigo_ot'];
  $id_prenda = $row['id_prenda'];

  $codigo_lavado = $row['codigo_lavado'];
  $cliente = $row['cliente'];

  $fecha = $row['fecha'];
  $hora = $row['hora'];
 
  $tipo_lavado = trim($row['tipo_lavado']);

  if($tipo_lavado=="1")
  { $tipo = 'SECO'; }
  else{ if($tipo_lavado=="2"){ $tipo = 'VAPOR'; }}

  
  $estado_lavado = $row['estado_lavado'];
  $codigo_tikeo = $row['codigo_tikeo'];
  
  $sql_prend = pg_query("SELECT * FROM prenda WHERE id_prenda = '$id_prenda'");
  $row_prend = pg_fetch_array($sql_prend);

  $prenda = $row_prend['prenda'];
  $img = $row_prend['portada'];

  ?>
   <tr style="font-size: 8px;">
     <td style="font-weight: bold;"> <?php echo $codigo_tikeo; ?> </td>
     <td align="center" > <?php echo $prenda; ?> </td>
     <td align="center" > <?php echo $tipo; ?> </td>
     <td align="center" > <?php echo $cliente; ?> </td>
     <td align="center"> <?php echo $fecha; ?> </td>
     <td align="center"> <?php echo $hora; ?> </td>
   </tr>
  <?php 

 }

 ?>
</table>
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

  var value = "<?php echo trim($codigo_lavado); ?>";
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
               
  $("#codigo_barras_lav").show().barcode(value, btype, settings);
}
     
 
</script>