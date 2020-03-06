
  <?php 

  require('../conector/conexion.php');
 
    $area_acomodado = trim($_POST['area_acomodado']);
    
    $ID_area_acomodado = $_POST['ID_area_acomodado'];
  
  $cadena= '';
       if($area_acomodado!='')
       {
       $query = pg_query("UPDATE area_acomodado SET area_acomodado = '$area_acomodado' WHERE id_area_acomodado = $ID_area_acomodado");$cadena.=' Se edito area_acomodado , ';
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
