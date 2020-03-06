<?php
 require "../conector/conexion.php";
 $codigo_ot = trim($_POST['codigo_ot']);
 $tipo = trim($_POST['tipo']);


if ($tipo=="SIMPLE") {  ?>
<div class="row">
	<div class="col-lg-6 col-md-6 col-xs-12">
		<h4> LISTA DE PRENDAS </h4>
		<p> Codigo de OT : <?php echo $codigo_ot; ?></p>
		<input type="hidden" id="codigo_ot_agregar" value="<?php echo $codigo_ot; ?>">
		<?php

		$sql_prend = pg_query("SELECT * FROM prenda p, tipo_prenda tp WHERE p.tipo_prenda = tp.id_tipo_prenda AND tp.tipo_prenda = 'SIMPLE'");
		?>

		<div class="table-responsive">
			<table class="table table-bordered table-condensed">
				<tr>
					<th class="col-lg-1"> Cant </th>
					<th> Prenda </th>
					<th> Tipo </th>
					<th> Precio </th>
					<th> </th>
				</tr>

				<?php
				while ($row_prend = pg_fetch_array($sql_prend)) {
					  
			    $id_prenda = $row_prend['id_prenda']; 
			    $prenda = $row_prend['prenda']; 
			    $portada = $row_prend['portada']; 
			    $precio = $row_prend['precio']; 
			    $tipo_prenda = $row_prend['tipo_prenda']; 
			    $moneda = $row_prend['moneda']; 

			    ?>
			    <tr align="center">
			    	<td> <input type="text" class="form-control" maxlength="10" id="cantidad_<?php echo $id_prenda; ?>" style="padding: 1px;" ></td>
			    	<td> <?php echo $prenda; echo "</br>"; ?>
			    		<img src="../multimedia/imagenes/<?php echo $portada; ?>" style = "width: 50px; height: 50px;";>
			    	</td>
			    	<td> <?php echo $tipo_prenda; ?> </td>
			    	<td> <?php  echo $precio; echo " Bs./Ud "; ?> 
			             <input type="hidden" id="precio_<?php echo $id_prenda; ?>" 
			             value="<?php echo $precio; ?>">
			        </td>

			    	<td align="center"> 
			    		<button class="btn btn-success btn-md" 
			    		 onclick="btn_agregar_prenda_simple_edicion('<?php echo $codigo_ot; ?>','<?php echo $id_prenda; ?>');"> Agregar </button>
			        </td>

			    </tr>

			    <?php
				 
                }
				?>
				
			</table>
		</div>

	
	</div>

	<div class="col-lg-6 col-md-6 col-xs-12">
		<h4> PRENDAS ASIGNADAS </h4>
		<div id="mensaje_resp_agregar_prenda_simple_edicion"></div>
	
	</div>

</div>

<?php
}

if ($tipo=="KILO") {
?>
<div class="row">

	<div class="col-lg-8 col-md-8 col-xs-12">
		<h4> PRENDAS ASIGNADAS </h4>
		<p> Codigo de OT : <?php echo $codigo_ot; ?></p>
		<input type="hidden" id="codigo_ot_agregar" value="<?php echo $codigo_ot; ?>">
        <?php
		  
		  $sql_prend = pg_query("SELECT * FROM prenda p, tipo_prenda tp WHERE p.tipo_prenda = tp.id_tipo_prenda AND tp.tipo_prenda = 'SIMPLE'");
		?>

		<div class="table-responsive">
			<table class="table table-bordered table-condensed">
				<tr>
					<th class="col-lg-2"> Cant </th>
					<th class="col-lg-2"> Peso </th>
					<th> Prenda </th>
					<th> Tipo </th>
					<th> Precio </th>
					<th> </th>
				</tr>

				<?php
				while ($row_prend = pg_fetch_array($sql_prend)) {
					  
			    $id_prenda = $row_prend['id_prenda']; 
			    $prenda = $row_prend['prenda']; 
			    $portada = $row_prend['portada'];   
			    $tipo_prenda = $row_prend['tipo_prenda']; 
			    $moneda = $row_prend['moneda']; 

			    $sql_kilo = pg_query("SELECT * FROM precio_kilo");
			    $row_kilo = pg_fetch_array($sql_kilo);
			    $precio_kilo = $row_kilo['precio_kilo'];

			    ?>
			    <tr align="center">
			    	<td> <input type="text" class="form-control" maxlength="10" id="cantidad_<?php echo $id_prenda; ?>" style="padding: 1px;" ></td>

			    	<td> <input type="text" class="form-control" maxlength="10" id="peso_<?php echo $id_prenda; ?>" style="padding: 1px;" ></td>

			    	<td> <?php echo $prenda; echo "</br>"; ?>
			    		<img src="../multimedia/imagenes/<?php echo $portada; ?>" style = "width: 50px; height: 50px;";>
			    	</td>
			    	<td> <?php echo $tipo_prenda; ?> </td>
			    	<td> <?php  echo $precio_kilo; echo " Bs./Kgrs "; ?> 
			             <input type="hidden" id="precio_<?php echo $id_prenda; ?>" 
			             value="<?php echo $precio_kilo; ?>">
			        </td>

			    	<td align="center"> 
			    		<button class="btn btn-success btn-md" 
			    		 onclick="btn_agregar_prenda_kilo_edicion('<?php echo $codigo_ot; ?>','<?php echo $id_prenda; ?>');"> Agregar </button>
			        </td>

			    </tr>

			    <?php
				 
                }
				?>
				
			</table>
		</div>


	</div>

	<div class="col-lg-4 col-md-4 col-xs-12">
		<h4> PRENDAS ASIGNADAS </h4>
		<div id="mensaje_resp_agregar_prenda_kilo_edicion"></div>
	</div>

</div>

<?php
}

