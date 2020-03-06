
 <?php
 require('../conector/conexion.php');

 $codigo_ot = $_POST['ID_orden_trabajo'];

 $sql_ot = pg_query("SELECT * FROM orden_trabajo WHERE codigo_ot='$codigo_ot'");
 $row_ot = pg_fetch_array($sql_ot);
 
 $cliente= trim($row_ot['cliente']);
 $ci_nit = trim($row_ot['ci_nit']);
 $fecha = trim($row_ot['fecha']);
 $hora = trim($row_ot['hora']);
 $descuento = trim($row_ot['descuento']);
 $tipo_cliente = trim($row_ot['tipo_cliente']);
 
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
<?php $query = pg_query("SELECT * FROM orden_trabajo WHERE codigo_ot='$codigo_ot'"); ?>

<table class="table table-bordered table-condensed" style="margin: 0px;">
  <tr align="center">
    <td> <button class="btn btn-default btn-md" onclick="btn_agregar_edicion_simple('<?php echo  $codigo_ot; ?>');"> Prenda Simple </button></td>
    <td> <button class="btn btn-default btn-md" onclick="btn_agregar_edicion_kilo('<?php echo  $codigo_ot; ?>');"> Prenda x Kilo </button></td>
    <td> <button class="btn btn-default btn-md" onclick="btn_agregar_edicion_metro('<?php echo  $codigo_ot; ?>');" > Prenda x Metro </button></td>
  </tr>
