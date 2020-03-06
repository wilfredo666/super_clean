
 <table class="table table-bordered table-condensed table-hover table-striped">
 <?php

   $id_usuario  = $_POST["id_usuario"];
   $id_sucursal = $_POST["id_sucursal"];
   $id_cliente  = $_POST["id_cliente"];
   
   require "../conector/conexion.php";

   $sql_ot = pg_query("SELECT * FROM carrito_orden_trabajo WHERE id_cliente ='$id_cliente' AND  id_usuario ='$id_usuario' AND id_sucursal = '$id_sucursal'");

   ?>
    <tr align="center" >
	  <th> # </th>
	  <th> PRENDA </th>
	  <th> TIPO </th>
	   <th> PRECIO Bs. </th>
	  <th> </th>
    </tr>
   <?php

   while ($row_ot = pg_fetch_array($sql_ot)) {
    $id_prenda = $row_ot['id_prenda'];
    $id_ot = $row_ot['id_carrito_orden_trabajo'];
    $tipo_prenda = $row_ot['id_tipo_lavado'];

    $sql_prenda = pg_query("SELECT * FROM prenda WHERE id_prenda='$id_prenda' ORDER BY prenda ASC");
	$i = 0; 
	while ($row_prenda = pg_fetch_array($sql_prenda)) { 
	  $i++;
	  $id_prenda = $row_prenda['id_prenda'];
	  $prenda = $row_prenda['prenda'];
	  $portada = $row_prenda['portada'];
	  $precio = $row_prenda['precio'];
	  $moneda = $row_prenda['moneda'];

      ?>		
	  <tr align="center">
			<td> <?php echo $i;  ?> </td>
			<td style="font-size: 10px;"> <?php echo $prenda;  ?> </br>  
            <img src="../multimedia/imagenes/<?php echo $portada; ?>" style="width: 25px; height: 25px;">
		    </td>
			
			<td> <?php
            
			$sql_tipo_prenda = pg_query("SELECT * FROM tipo_prenda WHERE id_tipo_prenda='$tipo_prenda'");
            $row_tipo_prenda = pg_fetch_array($sql_tipo_prenda);
            echo $tipo_prenda_name = $row_tipo_prenda['tipo_prenda']; 

			?> </td>
			<td> <?php 
			     
			     if ($tipo_prenda==3) { }
			     else{ echo $precio; }  

			?> </td>
			<td> <button class="btn btn-danger btn-md" onclick="btn_quitar_prenda_carrito('<?php echo $id_ot; ?>');"> - </button></td>

		</tr>
<?php
       } 
   }

 ?>

   