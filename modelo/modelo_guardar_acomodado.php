
  <?php 

  require('../conector/conexion.php');
 
    $ID_acomodado = trim($_POST['ID_acomodado']);  
    $select_lugar = trim($_POST['select_lugar']);

    $sql_lugar = pg_query("SELECT * FROM area_acomodado WHERE id_area_acomodado = $select_lugar");
    $row_lugar = pg_fetch_array($sql_lugar);
    $lugar = $row_lugar['area_acomodado'];
    
 
  
  $cadena= '';
       
       if($select_lugar!='')
       {
         $query = pg_query("UPDATE acomodado SET id_lugar = '$select_lugar', lugar = '$lugar' WHERE id_acomodado = $ID_acomodado"); 
         $cadena.=' Se edito el Lugar ';
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
