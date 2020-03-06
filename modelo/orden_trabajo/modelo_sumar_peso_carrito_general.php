<?php

$id_usuario = $_POST['id_usuario']; 
$id_sucursal = $_POST['id_sucursal'];
$peso_ropa = $_POST['peso_ropa'];

require "../conector/conexion.php";

$sql_ot = pg_query("SELECT * FROM carrito_orden_trabajo WHERE id_usuario='$id_usuario' AND id_sucursal='$id_sucursal' ");
$i=0;
$total_costo=0;
$total_cant=0;
$porcentaje=0;

while ($row_ot = pg_fetch_array($sql_ot)) {
  $i++; 
  $id_usuario = $row_ot['id_usuario']; 
  $id_sucursal = $row_ot['id_sucursal']; 
  $id_cliente = $row_ot['id_cliente']; 
  $cliente = $row_ot['cliente'];  
  $ci_nit = $row_ot['ci_nit'];  
  $id_prenda = $row_ot['id_prenda'];  
  $id_tipo_lavado = $row_ot['id_tipo_lavado'];  
  $cantidad_prenda = $row_ot['cantidad_prenda'];  
  $cantidad_peso = $row_ot['cantidad_peso'];  
  $medida_prenda = $row_ot['medida_prenda'];
  $costo_prenda = $row_ot['costo_prenda'];  
  $costo_kilo = $row_ot['costo_kilo'];  
  $costo_metro = $row_ot['costo_metro'];
  $total_servicio = $row_ot['total_servicio']; 
  $pago_servicio = $row_ot['pago_servicio'];  
  $saldo_servicio = $row_ot['saldo_servicio'];  
  $moneda = $row_ot['moneda']; 
  $descuento = $row_ot['descuento'];  
  $tipo_cliente = $row_ot['tipo_cliente'];  
  $estado = $row_ot['estado'];  
  $codigo_ot = $row_ot['codigo_ot'];
  
  //echo "Cantidad Prenda = "; echo $cantidad_prenda; echo " uds. </br>";
  $total_cant = $total_cant + $cantidad_prenda;
  // 1 = SIMPLE , 2 = METRO , 3 = KILO

  if($id_tipo_lavado=='1'){
   $operacion = $cantidad_prenda*$costo_prenda;
  	$total_costo = $total_costo+$operacion;
  }

  if($id_tipo_lavado=='2'){
  	$operacion_m = $medida_prenda*$costo_metro;
  	$total_costo = $total_costo + $operacion_m;
  }

  $sql_cli = pg_query("SELECT * FROM cliente WHERE id_cliente='$id_cliente'");
  $row_cli = pg_fetch_array($sql_cli);
  $porcentaje = $row_cli['descuento'];
}


  $sql_peso = pg_query("SELECT * FROM precio_kilo ORDER BY id_precio_kilo DESC");
  $row_peso = pg_fetch_array($sql_peso);
  $precio_kilo = $row_peso['precio_kilo'];

  $total_costo_kilo = ($peso_ropa*$precio_kilo);
  $total_costo = $total_costo + $total_costo_kilo;

  echo "<label style='margin:0px;'> Peso : "; echo $peso_ropa; echo " Kgrs. Costo Kilo : "; echo $precio_kilo; echo " Kgrs/Bs </label></br>";
  echo "<label style='margin:0px;'> Total Costo Kilo : "; echo $total_costo_kilo; echo " Bs </label>";

?>
 <table class="table table-condensed" style="margin: 0px;">
	<tr>
		<td> <input type="text" id="total_cant_ot" value="<?php echo $total_cant; ?>" class="form-control" disabled style="width: all; border:none; background: transparent; font-size: 20px; font-weight: bold;"> </td>
		<td style="font-size: 20px; font-weight: bold;"> Uds. </td>
	</tr>
	<tr>
		<td style="font-size: 20px; font-weight: bold;">
		 Descuento : <?php echo $descuento; echo "%"; ?></td>
		<td style="font-size: 20px; font-weight: bold;">
		 <?php if($descuento>0){ echo "SI"; }?></td>
	</tr>
	<tr>
		<td> 
		<?php 
           $descuento = trim($descuento);

           if($descuento>0){

           	$descuento = ($descuento/100);
           	$total_desc = (1-$descuento);
            $total_costo_desc = $total_costo*($total_desc);
            $total_costo_desc = round($total_costo_desc);
            ?>
            <h4 style="font-size: 14px; font-weight: bold; margin: 0px; color: red;"> <?php echo "Antes / "; echo $total_costo; ?></h4>
            <input type="text" id="total_costo_ot" value="<?php echo $total_costo_desc; ?>" class="form-control" disabled style="width: all; border:none; background: transparent; font-size: 20px; font-weight: bold;">
            <?php
           }
           else{
             $total_costo = round($total_costo);
            ?>
            <input type="text" id="total_costo_ot" value="<?php echo $total_costo; ?>" class="form-control" disabled style="width: all; border:none; background: transparent; font-size: 20px; font-weight: bold;">
            <?php
           }
		?>

		 </td>
		<td style="font-size: 20px; font-weight: bold;"> Bs. </td>
	</tr>
	<tr>
		<td> <label> Pago : </label> <input type="text" id="pago_servicio" class="form-control" placeholder="Pago del Servicio"  onkeyup="btn_pago_servicio_lavado();" > </td>
		<td style="font-size: 20px; font-weight: bold;"> Bs. </td>
	</tr>
	<tr>
		<td> <label> Saldo : </label><input type="text" id="saldo_servicio" class="form-control" placeholder="Saldo"></td>
		<td style="font-size: 20px; font-weight: bold;"> Bs. </td>
	</tr>
	<tr>
		<td colspan="2" align="center">
      <div id="panel_respuesta_registro_ot_general"></div>
			<button class="btn btn-primary btn-lg" onclick="btn_registrar_servicio_ot_general();"> REGISTRAR  </button>
		</td>
	</tr>
</table>




