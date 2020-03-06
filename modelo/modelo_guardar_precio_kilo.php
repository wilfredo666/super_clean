
  <?php 

  require('../conector/conexion.php');
 
    $precio_kilo = trim($_POST['precio_kilo']);
    
    $fecha = trim($_POST['fecha']);
    
    $hora = trim($_POST['hora']);
    
    $ID_precio_kilo = $_POST['ID_precio_kilo'];
  
  $cadena= '';
       if($precio_kilo!='')
       {
       $query = pg_query("UPDATE precio_kilo SET precio_kilo = '$precio_kilo' WHERE id_precio_kilo = $ID_precio_kilo");$cadena.=' Se edito precio_kilo , ';
       } 
       if($fecha!='')
       {
       $query = pg_query("UPDATE precio_kilo SET fecha = '$fecha' WHERE id_precio_kilo = $ID_precio_kilo");$cadena.=' Se edito fecha , ';
       } 
       if($hora!='')
       {
       $query = pg_query("UPDATE precio_kilo SET hora = '$hora' WHERE id_precio_kilo = $ID_precio_kilo");$cadena.=' Se edito hora , ';
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
