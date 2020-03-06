
  <?php 

  require('../conector/conexion.php');
 
    $cargo = trim($_POST['cargo']);
    
    $ID_cargo = $_POST['ID_cargo'];
  
  $cadena= '';
       if($cargo!='')
       {
       $query = pg_query("UPDATE cargo SET cargo = '$cargo' WHERE id_cargo = $ID_cargo");$cadena.=' Se edito cargo , ';
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
