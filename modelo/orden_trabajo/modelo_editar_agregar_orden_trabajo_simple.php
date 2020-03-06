<?php
 require "../conector/conexion.php";


echo $tipo = trim($_POST['tipo']);

if ($tipo == 'SIMPLE') {
 
 $codigo_ot = trim($_POST['codigo_ot']);
 $cantidad = trim($_POST['cantidad']);
 $precio = trim($_POST['precio']);
 $suma = trim($_POST['suma']);
 $id_prenda = trim($_POST['id_prenda']);

 $sql_comp = pg_query("SELECT COUNT(*) AS count FROM lavado WHERE codigo_ot = '$codigo_ot'");
 $row_ot = pg_fetch_array($sql_comp);
 $cont = $row_ot['count'];

 if ($cont==0) {

 $sql_ot = pg_query("SELECT * FROM orden_trabajo WHERE codigo_ot = '$codigo_ot'");
 $row_ot = pg_fetch_array($sql_ot);

 $id_cliente = $row_ot['id_cliente']; 
 $cliente = $row_ot['cliente']; 
 $ci_nit = $row_ot['ci_nit'];
 $moneda = $row_ot['moneda']; 
 $descuento = $row_ot['descuento']; 
 $estado = $row_ot['estado']; 
 $tipo_cliente = $row_ot['tipo_cliente'];
 $id_usuario = $row_ot['id_usuario'];
 $id_sucursal = $row_ot['id_sucursal'];
 $fecha = date('Y-m-d');
 $hora = date('H:i:s'); 

 $total = $row_ot['total_servicio'];
 $pago = $row_ot['pago_servicio'];
 $saldo = $row_ot['saldo_servicio'];

 $total = $total + $suma;
 $saldo = $total - $pago;

 //Edicion de las sumatorias

 $sql_upd_total = pg_query("UPDATE orden_trabajo SET total_servicio='$total', pago_servicio='$pago', saldo_servicio='$saldo' WHERE codigo_ot='$codigo_ot'");

 //Insercion de la nueva prenda 

 $sql_nueva = pg_query("INSERT INTO orden_trabajo(
            id_usuario, id_sucursal, id_cliente, cliente, 
            ci_nit, id_prenda, id_tipo_lavado, cantidad_prenda, cantidad_peso, 
            medida_prenda, costo_prenda, costo_kilo, costo_metro, total_servicio, 
            pago_servicio, saldo_servicio, moneda, descuento, estado, codigo_ot, 
            fecha, hora, tipo_cliente)
    VALUES ( '$id_usuario', '$id_sucursal', '$id_cliente', '$cliente', 
            '$ci_nit', '$id_prenda', '1', '$cantidad', '0', 
            '0', '$precio', '0', '0', '$total', 
            '$pago', '$saldo', '$moneda', '$descuento', '$estado', '$codigo_ot', 
            '$fecha', '$hora', '$tipo_cliente')");

 echo "<div class='alert alert-info' role='alert'>
       <strong> REGISTRO CORRECTO!! </strong> Se agrego una nueva prenda a la orden
       </div>";
?>
  <script type="text/javascript">
  	 
  	 setTimeout(function(){
  	  $('#Modal_Edicion_Agregar_Prenda_Simple').modal("hide");
     },1500);

     setTimeout(function(){
      btn_editar_orden_trabajo();
     },2000);

  </script>
<?php

}

else{ echo "<script> alert('LA PRENDA YA SE ASIGNO A LAVADO NO SE PUEDE EDITAR'); </script>"; }

}

