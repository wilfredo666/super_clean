<?php
  require('../conector/conexion.php');  
  $codigo = trim($_POST['ID_lavado_especial']);

  $query = pg_query("DELETE FROM lavado_especial WHERE codigo ='$codigo'");
  $query = pg_query("DELETE FROM cobro_lavado_especial WHERE codigo_lav ='$codigo'");
  ?>
   <div class='alert alert-info' role='alert'>
   <strong>CORRECTO!! </strong> Se elimino el dato correctamente
   </div><?php
  
  ?>
  
