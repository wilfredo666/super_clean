
  <?php 

  require('../conector/conexion.php');
 
    $codigo_ot = trim($_POST['codigo_ot']);
    $estado = trim($_POST['estado']);

    $total = trim($_POST['total']);
    $pago = trim($_POST['pago']);
    $saldo = trim($_POST['saldo']);
    
    $fecha = trim($_POST['fecha']);
    $hora = trim($_POST['hora']);
    $ID_entrega = $_POST['ID_entrega'];
  
    $cadena= '';

       if($total!='')
       {
         $query = pg_query("UPDATE entrega SET total = '$total' WHERE id_entrega = $ID_entrega");
         $cadena.=' Se edito total , ';
       } 

       if($pago!='')
       {
         $query = pg_query("UPDATE entrega SET pago = '$pago' WHERE id_entrega = $ID_entrega");
         $cadena.=' Se edito pago , ';
       }

       if($saldo!='')
       {
         $query = pg_query("UPDATE entrega SET saldo = '$saldo' WHERE id_entrega = $ID_entrega");
         $cadena.=' Se edito saldo , ';
       }

       if($codigo_ot!='')
       {
         $query = pg_query("UPDATE entrega SET codigo_ot = '$codigo_ot' WHERE id_entrega = $ID_entrega");
         $cadena.=' Se edito codigo_ot , ';
       }

       if($estado!='')
       {
         $query = pg_query("UPDATE entrega SET estado = '$estado' WHERE id_entrega = $ID_entrega");
         $cadena.=' Se edito estado , ';
       } 
       if($fecha!='')
       {
         $query = pg_query("UPDATE entrega SET fecha = '$fecha' WHERE id_entrega = $ID_entrega");
         $cadena.=' Se edito fecha , ';
       } 
       if($hora!='')
       {
         $query = pg_query("UPDATE entrega SET hora = '$hora' WHERE id_entrega = $ID_entrega");
         $cadena.=' Se edito hora , ';
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
