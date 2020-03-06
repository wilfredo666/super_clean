
<div class="row">
<div class="col-lg-6 col-md-6 col-xs-12" style="overflow-y: scroll; max-height: 450px;">
<h4 style="margin-bottom: 0px;"> LISTA DE PRENDAS REGISTRADAS </h4>
<p style="margin-bottom:; font-size: 10px; "> Seleccione la prenda para asignarla al carrito </p>
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

$sql_prenda = pg_query("SELECT * FROM prenda WHERE tipo_prenda='1' ORDER BY prenda ASC");
$i = 0; 
while ($row_prenda = pg_fetch_array($sql_prenda)) { 
  $i++;
  $id_prenda = $row_prenda['id_prenda'];
  $prenda = $row_prenda['prenda'];
  $portada = $row_prenda['portada'];
  $precio = $row_prenda['precio'];
  $tipo_prenda = $row_prenda['tipo_prenda'];
  $moneda = $row_prenda['moneda'];

?>		
		<tr align="center">
			<td> <?php echo $i;  ?> </td>
			<td> <?php echo $prenda;  ?> </br>  
            <img src="../multimedia/imagenes/<?php echo $portada; ?>" style="width: 50px; height: 50px;">
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
			<td> <button class="btn btn-primary btn-md" onclick="btn_agregar_prenda('<?php echo $id_prenda; ?>');"> + </button></td>
		</tr>
<?php
} 
?>
	</table>
</div>

</div>

<div class="col-lg-6 col-md-6 col-xs-12" style="overflow-y: scroll; max-height: 450px;">

<h4 style="margin-bottom: 0px;"> CARRITO DE PRENDAS </h4>
<p style="margin-bottom:; font-size: 10px; "> Prendas asignadas a la Orden de Trabajo </p>

<div id="mensaje_carrito_orden_trabajo">  
</div>

<div id="panel_modal_carrito_orden_trabajo">
 	  
</div>
</div>

<!-- Final del Row -->
</div>

 