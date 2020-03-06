<?php

 $codigo_lavado = trim($_POST['codigo_lavado']); 
 $codigo_barras = trim($_POST['codigo_barras']); 
 $tipo_lavado = trim($_POST['tipo_lavado']);

 require "../conector/conexion.php";

 $sql_lav = pg_query("SELECT * FROM lavado WHERE codigo_lavado='$codigo_lavado'");
 $row_lav = pg_fetch_array($sql_lav);



 /* COMPROVAMOS SI EXISTE EN EL REGISTRO DE ORDENES DE TRABAJO */

 $sql_tik = pg_query("SELECT * FROM tikeo WHERE codigo_barras='$codigo_barras' AND estado_tikeo ='ACTIVO'");
 $cont =0 ;
 
 while($row_tik = pg_fetch_array($sql_tik)){
 	$cont++;
 	$id_ot = $row_tik['id_ot'];
 	$codigo_ot = $row_tik['codigo_ot'];
 	$id_tikeo = $row_tik['id_tikeo'];
 }
 

 if ($cont==1) {

 $sql_tik = pg_query("SELECT * FROM tikeo WHERE id_tikeo='$id_tikeo'");
 $row_tik = pg_fetch_array($sql_tik);

    $id_usuario  = $row_tik['id_usuario'];
    $id_cliente  = $row_tik['id_cliente']; 
    $cliente  = $row_tik['cliente'];
    $id_sucursal  = $row_tik['id_sucursal'];
    $id_prenda  = $row_tik['id_prenda'];
    $fecha = date("Y-m-d");
    $hora = date("H:i:s");
 

 	$sql_ins = pg_query("INSERT INTO lavado(
             id_usuario, id_cliente, cliente, id_sucursal, id_ot, 
            codigo_ot, estado_lavado, codigo_tikeo, id_prenda, codigo_lavado, 
            fecha, hora, tipo_lavado)
    VALUES ('$id_usuario', '$id_cliente', '$cliente', '$id_sucursal', '$id_ot', 
            '$codigo_ot', 'ACTIVO', '$codigo_barras', '$id_prenda','$codigo_lavado', 
            '$fecha', '$hora', '$tipo_lavado') ");

    ?>

 	<div class='alert alert-info' role='alert'>
    <strong>REGISTRO CORRECTO!! </strong> Se añadio un nuevo lavado
    </div>


    <?php

     $sql_tik = pg_query("UPDATE tikeo SET estado_tikeo='INACTIVO' WHERE id_tikeo='$id_tikeo'");
     ?>

	<script type="text/javascript">
		
		setTimeout(function(){ $('#panel_resp_registro_prenda_lavado').html(""); },2000);

	    setTimeout(function(){
	      $('#myModal_Nuevo_Lavado').modal('hide').fadeIn('slow');
	    },3000);

	     setTimeout(function(){
           btn_editar_lavado();
         },3500);

	</script>
     <?php

 }
 else
 {
 	?>
    <div class='alert alert-danger' role='alert'>
    <strong>ERROR!! </strong>NO SE ENCONTRO LA PRENDA ASIGNADA EN LA ORDEN DE TRABAJO
    </div><?php
  }

?>