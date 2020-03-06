
  <?php

    $id_ot = $_POST['id_ot']; 
    $tipo = $_POST['tipo'];  

    require('../conector/conexion.php');

    if ($tipo=="SIMPLE") {
    
	    $sql_ot = pg_query("SELECT * FROM orden_trabajo WHERE id_orden_trabajo ='$id_ot'");
		$row_ot = pg_fetch_array($sql_ot);
		$codigo_ot = trim($row_ot['codigo_ot']);

		$cantidad = $row_ot['cantidad_prenda'];
		$costo = $row_ot['costo_prenda'];

		$suma = $cantidad*$costo;

		$total = $row_ot['total_servicio'];
		$pago = $row_ot['pago_servicio'];
		$saldo = $row_ot['saldo_servicio'];

		$total = $total - $suma;
		$saldo = $saldo - $suma;

	    $sql_comp = pg_query("SELECT COUNT(*) AS count FROM lavado WHERE codigo_ot = '$codigo_ot'");
	    $row_ot = pg_fetch_array($sql_comp);
	    $cont = $row_ot['count'];

	    if ($cont==0) {

		  //ACTUALIZAMOS PRIMERO LA PRENDA
          $sql_upd_total = pg_query("UPDATE orden_trabajo SET total_servicio='$total', pago_servicio='$pago', saldo_servicio='$saldo' WHERE codigo_ot='$codigo_ot'");	
		 
	      pg_query("DELETE FROM orden_trabajo WHERE id_orden_trabajo = '$id_ot'");

	    }
	    else{
	    	echo "<script> alert('LA PRENDA YA SE ASIGNO A LAVADO NO SE PUEDE EDITAR'); </script>";
	    }  
  
    }
 

    if ($tipo=="KILO") {
    
	    $sql_ot = pg_query("SELECT * FROM orden_trabajo WHERE id_orden_trabajo ='$id_ot'");
		$row_ot = pg_fetch_array($sql_ot);
		$codigo_ot = trim($row_ot['codigo_ot']);

		$cantidad = $row_ot['cantidad_peso'];
		$costo = $row_ot['costo_kilo'];

		$suma = $cantidad*$costo;

		$total = $row_ot['total_servicio'];
		$pago = $row_ot['pago_servicio'];
		$saldo = $row_ot['saldo_servicio'];

		$total = $total - $suma;
		$saldo = $saldo - $suma;

	    $sql_comp = pg_query("SELECT COUNT(*) AS count FROM lavado WHERE codigo_ot = '$codigo_ot'");
	    $row_ot = pg_fetch_array($sql_comp);
	    $cont = $row_ot['count'];

	    if ($cont==0) {

		  //ACTUALIZAMOS PRIMERO LA PRENDA
          $sql_upd_total = pg_query("UPDATE orden_trabajo SET total_servicio='$total', pago_servicio='$pago', saldo_servicio='$saldo' WHERE codigo_ot='$codigo_ot'");	
		 
	      pg_query("DELETE FROM orden_trabajo WHERE id_orden_trabajo = '$id_ot'");

	    }
	    else{
	    	echo "<script> alert('LA PRENDA YA SE ASIGNO A LAVADO NO SE PUEDE EDITAR'); </script>";
	    }  
  
    }

    if ($tipo=="X_METRO") {
    
	    $sql_ot = pg_query("SELECT * FROM orden_trabajo WHERE id_orden_trabajo ='$id_ot'");
		$row_ot = pg_fetch_array($sql_ot);
		$codigo_ot = trim($row_ot['codigo_ot']);

		$cantidad = $row_ot['medida_prenda'];
		$costo = $row_ot['costo_metro'];

		$suma = $cantidad*$costo;

		$total = $row_ot['total_servicio'];
		$pago = $row_ot['pago_servicio'];
		$saldo = $row_ot['saldo_servicio'];

		$total = $total - $suma;
		$saldo = $saldo - $suma;

	    $sql_comp = pg_query("SELECT COUNT(*) AS count FROM lavado WHERE codigo_ot = '$codigo_ot'");
	    $row_ot = pg_fetch_array($sql_comp);
	    $cont = $row_ot['count'];

	    if ($cont==0) {

		  //ACTUALIZAMOS PRIMERO LA PRENDA
	      //$sql_upd_total = pg_query("UPDATE orden_trabajo SET total_servicio='165', pago_servicio='$pago', saldo_servicio='51' WHERE codigo_ot='$codigo_ot'");
          
          $sql_upd_total = pg_query("UPDATE orden_trabajo SET total_servicio='$total', pago_servicio='$pago', saldo_servicio='$saldo' WHERE codigo_ot='$codigo_ot'");	
		 
	      pg_query("DELETE FROM orden_trabajo WHERE id_orden_trabajo = '$id_ot'");

	    }
	    else{
	    	echo "<script> alert('LA PRENDA YA SE ASIGNO A LAVADO NO SE PUEDE EDITAR'); </script>";
	    }  
  
    }

     

  ?>
    
  