</table>
 <table class="table table-bordered table-condensed">
   
  <thead>
    <tr> 
      <th class="col-lg-1" > Prenda </th>
      <th> Tipo </th>
      <th class="col-lg-1" > Cantidad </th>
      <th class="col-lg-1" > Peso </th>
      <th class="col-lg-1" > Medida </th>
      <th> Costo </th>
      <th> Cost Kgrs</th>
      <th> Cost Mtrs </th>
      <th> </th>
      <th> Sub Total </th>
      <th> </th>
      <th> </th>

    </tr>
  </thead> <?php
  $total_servicio=0;
  $pago_servicio=0;
  $saldo_servicio=0;

  while($row = pg_fetch_array($query))
  {
    $id_orden_trabajo  = trim($row['id_orden_trabajo']);
    $id_tipo_lavado = trim($row['id_tipo_lavado']);

    $sql_tipo = pg_query("SELECT * FROM tipo_prenda WHERE id_tipo_prenda = '$id_tipo_lavado'");
    $row_tipo = pg_fetch_array($sql_tipo);

    $tipo_prenda = trim($row_tipo['tipo_prenda']);

    $id_prenda = trim($row['id_prenda']);
    $sql_prend = pg_query("SELECT * FROM prenda WHERE id_prenda = '$id_prenda'");
    $row_prend = pg_fetch_array($sql_prend);

    $prenda = trim($row_prend['prenda']);
    $portada = trim($row_prend['portada']);

    $cantidad_prenda = trim($row['cantidad_prenda']);
    $cantidad_peso = trim($row['cantidad_peso']);
    $medida_prenda = trim($row['medida_prenda']);

    
    $total_servicio = trim($row['total_servicio']);
    $pago_servicio = trim($row['pago_servicio']);
    $saldo_servicio = trim($row['saldo_servicio']);

    $costo_prenda = trim($row['costo_prenda']);
    $costo_kilo = trim($row['costo_kilo']);
    $costo_metro = trim($row['costo_metro']);

    $estado = trim($row['estado']);
   
    //TIPO DE PRENDA SIMPLE
    if ($tipo_prenda=='SIMPLE') { ?>
     <tr>
      <td style="font-weight: bold; font-size: 12px; text-align: center;"> <img src="../multimedia/imagenes/<?php echo $portada; ?>" style=" width: 40px; height: 40px;" > </br> <?php echo $prenda; ?></td>
      <td> <?php echo $tipo_prenda; ?></td>
      <td> <input type="text" class ="form-control" id="cantidad_<?php echo $id_orden_trabajo;?>" value = "<?php echo $cantidad_prenda; ?>" onkeyup="btn_cantidad_ropa_simple('<?php echo $id_orden_trabajo; ?>');" > </td>
      <td> <?php echo $cantidad_peso; ?></td>
      <td> <?php echo $medida_prenda; ?></td>

      <td> <?php echo $costo_prenda; echo "/uds"; ?>
        <input type="hidden" id="costo_prenda" value="<?php echo $costo_prenda;?>">
      </td>
      <td> <?php echo $costo_kilo; echo "/kgrs"; ?></td>
      <td> <?php echo $costo_metro; echo "/mtrs";?></td>
      <td style="font-weight: bold; color: blue;"> <?php echo $estado; ?></td>
      
      <td> <?php echo $cantidad_prenda*$costo_prenda;   ?> </td>

      <td> <button class="btn btn-default btn-xs" onclick="btn_editar_prenda_simple('<?php echo $id_orden_trabajo; ?>');" > Editar </button> </td>
      <td> <button class="btn btn-danger btn-xs" onclick="btn_prenda_eliminar_simple('<?php echo $id_orden_trabajo; ?>');" > Eliminar </button> </td>
    </tr> 

    <?php }

   //TIPO DE PRENDA KILO
    if ($tipo_prenda=='KILO') {
    ?>
    <tr>
      <td style="font-weight: bold; font-size: 12px; text-align: center;"> <img src="../multimedia/imagenes/<?php echo $portada; ?>" style=" width: 40px; height: 40px;" > </br> <?php echo $prenda; ?></td>
      <td> <?php echo $tipo_prenda; ?></td>
      <td> 
        <input type="text" class="form-control" id="cantidad_kilo_<?php echo $id_orden_trabajo;?>" value="<?php echo $cantidad_prenda; ?>" >
      </td>
      <td>
        <input type="text" class="form-control" id="peso_kilo_<?php echo $id_orden_trabajo;?>" value="<?php echo $cantidad_peso; ?>" onkeyup="btn_cantidad_ropa_kilo('<?php echo $id_orden_trabajo; ?>');" > 
      </td>
      <td> <?php echo $medida_prenda; ?></td>

      <td> <?php echo $costo_prenda; echo "/uds"; ?></td>
      <td> <?php echo $costo_kilo; echo "/kgrs"; ?>
        <input type="hidden" id="costo_kilo" value="<?php echo $costo_kilo;?>">
      </td>
      <td> <?php echo $costo_metro; echo "/mtrs";?></td>
     
      <td style="font-weight: bold; color: blue;"> <?php echo $estado; ?></td>

       <td> <?php echo $cantidad_peso*$costo_kilo;   ?> </td>

      <td> <button class="btn btn-default btn-xs" onclick="btn_editar_prenda_kilo('<?php echo $id_orden_trabajo; ?>');"> Editar </button> </td>
      <td> <button class="btn btn-danger btn-xs" onclick="btn_prenda_eliminar_kilo('<?php echo $id_orden_trabajo; ?>');" > Eliminar </button> </td>
    </tr>
    <?php
    }


   //TIPO DE PRENDA SIMPLE
    if ($tipo_prenda=='X METRO') {
    ?>
    <tr>
      <td style="font-weight: bold; font-size: 12px; text-align: center;"> <img src="../multimedia/imagenes/<?php echo $portada; ?>" style=" width: 40px; height: 40px;" > </br> <?php echo $prenda; ?></td>
      <td> <?php echo $tipo_prenda; ?></td>
      <td>
      <input type="text" class="form-control" id="cantidad_metro_<?php echo $id_orden_trabajo;?>" value="<?php echo $cantidad_prenda; ?>" onkeyup="btn_cantidad_ropa_metro('<?php echo $id_orden_trabajo; ?>');" >
      </td>
      <td> <?php echo $cantidad_peso; ?></td>
      <td>
      <input type="text" class="form-control" id="medida_metro_<?php echo $id_orden_trabajo;?>" value="<?php echo $medida_prenda; ?>" onkeyup="btn_cantidad_ropa_metro('<?php echo $id_orden_trabajo; ?>');" >      
      </td>

      <td> <?php echo $costo_prenda; echo "/uds"; ?></td>
      <td> <?php echo $costo_kilo; echo "/kgrs"; ?></td>
      <td> <?php echo $costo_metro; echo "/mtrs";?>
        <input type="hidden" id="costo_metro" value="<?php echo $costo_metro;?>">
      </td>

      <td style="font-weight: bold; color: blue;"> <?php echo $estado; ?></td>

      <td> <?php echo $cantidad_prenda*$medida_prenda*$costo_metro;   ?> </td>

      <td> <button class="btn btn-default btn-xs" onclick="btn_editar_prenda_metro('<?php echo $id_orden_trabajo; ?>');" > Editar </button> </td>
      <td> <button class="btn btn-danger btn-xs" onclick="btn_prenda_eliminar_metro('<?php echo $id_orden_trabajo; ?>');" > Eliminar </button> </td>
    </tr>
    <?php
    }

 }
 ?>

 </table>

 <table class="table table-condensed">
   <tr>
     <th> Total </th>
     <td> <?php echo $total_servicio; echo " Bs. "; ?>
       <input type="hidden" id="total" class="form-control" value="<?php echo $total_servicio; ?>" disabled = "true" >
       <input type="text" id="total_aux" class="form-control" value="<?php echo $total_servicio; ?>" disabled = "true" >
     </td>
     
     <th> Pago </th>
     <td> <?php echo $pago_servicio; echo " Bs. "; ?>

        <input type="hidden" id="pago" class="form-control" value="<?php echo $pago_servicio; ?>">
        <input type="text" id="pago_aux" class="form-control" value="<?php echo $pago_servicio; ?>">

     </td>
     
     <th> Saldo </th>
     <td> <?php echo $saldo_servicio; echo " Bs. "; ?>

        <input type="hidden" id="saldo" class="form-control" value="<?php echo $saldo_servicio; ?>" disabled = "true">
        <input type="text" id="saldo_aux" class="form-control" value="<?php echo $saldo_servicio; ?>" disabled = "true">

     </td>
   </tr>
 </table>
 <script type='text/javascript' src='../control/control_editar_orden_trabajo.js'></script>
 

