
  <?php 
    
   require('../conector/conexion.php');
 
  $tipo_lavado = trim($_POST['tipo_lavado']);
  $id_lavado = trim($_POST['id_lavado']);
  
  $cadena= '';

  /*Condicional de registro*/
  $sql_ver = pg_query("SELECT * FROM lavado WHERE id_lavado = '$id_lavado'");
  $row_ver = pg_fetch_array($sql_ver);
  $id_ot = trim($row_ver['id_ot']);
  $codigo_ot = trim($row_ver['codigo_ot']);

  $sql_acom = pg_query("SELECT COUNT(*) AS count FROM acomodado WHERE codigo_ot='$codigo_ot' AND id_ot='$id_ot'");
  $row_acom = pg_fetch_array($sql_acom);

  $cont = $row_acom['count'];

  if ($cont==0) {
    
   if($tipo_lavado!='')
   {
      $query = pg_query("UPDATE lavado SET tipo_lavado = '$tipo_lavado' WHERE id_lavado = $id_lavado");
      $cadena.=' Se edito tipo de lavado , ';
   } 
 
   if($cadena!='')
   {
      ?>
      <div class='alert alert-info' role='alert'>
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
     <div class='alert alert-success' role='alert'>
     <strong> ALERTA! </strong> la prenda ya se encuentra acomodada.
     </div><?php
  }

  ?>
