
 <?php
 
  $fecha_cierre= trim($_POST['fecha_cierre']); 
  $id_usuario= trim($_POST['id_usuario']); 
  $id_sucursal= trim($_POST['id_sucursal']); 
  $total_generado= trim($_POST['total_generado']); 
  $hora= trim($_POST['hora']);  
   
  require('../conector/conexion.php');

  $sql_ver = pg_query("SELECT COUNT(*) AS count FROM cierre_caja WHERE fecha_cierre ='$fecha_cierre'");
  $row_ver = pg_fetch_array($sql_ver);
  $cont = $row_ver['count'];

  if ($cont ==0 ) {
    $sql= pg_query("INSERT INTO cierre_caja (fecha_cierre ,id_usuario ,id_sucursal ,total_generado ,hora ) VALUES ( '$fecha_cierre' , '$id_usuario' , '$id_sucursal' , '$total_generado' , '$hora' )"); 

    if($sql == TRUE )
    {
      ?>
         <div class='alert alert-info' role='alert'>
          <strong> REGISTRO CORRECTO!! </strong> Se registraron los datos correctamente
         </div>
      <?php
    }
    else
    {
      echo '<center> <h3> <label> No se Registro!! Volver a intentar </label> </h3></center>';
      ?>
         <div class='alert alert-danger' role='alert'>
          <strong> ERROR!! </strong> No se registraron los datos correctamente
         </div>
      <?php
    }
  }

  else
  {
    ?>
         <div class='alert alert-warning' role='alert'>
          <strong> YA SE CERRO CAJA EL DIA DE HOY!! </strong> Volver a intentar mañana
         </div>
    <?php

  }


 

?>
