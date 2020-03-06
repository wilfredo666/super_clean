
  <?php 

  require('../conector/conexion.php');
 
    $id_usuario = trim($_POST['id_usuario']);
    
    $id_cliente = trim($_POST['id_cliente']);
    
    $cliente = trim($_POST['cliente']);
    
    $id_sucursal = trim($_POST['id_sucursal']);
    
    $id_ot = trim($_POST['id_ot']);
    
    $codigo_ot = trim($_POST['codigo_ot']);
    
    $tipo_lavado = trim($_POST['tipo_lavado']);
    
    $estado_lavado = trim($_POST['estado_lavado']);
    
    $codigo_tikeo = trim($_POST['codigo_tikeo']);
    
    $id_prenda = trim($_POST['id_prenda']);
    
    $ID_carrito_lavado = $_POST['ID_carrito_lavado'];
  
  $cadena= '';
       if($id_usuario!='')
       {
       $query = pg_query("UPDATE carrito_lavado SET id_usuario = '$id_usuario' WHERE id_carrito_lavado = $ID_carrito_lavado");$cadena.=' Se edito id_usuario , ';
       } 
       if($id_cliente!='')
       {
       $query = pg_query("UPDATE carrito_lavado SET id_cliente = '$id_cliente' WHERE id_carrito_lavado = $ID_carrito_lavado");$cadena.=' Se edito id_cliente , ';
       } 
       if($cliente!='')
       {
       $query = pg_query("UPDATE carrito_lavado SET cliente = '$cliente' WHERE id_carrito_lavado = $ID_carrito_lavado");$cadena.=' Se edito cliente , ';
       } 
       if($id_sucursal!='')
       {
       $query = pg_query("UPDATE carrito_lavado SET id_sucursal = '$id_sucursal' WHERE id_carrito_lavado = $ID_carrito_lavado");$cadena.=' Se edito id_sucursal , ';
       } 
       if($id_ot!='')
       {
       $query = pg_query("UPDATE carrito_lavado SET id_ot = '$id_ot' WHERE id_carrito_lavado = $ID_carrito_lavado");$cadena.=' Se edito id_ot , ';
       } 
       if($codigo_ot!='')
       {
       $query = pg_query("UPDATE carrito_lavado SET codigo_ot = '$codigo_ot' WHERE id_carrito_lavado = $ID_carrito_lavado");$cadena.=' Se edito codigo_ot , ';
       } 
       if($tipo_lavado!='')
       {
       $query = pg_query("UPDATE carrito_lavado SET tipo_lavado = '$tipo_lavado' WHERE id_carrito_lavado = $ID_carrito_lavado");$cadena.=' Se edito tipo_lavado , ';
       } 
       if($estado_lavado!='')
       {
       $query = pg_query("UPDATE carrito_lavado SET estado_lavado = '$estado_lavado' WHERE id_carrito_lavado = $ID_carrito_lavado");$cadena.=' Se edito estado_lavado , ';
       } 
       if($codigo_tikeo!='')
       {
       $query = pg_query("UPDATE carrito_lavado SET codigo_tikeo = '$codigo_tikeo' WHERE id_carrito_lavado = $ID_carrito_lavado");$cadena.=' Se edito codigo_tikeo , ';
       } 
       if($id_prenda!='')
       {
       $query = pg_query("UPDATE carrito_lavado SET id_prenda = '$id_prenda' WHERE id_carrito_lavado = $ID_carrito_lavado");$cadena.=' Se edito id_prenda , ';
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
