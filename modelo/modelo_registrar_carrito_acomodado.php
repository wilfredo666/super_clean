 <?php

  require('../conector/conexion.php');
 

  $id_sucursal= trim($_POST['id_sucursal']); 
  $id_usuario= trim($_POST['id_usuario']);

  $fecha = date("Y-m-d");
  $hora = date("H:i:s");
  $codigo_ac="AC".date("YmdHis");

  $sql_car = pg_query("SELECT * FROM carrito_acomodado WHERE id_usuario='$id_usuario' AND id_sucursal='$id_sucursal'"); 

  while ($row_car = pg_fetch_array($sql_car)) {

  $id_cliente= trim($row_car['id_cliente']); 
  $cliente= trim($row_car['cliente']); 
  $id_usuario= trim($row_car['id_usuario']); 
  $id_sucursal= trim($row_car['id_sucursal']); 
  $id_ot= trim($row_car['id_ot']); 
  $codigo_ot= trim($row_car['codigo_ot']); 
  $id_lugar= trim($row_car['id_lugar']); 
  $lugar= trim($row_car['lugar']); 
  $estado_acomodado= trim($row_car['estado_acomodado']); 
  $codigo_tikeo= trim($row_car['codigo_tikeo']); 
  $id_prenda= trim($row_car['id_prenda']);

  /* Sacamos el id_lavado para la edicion del estado final */
  $sql_lav = pg_query("SELECT * FROM lavado WHERE codigo_tikeo = '$codigo_tikeo' AND estado_lavado='ACTIVO' ORDER BY id_lavado DESC LIMIT 1");
  $row_lav = pg_fetch_array($sql_lav);
  $id_lavado = $row_lav['id_lavado'];

   
  /* Insertamos los datos del carrito al area de acomodado */
  $sql= pg_query("INSERT INTO acomodado (id_cliente ,cliente ,id_usuario ,id_sucursal ,id_ot ,codigo_ot ,id_lugar ,lugar ,estado_acomodado ,codigo_tikeo ,id_prenda,codigo_ac, fecha, hora ) VALUES ( '$id_cliente', '$cliente', '$id_usuario', '$id_sucursal', '$id_ot', '$codigo_ot', '$id_lugar', '$lugar', '$estado_acomodado', '$codigo_tikeo', '$id_prenda', '$codigo_ac', '$fecha', '$hora' )"); 

  $sql_actualizar = pg_query("UPDATE orden_trabajo SET estado='ACOMODADO' WHERE codigo_ot ='$codigo_ot'");

  $sql_upd = pg_query("UPDATE lavado SET estado_lavado='INACTIVO' WHERE codigo_tikeo='$codigo_tikeo'");

  }

  //Limpiamos los datos del carritos para tener el carrito limpio y listo para otro acomodado

   $sql_delete_tik = pg_query("DELETE FROM carrito_acomodado WHERE id_usuario='$id_usuario' AND id_sucursal='$id_sucursal'");
  
  ?>

<div class='alert alert-info' role='alert'>
   <strong> REGISTRO CORRECTO DE PRENDAS ACOMODADAS!! </strong> Se registraron los datos correctamente
 </div>