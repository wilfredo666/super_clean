
  <?php 

  require('../conector/conexion.php');
 
    $id_cliente = trim($_POST['id_cliente']);
    
    $cliente = trim($_POST['cliente']);
    
    $id_usuario = trim($_POST['id_usuario']);
    
    $id_sucursal = trim($_POST['id_sucursal']);
    
    $id_ot = trim($_POST['id_ot']);
    
    $codigo_ot = trim($_POST['codigo_ot']);
    
    $codigo_barras = trim($_POST['codigo_barras']);
    
    $estado_tikeo = trim($_POST['estado_tikeo']);
    
    $id_prenda = trim($_POST['id_prenda']);
    
    $ID_carrito_tikeo = $_POST['ID_carrito_tikeo'];
  
  $cadena= '';
       if($id_cliente!='')
       {
       $query = pg_query("UPDATE carrito_tikeo SET id_cliente = '$id_cliente' WHERE id_carrito_tikeo = $ID_carrito_tikeo");$cadena.=' Se edito id_cliente , ';
       } 
       if($cliente!='')
       {
       $query = pg_query("UPDATE carrito_tikeo SET cliente = '$cliente' WHERE id_carrito_tikeo = $ID_carrito_tikeo");$cadena.=' Se edito cliente , ';
       } 
       if($id_usuario!='')
       {
       $query = pg_query("UPDATE carrito_tikeo SET id_usuario = '$id_usuario' WHERE id_carrito_tikeo = $ID_carrito_tikeo");$cadena.=' Se edito id_usuario , ';
       } 
       if($id_sucursal!='')
       {
       $query = pg_query("UPDATE carrito_tikeo SET id_sucursal = '$id_sucursal' WHERE id_carrito_tikeo = $ID_carrito_tikeo");$cadena.=' Se edito id_sucursal , ';
       } 
       if($id_ot!='')
       {
       $query = pg_query("UPDATE carrito_tikeo SET id_ot = '$id_ot' WHERE id_carrito_tikeo = $ID_carrito_tikeo");$cadena.=' Se edito id_ot , ';
       } 
       if($codigo_ot!='')
       {
       $query = pg_query("UPDATE carrito_tikeo SET codigo_ot = '$codigo_ot' WHERE id_carrito_tikeo = $ID_carrito_tikeo");$cadena.=' Se edito codigo_ot , ';
       } 
       if($codigo_barras!='')
       {
       $query = pg_query("UPDATE carrito_tikeo SET codigo_barras = '$codigo_barras' WHERE id_carrito_tikeo = $ID_carrito_tikeo");$cadena.=' Se edito codigo_barras , ';
       } 
       if($estado_tikeo!='')
       {
       $query = pg_query("UPDATE carrito_tikeo SET estado_tikeo = '$estado_tikeo' WHERE id_carrito_tikeo = $ID_carrito_tikeo");$cadena.=' Se edito estado_tikeo , ';
       } 
       if($id_prenda!='')
       {
       $query = pg_query("UPDATE carrito_tikeo SET id_prenda = '$id_prenda' WHERE id_carrito_tikeo = $ID_carrito_tikeo");$cadena.=' Se edito id_prenda , ';
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