if ($tipo=="X_METRO") {
?>
<div class="row">

	<div class="col-lg-8 col-md-8 col-xs-12">
		<h4> PRENDAS ASIGNADAS </h4>
		<p> Codigo de OT : <?php echo $codigo_ot; ?></p>
		<input type="hidden" id="codigo_ot_agregar" value="<?php echo $codigo_ot; ?>">
        <?php
		  
		  $sql_prend = pg_query("SELECT * FROM prenda p, tipo_prenda tp WHERE p.tipo_prenda = tp.id_tipo_prenda AND tp.tipo_prenda = 'X METRO'");
		?>

		<div class="table-responsive">
			<table class="table table-bordered table-condensed">
				<tr>
					<th class="col-lg-2"> Cant </th>
					<th class="col-lg-2"> Medida </th>
					<th> Prenda </th>
					<th> Tipo </th>
					<th> Precio </th>
					<th> </th>
				</tr>

				<?php
				while ($row_prend = pg_fetch_array($sql_prend)) {
					  
			    $id_prenda = $row_prend['id_prenda']; 
			    $prenda = $row_prend['prenda']; 
			    $portada = $row_prend['portada'];   
			    $tipo_prenda = $row_prend['tipo_prenda']; 
			    $moneda = $row_prend['moneda']; 
			    $precio = $row_prend['precio'];

			    ?>
			    <tr align="center">
			    	<td> <input type="text" class="form-control" maxlength="10" id="cantidad_<?php echo $id_prenda; ?>" style="padding: 1px;" ></td>

			    	<td> <input type="text" class="form-control" maxlength="10" id="medida_<?php echo $id_prenda; ?>" style="padding: 1px;" ></td>

			    	<td> <?php echo $prenda; echo "</br>"; ?>
			    		<img src="../multimedia/imagenes/<?php echo $portada; ?>" style = "width: 50px; height: 50px;";>
			    	</td>
			    	<td> <?php echo $tipo_prenda; ?> </td>
			    	<td> <?php  echo $precio; echo " Bs./Mtrs "; ?> 
			             <input type="hidden" id="precio_<?php echo $id_prenda; ?>" 
			             value="<?php echo $precio; ?>">
			        </td>

			    	<td align="center"> 
			    		<button class="btn btn-success btn-md" 
			    		 onclick="btn_agregar_prenda_medida_edicion('<?php echo $codigo_ot; ?>','<?php echo $id_prenda; ?>');"> Agregar </button>
			        </td>

			    </tr>

			    <?php
				 
                }
				?>
				
			</table>
		</div>


	</div>

	<div class="col-lg-4 col-md-4 col-xs-12">
		<h4> PRENDAS ASIGNADAS </h4>
		<div id="mensaje_resp_agregar_prenda_kilo_edicion"></div>
	</div>

</div>

<?php
}

?>
