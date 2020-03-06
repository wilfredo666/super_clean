
  <?php 

  require('../conector/conexion.php');
 
    $id_usuario = trim($_POST['id_usuario']);
    
    $id_sucursal = trim($_POST['id_sucursal']);
    
    $id_cliente = trim($_POST['id_cliente']);
    
    $cliente = trim($_POST['cliente']);
    
    $ci_nit = trim($_POST['ci_nit']);
    
    $id_prenda = trim($_POST['id_prenda']);
    
    $id_tipo_lavado = trim($_POST['id_tipo_lavado']);
    
    $cantidad_prenda = trim($_POST['cantidad_prenda']);
    
    $cantidad_peso = trim($_POST['cantidad_peso']);
    
    $medida_prenda = trim($_POST['medida_prenda']);
    
    $costo_prenda = trim($_POST['costo_prenda']);
    
    $costo_kilo = trim($_POST['costo_kilo']);
    
    $costo_metro = trim($_POST['costo_metro']);
    
    $total_servicio = trim($_POST['total_servicio']);
    
    $pago_servicio = trim($_POST['pago_servicio']);
    
    $saldo_servicio = trim($_POST['saldo_servicio']);
    
    $moneda = trim($_POST['moneda']);
    
    $descuento = trim($_POST['descuento']);
    
    $tipo_cliente = trim($_POST['tipo_cliente']);
    
    $estado = trim($_POST['estado']);
    
    $codigo_ot = trim($_POST['codigo_ot']);
    
    $ID_carrito_orden_trabajo = $_POST['ID_carrito_orden_trabajo'];
  
  $cadena= '';
       if($id_usuario!='')
       {
       $query = pg_query("UPDATE carrito_orden_trabajo SET id_usuario = '$id_usuario' WHERE id_carrito_orden_trabajo = $ID_carrito_orden_trabajo");$cadena.=' Se edito id_usuario , ';
       } 
       if($id_sucursal!='')
       {
       $query = pg_query("UPDATE carrito_orden_trabajo SET id_sucursal = '$id_sucursal' WHERE id_carrito_orden_trabajo = $ID_carrito_orden_trabajo");$cadena.=' Se edito id_sucursal , ';
       } 
       if($id_cliente!='')
       {
       $query = pg_query("UPDATE carrito_orden_trabajo SET id_cliente = '$id_cliente' WHERE id_carrito_orden_trabajo = $ID_carrito_orden_trabajo");$cadena.=' Se edito id_cliente , ';
       } 
       if($cliente!='')
       {
       $query = pg_query("UPDATE carrito_orden_trabajo SET cliente = '$cliente' WHERE id_carrito_orden_trabajo = $ID_carrito_orden_trabajo");$cadena.=' Se edito cliente , ';
       } 
       if($ci_nit!='')
       {
       $query = pg_query("UPDATE carrito_orden_trabajo SET ci_nit = '$ci_nit' WHERE id_carrito_orden_trabajo = $ID_carrito_orden_trabajo");$cadena.=' Se edito ci_nit , ';
       } 
       if($id_prenda!='')
       {
       $query = pg_query("UPDATE carrito_orden_trabajo SET id_prenda = '$id_prenda' WHERE id_carrito_orden_trabajo = $ID_carrito_orden_trabajo");$cadena.=' Se edito id_prenda , ';
       } 
       if($id_tipo_lavado!='')
       {
       $query = pg_query("UPDATE carrito_orden_trabajo SET id_tipo_lavado = '$id_tipo_lavado' WHERE id_carrito_orden_trabajo = $ID_carrito_orden_trabajo");$cadena.=' Se edito id_tipo_lavado , ';
       } 
       if($cantidad_prenda!='')
       {
       $query = pg_query("UPDATE carrito_orden_trabajo SET cantidad_prenda = '$cantidad_prenda' WHERE id_carrito_orden_trabajo = $ID_carrito_orden_trabajo");$cadena.=' Se edito cantidad_prenda , ';
       } 
       if($cantidad_peso!='')
       {
       $query = pg_query("UPDATE carrito_orden_trabajo SET cantidad_peso = '$cantidad_peso' WHERE id_carrito_orden_trabajo = $ID_carrito_orden_trabajo");$cadena.=' Se edito cantidad_peso , ';
       } 
       if($medida_prenda!='')
       {
       $query = pg_query("UPDATE carrito_orden_trabajo SET medida_prenda = '$medida_prenda' WHERE id_carrito_orden_trabajo = $ID_carrito_orden_trabajo");$cadena.=' Se edito medida_prenda , ';
       } 
       if($costo_prenda!='')
       {
       $query = pg_query("UPDATE carrito_orden_trabajo SET costo_prenda = '$costo_prenda' WHERE id_carrito_orden_trabajo = $ID_carrito_orden_trabajo");$cadena.=' Se edito costo_prenda , ';
       } 
       if($costo_kilo!='')
       {
       $query = pg_query("UPDATE carrito_orden_trabajo SET costo_kilo = '$costo_kilo' WHERE id_carrito_orden_trabajo = $ID_carrito_orden_trabajo");$cadena.=' Se edito costo_kilo , ';
       } 
       if($costo_metro!='')
       {
       $query = pg_query("UPDATE carrito_orden_trabajo SET costo_metro = '$costo_metro' WHERE id_carrito_orden_trabajo = $ID_carrito_orden_trabajo");$cadena.=' Se edito costo_metro , ';
       } 
       if($total_servicio!='')
       {
       $query = pg_query("UPDATE carrito_orden_trabajo SET total_servicio = '$total_servicio' WHERE id_carrito_orden_trabajo = $ID_carrito_orden_trabajo");$cadena.=' Se edito total_servicio , ';
       } 
       if($pago_servicio!='')
       {
       $query = pg_query("UPDATE carrito_orden_trabajo SET pago_servicio = '$pago_servicio' WHERE id_carrito_orden_trabajo = $ID_carrito_orden_trabajo");$cadena.=' Se edito pago_servicio , ';
       } 
       if($saldo_servicio!='')
       {
       $query = pg_query("UPDATE carrito_orden_trabajo SET saldo_servicio = '$saldo_servicio' WHERE id_carrito_orden_trabajo = $ID_carrito_orden_trabajo");$cadena.=' Se edito saldo_servicio , ';
       } 
       if($moneda!='')
       {
       $query = pg_query("UPDATE carrito_orden_trabajo SET moneda = '$moneda' WHERE id_carrito_orden_trabajo = $ID_carrito_orden_trabajo");$cadena.=' Se edito moneda , ';
       } 
       if($descuento!='')
       {
       $query = pg_query("UPDATE carrito_orden_trabajo SET descuento = '$descuento' WHERE id_carrito_orden_trabajo = $ID_carrito_orden_trabajo");$cadena.=' Se edito descuento , ';
       } 
       if($tipo_cliente!='')
       {
       $query = pg_query("UPDATE carrito_orden_trabajo SET tipo_cliente = '$tipo_cliente' WHERE id_carrito_orden_trabajo = $ID_carrito_orden_trabajo");$cadena.=' Se edito tipo_cliente , ';
       } 
       if($estado!='')
       {
       $query = pg_query("UPDATE carrito_orden_trabajo SET estado = '$estado' WHERE id_carrito_orden_trabajo = $ID_carrito_orden_trabajo");$cadena.=' Se edito estado , ';
       } 
       if($codigo_ot!='')
       {
       $query = pg_query("UPDATE carrito_orden_trabajo SET codigo_ot = '$codigo_ot' WHERE id_carrito_orden_trabajo = $ID_carrito_orden_trabajo");$cadena.=' Se edito codigo_ot , ';
       }  
   if($cadena!='')
   {
      ?>
      <div class='alert alert-success' role='alert'>
      <strong> CAMBIOS!! </strong> actualizados de <?php echo $cadena; ?>
      </div><?php

   }
   else
   { 
     ?>
     <div class='alert alert-danger' role='alert'>
     <strong>ALERTA! </strong> Debes ingresar datos validos.
     </div><?php
   }

  ?>
