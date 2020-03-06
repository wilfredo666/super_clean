
  <?php 

  require('../conector/conexion.php');
 
    $codigo_lav = trim($_POST['codigo_lav']);
    
    $total = trim($_POST['total']);
    
    $pago = trim($_POST['pago']);
    
    $saldo = trim($_POST['saldo']);
    
    $id_usuario = trim($_POST['id_usuario']);
    
    $fecha = trim($_POST['fecha']);
    
    $hora = trim($_POST['hora']);
    
    $ID_cobro_lavado_especial = $_POST['ID_cobro_lavado_especial'];
  
  $cadena= '';
       if($codigo_lav!='')
       {
       $query = pg_query("UPDATE cobro_lavado_especial SET codigo_lav = '$codigo_lav' WHERE id_cobro_lavado_especial = $ID_cobro_lavado_especial");$cadena.=' Se edito codigo_lav , ';
       } 
       if($total!='')
       {
       $query = pg_query("UPDATE cobro_lavado_especial SET total = '$total' WHERE id_cobro_lavado_especial = $ID_cobro_lavado_especial");$cadena.=' Se edito total , ';
       } 
       if($pago!='')
       {
       $query = pg_query("UPDATE cobro_lavado_especial SET pago = '$pago' WHERE id_cobro_lavado_especial = $ID_cobro_lavado_especial");$cadena.=' Se edito pago , ';
       } 
       if($saldo!='')
       {
       $query = pg_query("UPDATE cobro_lavado_especial SET saldo = '$saldo' WHERE id_cobro_lavado_especial = $ID_cobro_lavado_especial");$cadena.=' Se edito saldo , ';
       } 
       if($id_usuario!='')
       {
       $query = pg_query("UPDATE cobro_lavado_especial SET id_usuario = '$id_usuario' WHERE id_cobro_lavado_especial = $ID_cobro_lavado_especial");$cadena.=' Se edito id_usuario , ';
       } 
       if($fecha!='')
       {
       $query = pg_query("UPDATE cobro_lavado_especial SET fecha = '$fecha' WHERE id_cobro_lavado_especial = $ID_cobro_lavado_especial");$cadena.=' Se edito fecha , ';
       } 
       if($hora!='')
       {
       $query = pg_query("UPDATE cobro_lavado_especial SET hora = '$hora' WHERE id_cobro_lavado_especial = $ID_cobro_lavado_especial");$cadena.=' Se edito hora , ';
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
