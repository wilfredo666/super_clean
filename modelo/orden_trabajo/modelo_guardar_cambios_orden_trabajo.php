<?php
require "../conector/conexion.php";
$tipo = trim($_POST['tipo']);

if ($tipo =='SIMPLE') {
	
	$id_ot = trim($_POST['id_ot']);
	$cantidad = trim($_POST['cantidad']);
	$total = trim($_POST['total']); 
	$pago = trim($_POST['pago']); 
	$saldo = trim($_POST['saldo']);

	$sql_ot = pg_query("SELECT * FROM orden_trabajo WHERE id_orden_trabajo ='$id_ot'");
	$row_ot = pg_fetch_array($sql_ot);
	$codigo_ot = trim($row_ot['codigo_ot']);

    $sql_comp = pg_query("SELECT COUNT(*) AS count FROM lavado WHERE codigo_ot = '$codigo_ot'");
    $row_ot = pg_fetch_array($sql_comp);
    $cont = $row_ot['count'];

    if ($cont==0) {
    
	//ACTUALIZAMOS PRIMERO LA PRENDA
	$sql_upd = pg_query("UPDATE orden_trabajo SET cantidad_prenda='$cantidad' WHERE id_orden_trabajo='$id_ot'");

	$sql_upd_total = pg_query("UPDATE orden_trabajo SET total_servicio='$total', pago_servicio='$pago', saldo_servicio='$saldo' WHERE codigo_ot='$codigo_ot'");	

    }
    else{
    	echo "<script> alert('LA PRENDA YA SE ASIGNO A LAVADO NO SE PUEDE EDITAR'); </script>";
    }

}

if ($tipo =='KILO') {

    $id_ot = trim($_POST['id_ot']);
	$cantidad_kilo = trim($_POST['cantidad_kilo']);
	$total = trim($_POST['total']); 
	$pago = trim($_POST['pago']); 
	$saldo = trim($_POST['saldo']);
	$peso_kilo = trim($_POST['peso_kilo']);

    $sql_ot = pg_query("SELECT * FROM orden_trabajo WHERE id_orden_trabajo ='$id_ot'");
	$row_ot = pg_fetch_array($sql_ot);
	$codigo_ot = trim($row_ot['codigo_ot']);

	$sql_comp = pg_query("SELECT COUNT(*) AS count FROM lavado WHERE codigo_ot = '$codigo_ot'");
    $row_ot = pg_fetch_array($sql_comp);
    $cont = $row_ot['count'];

    if ($cont==0) {

	//ACTUALIZAMOS PRIMERO LA PRENDA

	$sql_upd = pg_query("UPDATE orden_trabajo SET cantidad_peso='$peso_kilo', cantidad_prenda='$cantidad_kilo' WHERE id_orden_trabajo='$id_ot'");

	$sql_upd_total = pg_query("UPDATE orden_trabajo SET total_servicio='$total', pago_servicio='$pago', saldo_servicio='$saldo' WHERE codigo_ot='$codigo_ot'");
	}
    else{
    	echo "<script> alert('LA PRENDA YA SE ASIGNO A LAVADO NO SE PUEDE EDITAR'); </script>";
    }

}

if ($tipo =='X_METRO') {

    $id_ot = trim($_POST['id_ot']);
	$cantidad_metro = trim($_POST['cantidad_metro']);
	$total = trim($_POST['total']); 
	$pago = trim($_POST['pago']); 
	$saldo = trim($_POST['saldo']);
	$medida_metro = trim($_POST['medida_metro']);

    $sql_ot = pg_query("SELECT * FROM orden_trabajo WHERE id_orden_trabajo ='$id_ot'");
	$row_ot = pg_fetch_array($sql_ot);
	$codigo_ot = trim($row_ot['codigo_ot']);

    $sql_comp = pg_query("SELECT COUNT(*) AS count FROM lavado WHERE codigo_ot = '$codigo_ot'");
    $row_ot = pg_fetch_array($sql_comp);
    $cont = $row_ot['count'];

    if ($cont==0) {

	//ACTUALIZAMOS PRIMERO LA PRENDA

	$sql_upd = pg_query("UPDATE orden_trabajo SET medida_prenda='$medida_metro', cantidad_prenda='$cantidad_metro' WHERE id_orden_trabajo='$id_ot'");

	$sql_upd_total = pg_query("UPDATE orden_trabajo SET total_servicio='$total', pago_servicio='$pago', saldo_servicio='$saldo' WHERE codigo_ot='$codigo_ot'");	
    
    }
    else{
    	echo "<script> alert('LA PRENDA YA SE ASIGNO A LAVADO NO SE PUEDE EDITAR'); </script>";
    }

}

?>