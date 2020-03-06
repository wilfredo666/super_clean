    
<link rel='stylesheet' type='text/css' href='../../libreria/bootstrap/css/bootstrap.min.css'>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<script type='text/javascript' src='../../libreria/bootstrap/js/jquery.min.js'></script>
<script type='text/javascript' src='../../libreria/bootstrap/js/bootstrap.min.js'></script>
<script type='text/javascript' src='../../libreria/bootstrap/js/jquery-barcode.js'></script> 

<div class="row">
<div class="col-lg-4 col-md-4 col-xs-12" style="background: ;">
<?php

$codigo_ot = trim($_GET['codigo_ot']);
require "../conector/conexion.php";

$sql_ot = pg_query("SELECT * FROM orden_trabajo WHERE codigo_ot='$codigo_ot'");
 $row_ot = pg_fetch_array($sql_ot);
 $cliente= $row_ot['cliente'];
 $ci_nit = $row_ot['ci_nit'];
 $fecha = $row_ot['fecha'];
 $hora = $row_ot['hora'];
 $descuento = $row_ot['descuento'];
 $tipo_cliente = $row_ot['tipo_cliente'];
?>
<h4 style="margin: 0px; font-size: 12px; font-weight: bold; margin-bottom: 3px; margin-top: 3px;"> ORDEN DE TRABAJO SUPER CLEAN :  

<div id="codigo_barras_ot" style="margin: 0%; font-size: 20px; float: right;"></div>

</h4>

<table class="table table-bordered table-condensed" style="font-size: 10px; width: 100%; margin: :0px; margin-bottom: -5px;">
  <tr>
    <th> Cliente </th>
    <td> <?php echo $cliente; ?></td>
    <th> Ci/ Nit </th>
    <td> <?php echo $ci_nit; ?></td>
  </tr>
  <tr>
    <th> fecha </th>
    <td> <?php echo $fecha; ?></td>
    <th> hora </th>
    <td> <?php echo $hora; ?></td>
  </tr>

  <tr>
    <th> Tipo de Cliente </th>
    <td> <?php echo $tipo_cliente; ?></td>
    <th> descuento </th>
    <td> <?php echo $descuento; echo "%"; ?></td>
  </tr>

</table>
<?php

 $query = pg_query("SELECT * FROM orden_trabajo WHERE codigo_ot='$codigo_ot'");
 ?>

 <table class="table table-bordered table-condensed" style="font-size: 9px; width: 100%; margin: :0px; margin-bottom: -5px;">
   
  <thead>
    <tr> 
      <th class="col-lg-1"> Prenda </th>
      <th> Tipo </th>
      <th> Cant </th>
      <th> Peso </th>
      <th> Med </th>
      <th> Costo </th>
      <th> C Kgrs</th>
      <th> C Mtrs </th>
    </tr>
  </thead> <?php
  $total_servicio=0;
  $pago_servicio=0;
  $saldo_servicio=0;

  while($row = pg_fetch_array($query))
  {

  
    $id_tipo_lavado = $row['id_tipo_lavado'];

    $sql_tipo = pg_query("SELECT * FROM tipo_prenda WHERE id_tipo_prenda = '$id_tipo_lavado'");
    $row_tipo = pg_fetch_array($sql_tipo);

    $tipo_prenda = $row_tipo['tipo_prenda'];

    $id_prenda = $row['id_prenda'];
    $sql_prend = pg_query("SELECT * FROM prenda WHERE id_prenda = '$id_prenda'");
    $row_prend = pg_fetch_array($sql_prend);

    $prenda = $row_prend['prenda'];
    $portada = $row_prend['portada'];

    $cantidad_prenda = $row['cantidad_prenda'];
    $cantidad_peso = $row['cantidad_peso'];
    $medida_prenda = $row['medida_prenda'];

    
    $total_servicio=$row['total_servicio'];
    $pago_servicio=$row['pago_servicio'];
    $saldo_servicio=$row['saldo_servicio'];

    $costo_prenda = $row['costo_prenda'];
    $costo_kilo = $row['costo_kilo'];
    $costo_metro = $row['costo_metro'];

    $estado=$row['estado'];

    ?>
    <tr>
      <td style="font-weight: bold; font-size: 12px; text-align: center;">  <?php echo $prenda; ?></td>
      <td> <?php echo $tipo_prenda; ?></td>
      <td> <?php echo $cantidad_prenda; ?></td>
      <td> <?php echo $cantidad_peso; ?></td>
      <td> <?php echo $medida_prenda; ?></td>

      <td> <?php echo $costo_prenda; echo "/uds"; ?></td>
      <td> <?php echo $costo_kilo; echo "/kgrs"; ?></td>
      <td> <?php echo $costo_metro; echo "/mtrs";?></td>
    </tr>
    <?php
  }

 ?>

 </table>

 <table class="table table-bordered table-condensed" style="font-size: 10px; width: 100%; margin: :0px; padding: 0px; margin-top: 0px;">
   <tr>
     <th> Total </th>
     <td> <?php echo $total_servicio; echo " Bs. "; ?></td>
     
     <th> Pago </th>
     <td> <?php echo $pago_servicio; echo " Bs. "; ?></td>
     
     <th> Saldo </th>
     <td> <?php echo $saldo_servicio; echo " Bs. "; ?></td>
   </tr>
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

  var value = "<?php echo $codigo_ot; ?>";
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