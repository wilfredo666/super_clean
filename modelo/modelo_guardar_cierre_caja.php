
  <?php 

  require('../conector/conexion.php');
 
    $total_generado = trim($_POST['total_generado']);
    $ID_cierre_caja = $_POST['ID_cierre_caja'];
  
    $cadena= '';
       
    if($total_generado!='')
    {
      $query = pg_query("UPDATE cierre_caja SET total_generado = '$total_generado' WHERE id_cierre_caja = $ID_cierre_caja");
      $cadena.=' Se edito total generado , ';
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
