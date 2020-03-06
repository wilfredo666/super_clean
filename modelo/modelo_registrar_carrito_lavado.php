
 <?php

  $id_usuario= trim($_POST['id_usuario']); 
  $id_sucursal= trim($_POST['id_sucursal']);
  

  require('../conector/conexion.php');

  $sql_car_lav = pg_query("SELECT * FROM carrito_lavado WHERE id_usuario='$id_usuario' AND id_sucursal='$id_sucursal'");

  while($row_car_lav = pg_fetch_array($sql_car_lav)) {
    
  $id_usuario= trim($row_car_lav['id_usuario']); 
  $id_cliente= trim($row_car_lav['id_cliente']); 
  $cliente= trim($row_car_lav['cliente']); 
  $id_sucursal= trim($row_car_lav['id_sucursal']); 
  $id_ot= trim($row_car_lav['id_ot']); 
  $codigo_ot= trim($row_car_lav['codigo_ot']); 
  $tipo_lavado = trim($row_car_lav['tipo_lavado']); 
  $estado_lavado= trim($row_car_lav['estado_lavado']); 
  $codigo_tikeo= trim($row_car_lav['codigo_tikeo']); 
  $id_prenda= trim($row_car_lav['id_prenda']);
  $codigo_lavado = "L".date("dmYHis");
  $fecha = date("Y-m-d");
  $hora = date("H:i:s");
  
  $sql= pg_query("INSERT INTO lavado (id_usuario ,id_cliente ,cliente ,id_sucursal ,id_ot ,codigo_ot ,tipo_lavado ,estado_lavado ,codigo_tikeo ,id_prenda, codigo_lavado, fecha, hora) VALUES ( '$id_usuario' , '$id_cliente' , '$cliente' , '$id_sucursal' , '$id_ot' , '$codigo_ot' , '$tipo_lavado' , '$estado_lavado' , '$codigo_tikeo' , '$id_prenda','$codigo_lavado','$fecha','$hora')"); 

  $sql_actualizar = pg_query("UPDATE orden_trabajo SET estado='LAVADO' WHERE id_orden_trabajo ='$id_ot'");

   $sql_actualizar_tik = pg_query("UPDATE tikeo SET estado_tikeo='INACTIVO' WHERE id_ot ='$id_ot'");


    if($sql == TRUE )
    {
      //echo '<center> <h3> <label> Registro Correcto </label> </h3></center>';
    }
    else
    {
      echo '<center> <h3> <label> No se Registro!! Volver a intentar </label> </h3></center>';
    }
 }

   $sql_delete_tik = pg_query("DELETE FROM carrito_lavado WHERE id_usuario='$id_usuario' AND id_sucursal='$id_sucursal'");

?>

<div class='alert alert-info' role='alert'>
   <strong> REGISTRO CORRECTO DE LAVADO!! </strong> Se registraron los datos correctamente
 </div>
