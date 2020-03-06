<?php

$codigo_barras = trim($_POST['codigo_barras']); 
$id_usuario = trim($_POST['id_usuario']); 
$id_sucursal = trim($_POST['id_sucursal']);
$size = trim($_POST['size']); 
$id_lugar = trim($_POST['id_area_acomodar']);
$lugar = trim($_POST['area_acomodar']);

$tamanio = strlen($codigo_barras); 

if ($tamanio==$size) {

 require "../conector/conexion.php";
 
 $sql_cod = pg_query("SELECT * FROM lavado WHERE codigo_tikeo = '$codigo_barras' AND estado_lavado='ACTIVO' ORDER BY id_lavado DESC LIMIT 1");
 
 $cont=0;
 while ($row_cod = pg_fetch_array($sql_cod)) {
   $id_ot = $row_cod['id_ot'];
   $id_lavado = $row_cod['id_lavado'];
   $id_cliente = trim($row_cod['id_cliente']);
   $cliente = trim($row_cod['cliente']);
   $codigo_ot = trim($row_cod['codigo_ot']);
   $id_prenda = trim($row_cod['id_prenda']);
   $cont++;
 }

 if ($cont==1) {


	$sql_area = pg_query("INSERT INTO carrito_acomodado(
	            id_cliente, cliente, id_usuario, id_sucursal, 
	            id_ot, codigo_ot, id_lugar, lugar, estado_acomodado, codigo_tikeo, id_prenda)
	    VALUES ( '$id_cliente', '$cliente', '$id_usuario', '$id_sucursal', 
	            '$id_ot', '$codigo_ot', '$id_lugar', '$lugar', 'ACTIVO', '$codigo_barras', 
	            '$id_prenda')");
    
	// $sql_upd = pg_query("UPDATE lavado SET estado_lavado='INACTIVO' WHERE id_lavado='$id_lavado'");

  ?>
   <div class='alert alert-info' role='alert'>
   <strong> REGISTRO CORRECTO!! </strong> Se agrego al carrito
   </div> 

   <script type="text/javascript">
   	  $("#codigo_barras_acodado").val("");
   	  setTimeout(function(){ btn_filtrar_listado_acomodado(); } , 1500);
     
   </script>
  <?php	 
 }
 else
 { ?>
   <div class='alert alert-danger' role='alert'>
   <strong> ERROR!! INTENTE DE NUEVO </strong> </br> La Prenda ya fue Asignada al area de acomodo
   </div> 
   <script type="text/javascript">
   	  //setTimeout(function(){ btn_filtrar_listado_acomodado(); } , 3000);
   </script>
  <?php	}

}

else{
 ?>
   <div class='alert alert-danger' role='alert'>
   <strong> ERROR DE CODIGO!! </strong> </br>
    El codigo de barras debe contener 8 digitos </br>
    <strong> INTENTE DE NUEVO </strong>
   </div>
   
   <script type="text/javascript">
   	 setTimeout(function(){ btn_filtrar_listado_acomodado(); } , 3000);
   </script>

   <?php	
}

?>