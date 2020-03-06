<?php 
  require "../conector/conexion.php";

  $id_prenda = trim($_POST['id_prenda']);
  $cantidad = trim($_POST['cantidad']);
  $sql_prenda = pg_query("SELECT * FROM prenda WHERE id_prenda='$id_prenda'");
  $row_prenda = pg_fetch_array($sql_prenda);

  $id_cliente  = trim($_POST['id_cliente']);
  $sql_cliente = pg_query("SELECT * FROM cliente WHERE id_cliente='$id_cliente'");
  $row_cliente = pg_fetch_array($sql_cliente);

  $cliente = trim($row_cliente['nombres'])." ".trim($row_cliente['apellidos']);
  $cliente_ci = trim($row_cliente['ci_nit']);
  $descuento = trim($row_cliente['descuento']);
  $tipo_cliente = trim($row_cliente['tipo']);

  $id_usuario = trim($_POST['id_usuario']);
  $id_sucursal = trim($_POST['id_sucursal']);
 
  $id_prenda = trim($row_prenda['id_prenda']);
  $prenda = trim($row_prenda['prenda']);
  $portada = trim($row_prenda['portada']);
  $precio = trim($row_prenda['precio']);
  $tipo_prenda = 2;
  $moneda = trim($row_prenda['moneda']);

  $codigo_ot = "OT".date("YmdHms");
 
  $sql_car = pg_query("INSERT INTO carrito_orden_trabajo(
            id_usuario, id_sucursal, id_cliente, 
            cliente, ci_nit, id_prenda, id_tipo_lavado, cantidad_prenda, 
            cantidad_peso, medida_prenda, costo_prenda, costo_kilo, costo_metro, 
            total_servicio, pago_servicio, saldo_servicio, moneda, descuento, 
            tipo_cliente, estado, codigo_ot)
            
            VALUES ('$id_usuario', '$id_sucursal', '$id_cliente', 
            '$cliente', '$cliente_ci', '$id_prenda', '$tipo_prenda', '1', 
            '0', '$cantidad', '0', '0', '$precio', 
            '$precio', '0', '$precio', '$moneda', '$descuento', 
            '$tipo_cliente', 'ACTIVO', '$codigo_ot')");
 
  if($sql_car==TRUE)
  {
  	 // echo "INGRESO CORRECTO AL CARRITO XD";
  	 
   ?><div class='alert alert-info' role='alert'>
      <strong> REGISTRO CORRECTO!! </strong> Se agrego la prenda tipo metro al carrito
     </div>
  	 <?php
  }


?>

<script src='../control/control_orden_trabajo.js'> </script>