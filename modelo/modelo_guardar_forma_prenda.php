
  <?php 

  require('../conector/conexion.php');
 
    $forma_prenda = trim($_POST['forma_prenda']);
    
    $ID_forma_prenda = $_POST['ID_forma_prenda'];
  
  $cadena= '';
       if($forma_prenda!='')
       {
       $query = pg_query("UPDATE forma SET forma = '$forma_prenda' WHERE id_forma = $ID_forma_prenda");$cadena.=' Se edito forma de prenda , ';
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
