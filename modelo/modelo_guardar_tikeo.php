  <?php 
  require('../conector/conexion.php');
 
  $codigo_barras = trim($_POST['codigo_barras']); 
  $id_tikeo = trim($_POST['id_tikeo']);

  $sql_val = pg_query("SELECT COUNT(*) AS count FROM tikeo WHERE codigo_barras='$codigo_barras'");
  $row_val = pg_fetch_array($sql_val);
  $cont = $row_val['count'];
  if($cont==0){


  $cadena = "";
   if($codigo_barras!='')
   {
     $query = pg_query("UPDATE tikeo SET codigo_barras = '$codigo_barras' WHERE id_tikeo = $id_tikeo"); $cadena.=' Se edito codigo_barras , ';
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

     }
  else{

     ?>
     <div class='alert alert-danger' role='alert'>
     <strong> ERROR CODIGO REPETIDO! </strong> Debes ingresar codigos validos.
     </div><?php

  }

  ?>