if ($tipo=="KILO") {
	
 $codigo_ot = trim($_POST['codigo_ot']);
 $cantidad = trim($_POST['cantidad']);
 $peso = trim($_POST['peso']);
 $precio = trim($_POST['precio']);
 $suma = trim($_POST['suma']);
 $id_prenda = trim($_POST['id_prenda']);

 $sql_comp = pg_query("SELECT COUNT(*) AS count FROM lavado WHERE codigo_ot = '$codigo_ot'");
 $row_ot = pg_fetch_array($sql_comp);
 $cont = $row_ot['count'];

 if ($cont==0) {

 $sql_ot = pg_query("SELECT * FROM orden_trabajo WHERE codigo_ot = '$codigo_ot'");
 $row_ot = pg_fetch_array($sql_ot);

 $id_cliente = $row_ot['id_cliente']; 
 $cliente = $row_ot['cliente']; 
 $ci_nit = $row_ot['ci_nit'];
 $moneda = $row_ot['moneda']; 
 $descuento = $row_ot['descuento']; 
 $estado = $row_ot['estado']; 
 $tipo_cliente = $row_ot['tipo_cliente'];
 $id_usuario = $row_ot['id_usuario'];
 $id_sucursal = $row_ot['id_sucursal'];
 $fecha = date('Y-m-d');
 $hora = date('H:i:s'); 

 $total = $row_ot['total_servicio'];
 $pago = $row_ot['pago_servicio'];
 $saldo = $row_ot['saldo_servicio'];

 $total = $total + $suma;
 $saldo = $total - $pago;

 //Edicion de las sumatorias

 $sql_upd_total = pg_query("UPDATE orden_trabajo SET total_servicio='$total', pago_servicio='$pago', saldo_servicio='$saldo' WHERE codigo_ot='$codigo_ot'");

 //Insercion de la nueva prenda 

 $sql_nueva = pg_query("INSERT INTO orden_trabajo(
            id_usuario, id_sucursal, id_cliente, cliente, 
            ci_nit, id_prenda, id_tipo_lavado, cantidad_prenda, cantidad_peso, 
            medida_prenda, costo_prenda, costo_kilo, costo_metro, total_servicio, 
            pago_servicio, saldo_servicio, moneda, descuento, estado, codigo_ot, 
            fecha, hora, tipo_cliente)
    VALUES ( '$id_usuario', '$id_sucursal', '$id_cliente', '$cliente', 
            '$ci_nit', '$id_prenda', '3', '$cantidad', '$peso', 
            '0', '0', '$precio', '0', '$total', 
            '$pago', '$saldo', '$moneda', '$descuento', '$estado', '$codigo_ot', 
            '$fecha', '$hora', '$tipo_cliente')");

 echo "<div class='alert alert-info' role='alert'>
       <strong> REGISTRO CORRECTO!! </strong> Se agrego una nueva prenda a la orden
       </div>";
?>
  <script type="text/javascript">
  	 
  	 setTimeout(function(){
  	  $('#Modal_Edicion_Agregar_Prenda_Kilo').modal("hide");
     },1500);

     setTimeout(function(){
      btn_editar_orden_trabajo();
     },2000);

  </script>
<?php

}

else{ echo "<script> alert('LA PRENDA YA SE ASIGNO A LAVADO NO SE PUEDE EDITAR'); </script>"; }


}


if ($tipo=="X_METRO") {
	
 $codigo_ot = trim($_POST['codigo_ot']);
 $cantidad = trim($_POST['cantidad']);
 $medida = trim($_POST['medida']);
 $precio = trim($_POST['precio']);
 $suma = trim($_POST['suma']);
 $id_prenda = trim($_POST['id_prenda']);

 $sql_comp = pg_query("SELECT COUNT(*) AS count FROM lavado WHERE codigo_ot = '$codigo_ot'");
 $row_ot = pg_fetch_array($sql_comp);
 $cont = $row_ot['count'];

 if ($cont==0) {

 $sql_ot = pg_query("SELECT * FROM orden_trabajo WHERE codigo_ot = '$codigo_ot'");
 $row_ot = pg_fetch_array($sql_ot);

 $id_cliente = $row_ot['id_cliente']; 
 $cliente = $row_ot['cliente']; 
 $ci_nit = $row_ot['ci_nit'];
 $moneda = $row_ot['moneda']; 
 $descuento = $row_ot['descuento']; 
 $estado = $row_ot['estado']; 
 $tipo_cliente = $row_ot['tipo_cliente'];
 $id_usuario = $row_ot['id_usuario'];
 $id_sucursal = $row_ot['id_sucursal'];
 $fecha = date('Y-m-d');
 $hora = date('H:i:s'); 

 $total = $row_ot['total_servicio'];
 $pago = $row_ot['pago_servicio'];
 $saldo = $row_ot['saldo_servicio'];

 $total = $total + $suma;
 $saldo = $total - $pago;

 //Edicion de las sumatorias

 $sql_upd_total = pg_query("UPDATE orden_trabajo SET total_servicio='$total', pago_servicio='$pago', saldo_servicio='$saldo' WHERE codigo_ot='$codigo_ot'");

 //Insercion de la nueva prenda 

 $sql_nueva = pg_query("INSERT INTO orden_trabajo(
            id_usuario, id_sucursal, id_cliente, cliente, 
            ci_nit, id_prenda, id_tipo_lavado, cantidad_prenda, cantidad_peso, 
            medida_prenda, costo_prenda, costo_kilo, costo_metro, total_servicio, 
            pago_servicio, saldo_servicio, moneda, descuento, estado, codigo_ot, 
            fecha, hora, tipo_cliente)
    VALUES ( '$id_usuario', '$id_sucursal', '$id_cliente', '$cliente', 
            '$ci_nit', '$id_prenda', '2', '$cantidad', '0', 
            '$medida', '0', '0', '$precio', '$total', 
            '$pago', '$saldo', '$moneda', '$descuento', '$estado', '$codigo_ot', 
            '$fecha', '$hora', '$tipo_cliente')");

 echo "<div class='alert alert-info' role='alert'>
       <strong> REGISTRO CORRECTO!! </strong> Se agrego una nueva prenda a la orden
       </div>";
?>
  <script type="text/javascript">
  	 
  	 setTimeout(function(){
  	  $('#Modal_Edicion_Agregar_Prenda_Metro').modal("hide");
     },1500);

     setTimeout(function(){
      btn_editar_orden_trabajo();
     },2000);

  </script>
<?php

}

else{ echo "<script> alert('LA PRENDA YA SE ASIGNO A LAVADO NO SE PUEDE EDITAR'); </script>"; }


}


?>