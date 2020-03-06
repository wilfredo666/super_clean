
  <?php 

  require('../conector/conexion.php');
 
    $id_cliente = trim($_POST['id_cliente']);
    
    $cliente = trim($_POST['cliente']);
    
    $id_usuario = trim($_POST['id_usuario']);
    
    $id_sucursal = trim($_POST['id_sucursal']);
    
    $id_ot = trim($_POST['id_ot']);
    
    $codigo_ot = trim($_POST['codigo_ot']);
    
    $id_lugar = trim($_POST['id_lugar']);
    
    $lugar = trim($_POST['lugar']);
    
    $estado_acomodado = trim($_POST['estado_acomodado']);
    
    $codigo_tikeo = trim($_POST['codigo_tikeo']);
    
    $tipo_lavado = trim($_POST['tipo_lavado']);
    
    $id_lavado = trim($_POST['id_lavado']);
    
    $id_prenda = trim($_POST['id_prenda']);
    
    $ID_carrito_acomodado = $_POST['ID_carrito_acomodado'];
  
  $cadena= '';
       if($id_cliente!='')
       {
       $query = pg_query("UPDATE carrito_acomodado SET id_cliente = '$id_cliente' WHERE id_carrito_acomodado = $ID_carrito_acomodado");$cadena.=' Se edito id_cliente , ';
       } 
       if($cliente!='')
       {
       $query = pg_query("UPDATE carrito_acomodado SET cliente = '$cliente' WHERE id_carrito_acomodado = $ID_carrito_acomodado");$cadena.=' Se edito cliente , ';
       } 
       if($id_usuario!='')
       {
       $query = pg_query("UPDATE carrito_acomodado SET id_usuario = '$id_usuario' WHERE id_carrito_acomodado = $ID_carrito_acomodado");$cadena.=' Se edito id_usuario , ';
       } 
       if($id_sucursal!='')
       {
       $query = pg_query("UPDATE carrito_acomodado SET id_sucursal = '$id_sucursal' WHERE id_carrito_acomodado = $ID_carrito_acomodado");$cadena.=' Se edito id_sucursal , ';
       } 
       if($id_ot!='')
       {
       $query = pg_query("UPDATE carrito_acomodado SET id_ot = '$id_ot' WHERE id_carrito_acomodado = $ID_carrito_acomodado");$cadena.=' Se edito id_ot , ';
       } 
       if($codigo_ot!='')
       {
       $query = pg_query("UPDATE carrito_acomodado SET codigo_ot = '$codigo_ot' WHERE id_carrito_acomodado = $ID_carrito_acomodado");$cadena.=' Se edito codigo_ot , ';
       } 
       if($id_lugar!='')
       {
       $query = pg_query("UPDATE carrito_acomodado SET id_lugar = '$id_lugar' WHERE id_carrito_acomodado = $ID_carrito_acomodado");$cadena.=' Se edito id_lugar , ';
       } 
       if($lugar!='')
       {
       $query = pg_query("UPDATE carrito_acomodado SET lugar = '$lugar' WHERE id_carrito_acomodado = $ID_carrito_acomodado");$cadena.=' Se edito lugar , ';
       } 
       if($estado_acomodado!='')
       {
       $query = pg_query("UPDATE carrito_acomodado SET estado_acomodado = '$estado_acomodado' WHERE id_carrito_acomodado = $ID_carrito_acomodado");$cadena.=' Se edito estado_acomodado , ';
       } 
       if($codigo_tikeo!='')
       {
       $query = pg_query("UPDATE carrito_acomodado SET codigo_tikeo = '$codigo_tikeo' WHERE id_carrito_acomodado = $ID_carrito_acomodado");$cadena.=' Se edito codigo_tikeo , ';
       } 
       if($tipo_lavado!='')
       {
       $query = pg_query("UPDATE carrito_acomodado SET tipo_lavado = '$tipo_lavado' WHERE id_carrito_acomodado = $ID_carrito_acomodado");$cadena.=' Se edito tipo_lavado , ';
       } 
       if($id_lavado!='')
       {
       $query = pg_query("UPDATE carrito_acomodado SET id_lavado = '$id_lavado' WHERE id_carrito_acomodado = $ID_carrito_acomodado");$cadena.=' Se edito id_lavado , ';
       } 
       if($id_prenda!='')
       {
       $query = pg_query("UPDATE carrito_acomodado SET id_prenda = '$id_prenda' WHERE id_carrito_acomodado = $ID_carrito_acomodado");$cadena.=' Se edito id_prenda , ';
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
