
  <?php 

  require('../conector/conexion.php');
 
    $cliente = trim($_POST['cliente']);
    
    $id_cliente = trim($_POST['id_cliente']);
    
    $prenda = trim($_POST['prenda']);
    
    $id_prenda = trim($_POST['id_prenda']);
    
    $medida = trim($_POST['medida']);
    
    $total = trim($_POST['total']);
    
    $pago = trim($_POST['pago']);
    
    $saldo = trim($_POST['saldo']);
    
    $id_usuario = trim($_POST['id_usuario']);
    
    $fecha = trim($_POST['fecha']);
    
    $hora = trim($_POST['hora']);
    
    $codigo = trim($_POST['codigo']);
    
    $ID_lavado_especial = $_POST['ID_lavado_especial'];
  
  $cadena= '';
       if($cliente!='')
       {
       $query = pg_query("UPDATE lavado_especial SET cliente = '$cliente' WHERE id_lavado_especial = $ID_lavado_especial");$cadena.=' Se edito cliente , ';
       } 
       if($id_cliente!='')
       {
       $query = pg_query("UPDATE lavado_especial SET id_cliente = '$id_cliente' WHERE id_lavado_especial = $ID_lavado_especial");$cadena.=' Se edito id_cliente , ';
       } 
       if($prenda!='')
       {
       $query = pg_query("UPDATE lavado_especial SET prenda = '$prenda' WHERE id_lavado_especial = $ID_lavado_especial");$cadena.=' Se edito prenda , ';
       } 
       if($id_prenda!='')
       {
       $query = pg_query("UPDATE lavado_especial SET id_prenda = '$id_prenda' WHERE id_lavado_especial = $ID_lavado_especial");$cadena.=' Se edito id_prenda , ';
       } 
       if($medida!='')
       {
       $query = pg_query("UPDATE lavado_especial SET medida = '$medida' WHERE id_lavado_especial = $ID_lavado_especial");$cadena.=' Se edito medida , ';
       } 
       if($total!='')
       {
       $query = pg_query("UPDATE lavado_especial SET total = '$total' WHERE id_lavado_especial = $ID_lavado_especial");$cadena.=' Se edito total , ';
       } 
       if($pago!='')
       {
       $query = pg_query("UPDATE lavado_especial SET pago = '$pago' WHERE id_lavado_especial = $ID_lavado_especial");$cadena.=' Se edito pago , ';
       } 
       if($saldo!='')
       {
       $query = pg_query("UPDATE lavado_especial SET saldo = '$saldo' WHERE id_lavado_especial = $ID_lavado_especial");$cadena.=' Se edito saldo , ';
       } 
       if($id_usuario!='')
       {
       $query = pg_query("UPDATE lavado_especial SET id_usuario = '$id_usuario' WHERE id_lavado_especial = $ID_lavado_especial");$cadena.=' Se edito id_usuario , ';
       } 
       if($fecha!='')
       {
       $query = pg_query("UPDATE lavado_especial SET fecha = '$fecha' WHERE id_lavado_especial = $ID_lavado_especial");$cadena.=' Se edito fecha , ';
       } 
       if($hora!='')
       {
       $query = pg_query("UPDATE lavado_especial SET hora = '$hora' WHERE id_lavado_especial = $ID_lavado_especial");$cadena.=' Se edito hora , ';
       } 
       if($codigo!='')
       {
       $query = pg_query("UPDATE lavado_especial SET codigo = '$codigo' WHERE id_lavado_especial = $ID_lavado_especial");$cadena.=' Se edito codigo , ';
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
