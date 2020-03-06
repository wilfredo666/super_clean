
  <?php 

  require('../conector/conexion.php');
 
    $moneda = trim($_POST['moneda']);
    
    $ID_moneda = $_POST['ID_moneda'];
  
  $cadena= '';
       if($moneda!='')
       {
       $query = pg_query("UPDATE moneda SET moneda = '$moneda' WHERE id_moneda = $ID_moneda");$cadena.=' Se edito moneda , ';
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
