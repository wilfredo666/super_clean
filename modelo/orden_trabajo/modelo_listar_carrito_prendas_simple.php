 
<div class="table-responsive">
 <table class="table table-bordered table-condensed table-hover table-striped">
  <tr align="center" >
	  <th> # </th>
	  <th> PRENDA </th>
	  <th> TIPO </th>
	  <th> PRECIO Bs. </th>
	  <th> </th>
  </tr>
<?php 
require "../conector/conexion.php";

$sql_prenda = pg_query("SELECT * FROM carrito_orden_trabajo  ORDER BY prenda ASC");
$i = 0; 
while ($row_prenda = pg_fetch_array($sql_prenda)) { 
  $i++;
  $id_prenda = $row_prenda['id_prenda'];
  $prenda = $row_prenda['prenda'];
  $portada = $row_prenda['portada'];
  $precio = $row_prenda['precio'];
  $tipo_prenda = $row_prenda['id_tipo_lavado'];
  $moneda = $row_prenda['moneda'];

?>		
		<tr align="center">
			<td> <?php echo $i;  ?> </td>
			<td> <?php echo $prenda;  ?> </br>  
            <img src="../multimedia/imagenes/<?php echo $portada; ?>" style="width: 100px; height: 100px;">
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
		 
			<td> <button class="btn btn-danger btn-md" onclick="btn_quitar_prenda('<?php echo $id_prenda; ?>');"> - </button></td>

		</tr>
<?php
} 
?>
</table>
 
<script src='../control/control_orden_trabajo.js'> </script>