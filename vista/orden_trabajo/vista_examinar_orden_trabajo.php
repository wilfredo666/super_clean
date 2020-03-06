
 <?php
 require('../conector/conexion.php');

 $codigo_ot = $_POST['ID_orden_trabajo'];

 $sql_ot = pg_query("SELECT * FROM orden_trabajo WHERE codigo_ot='$codigo_ot'");
 $row_ot = pg_fetch_array($sql_ot);
 $cliente= $row_ot['cliente'];
 $ci_nit = $row_ot['ci_nit'];
 $fecha = $row_ot['fecha'];
 $hora = $row_ot['hora'];
 $descuento = $row_ot['descuento'];
 $tipo_cliente = $row_ot['tipo_cliente'];
?>
<table class="table table-bordered table-condensed">
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

 <table class="table table-bordered table-condensed">
   
  <thead>
    <tr> 
      <th class="col-lg-1"> Prenda </th>
      <th> Tipo </th>
      <th> Cantidad </th>
      <th> Peso </th>
      <th> Medida </th>
      <th> Costo </th>
      <th> Costo Kgrs</th>
      <th> Costo Mtrs </th>
      <th></th>

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
      <td style="font-weight: bold; font-size: 12px; text-align: center;"> <img src="../multimedia/imagenes/<?php echo $portada; ?>" style=" width: 40px; height: 40px;" > </br> <?php echo $prenda; ?></td>
      <td> <?php echo $tipo_prenda; ?></td>
      <td> <?php echo $cantidad_prenda; ?></td>
      <td> <?php echo $cantidad_peso; ?></td>
      <td> <?php echo $medida_prenda; ?></td>

      <td> <?php echo $costo_prenda; echo "/uds"; ?></td>
      <td> <?php echo $costo_kilo; echo "/kgrs"; ?></td>
      <td> <?php echo $costo_metro; echo "/mtrs";?></td>

      <td style="font-weight: bold; color: black;"> <?php echo $estado; ?></td>
    </tr>
    <?php
  }

 ?>

 </table>

 <table class="table table-condensed">
   <tr>
     <th> Total </th>
     <td> <?php echo $total_servicio; echo " Bs. "; ?></td>
     
     <th> Pago </th>
     <td> <?php echo $pago_servicio; echo " Bs. "; ?></td>
     
     <th> Saldo </th>
     <td> <?php echo $saldo_servicio; echo " Bs. "; ?></td>
   </tr>
 </table>
 <script type='text/javascript' src='../control/control_editar_orden_trabajo.js'></script>
 
