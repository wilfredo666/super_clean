
  <?php 

  require('../conector/conexion.php');
 
    $tipo_prenda = trim($_POST['tipo_prenda']);
    
    $ID_tipo_prenda = $_POST['ID_tipo_prenda'];
  
  $cadena= '';
       if($tipo_prenda!='')
       {
       $query = pg_query("UPDATE tipo_prenda SET tipo_prenda = '$tipo_prenda' WHERE id_tipo_prenda = $ID_tipo_prenda");$cadena.=' Se edito tipo_prenda , ';
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
