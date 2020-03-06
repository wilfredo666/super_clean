
  <?php 

  require('../conector/conexion.php');
 
    $codigo_ot = trim($_POST['codigo_ot']);
    $id_chofer = trim($_POST['id_chofer']);
    $precio_envio = trim($_POST['precio_envio']);
    $fecha = trim($_POST['fecha']);
    $hora = trim($_POST['hora']);
    $ID_orden_domicilio = $_POST['ID_orden_domicilio'];
  
    $cadena= '';
       
       if($codigo_ot!='')
       {
       $query = pg_query("UPDATE orden_domicilio SET codigo_ot = '$codigo_ot' WHERE id_orden_domicilio = $ID_orden_domicilio");$cadena.=' Se edito codigo_ot , ';
       } 
       if($id_chofer!='')
       {
       $query = pg_query("UPDATE orden_domicilio SET id_chofer = '$id_chofer' WHERE id_orden_domicilio = $ID_orden_domicilio");$cadena.=' Se edito id_chofer , ';
       } 
       if($precio_envio!='')
       {
       $query = pg_query("UPDATE orden_domicilio SET precio_envio = '$precio_envio' WHERE id_orden_domicilio = $ID_orden_domicilio");$cadena.=' Se edito precio_envio , ';
       } 
       if($fecha!='')
       {
       $query = pg_query("UPDATE orden_domicilio SET fecha = '$fecha' WHERE id_orden_domicilio = $ID_orden_domicilio");$cadena.=' Se edito fecha , ';
       } 
       if($hora!='')
       {
       $query = pg_query("UPDATE orden_domicilio SET hora = '$hora' WHERE id_orden_domicilio = $ID_orden_domicilio");$cadena.=' Se edito hora , ';
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
