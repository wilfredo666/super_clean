<?php
  date_default_timezone_set('America/La_Paz');
  $peso_prendas_kilo = trim($_POST['peso_prendas_kilo']);
  $total_costo_ot = trim($_POST['total_costo_ot']);
  $pago_servicio = trim($_POST['pago_servicio']); 
  $saldo_servicio = trim($_POST['saldo_servicio']);
  $id_usuario = trim($_POST['id_usuario']);
  $id_sucursal = trim($_POST['id_sucursal']);
 
  require('../conector/conexion.php');

  if ($peso_prendas_kilo!="" && $total_costo_ot!="" && $pago_servicio!="" && $saldo_servicio!="" &&
      $id_usuario!="" && $id_sucursal!="" ) 
  {
  
  $sql_car_ot = pg_query("SELECT * FROM carrito_orden_trabajo WHERE id_usuario='$id_usuario' AND id_sucursal='$id_sucursal'");

  while ($row_car_ot = pg_fetch_array($sql_car_ot)) {
 
  $id_prenda= trim($row_car_ot['id_prenda']); 
  $id_cliente= trim($row_car_ot['id_cliente']);
  $id_tipo_lavado= trim($row_car_ot['id_tipo_lavado']); 
  $cantidad_prenda= trim($row_car_ot['cantidad_prenda']); 
  
  //precio de prendas por kilo
  $sql_prec_kilo = pg_query("SELECT * FROM precio_kilo");
  $row_prec_kilo = pg_fetch_array($sql_prec_kilo);
  $costo_kilo = trim($row_prec_kilo['precio_kilo']);

  if ($id_tipo_lavado==3) {
    $cantidad_peso = $peso_prendas_kilo;

  }
  else{
    $cantidad_peso= 0;
  }
   
  if ($id_tipo_lavado==1) {
    $costo_kilo = 0;
  }

  if ($id_tipo_lavado==2) {
    $costo_kilo = 0;
  }

  $medida_prenda= trim($row_car_ot['medida_prenda']); 
  $costo_prenda= trim($row_car_ot['costo_prenda']); 
 
  $costo_metro= trim($row_car_ot['costo_metro']); 
  $total_servicio = $total_costo_ot; 
  $pago_servicio = $pago_servicio; 
  $saldo_servicio = $saldo_servicio; 
  $moneda= trim($row_car_ot['moneda']); 
  
  $tipo_cliente= trim($row_car_ot['tipo_cliente']); 
  $estado= trim($row_car_ot['estado']); 
  $codigo_ot = "OT".date("YmdHms");
  $fecha = date("Y-m-d");
  $hora = date("H:i:s");

  $sql_cli = pg_query("SELECT * FROM cliente WHERE id_cliente = '$id_cliente'");
  $row_cli = pg_fetch_array($sql_cli);
  $cliente = trim($row_cli['nombres'])." ".trim($row_cli['apellidos']);
  $ci_nit = trim($row_cli['ci_nit']);
  $descuento = trim($row_cli['descuento']);

  $sql_ot= pg_query("INSERT INTO orden_trabajo (id_usuario ,id_sucursal ,id_cliente ,cliente ,ci_nit ,id_prenda ,id_tipo_lavado ,cantidad_prenda ,cantidad_peso ,medida_prenda ,costo_prenda ,costo_kilo ,costo_metro ,total_servicio ,pago_servicio ,saldo_servicio ,moneda ,descuento ,tipo_cliente ,estado ,codigo_ot, fecha, hora ) VALUES ( '$id_usuario' , '$id_sucursal' , '$id_cliente' , '$cliente' , '$ci_nit' , '$id_prenda' , '$id_tipo_lavado' , '$cantidad_prenda' , '$cantidad_peso' , '$medida_prenda' , '$costo_prenda' , '$costo_kilo' , '$costo_metro' , '$total_servicio' , '$pago_servicio' , '$saldo_servicio' , '$moneda' , '$descuento' , '$tipo_cliente' , '$estado' , '$codigo_ot', '$fecha' , '$hora')"); 

  }

  $sql_eliminar_cot = pg_query("DELETE FROM carrito_orden_trabajo");

  ?>
   <div class='alert alert-info' role='alert'>
   <strong> REGISTRO CORRECTO!! </strong> Se guardaron los datos correctamente
   </div>
   
   <script type="text/javascript">

   
     setTimeout(function(){ btn_imprimir_recibo_ot(); },2000);
     setTimeout(function(){ btn_listar_ordenes_trabajo(); },3000);
      
     function btn_imprimir_recibo_ot()
     {
      window.open('../vista/orden_trabajo/vista_imprimir_recibo_ot.php?codigo_ot='+'<?php echo $codigo_ot; ?>', '_blank');
     }
    
   </script>
  <?php
  }
  else{
   ?>
      <div class='alert alert-danger' role='alert'>
      <strong> ERROR EN REGISTRO!! </strong> Se debe llenar todos los campos
      </div>
   <?php
  }
?>
